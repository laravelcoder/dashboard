<?php

namespace App\Services;


use App\DTO\CalllMetricReportDTO;
use Illuminate\Support\Collection;

class CallMetricReports {
    /**
     * @return null|CalllMetricReportDTO
     */
    public function getReport($start_date, $end_date, $metrics){
        $dto = null;
        $service = new CallMetricApi();
        $account = $service->getAllAccounts();
        if(count($account)>0) {
            $dto = new CalllMetricReportDTO();
            $groups = [];
            $accountId = $account[0]->id;
            $page = 0;
            $last_page = 1;
            do {
                $page++;
                $resp = $service->getReportSeries($accountId, $page, $start_date, $end_date);

                if($resp!==null) {
                    $dto->metrics = $resp->metrics;
                    $dto->series = $resp->series;
                    $groups = array_merge($groups,$resp->groups->items);
                    $last_page = $resp->groups->total_pages;
                }
            } while($page<$last_page);

            $dto->groups = new Collection($groups);
            $dto->groups = $dto->groups->filter(function ($group) use ($metrics) {
                return in_array($group->id, $metrics);
            });
        }

        return $dto;
    }
}
