<?php

namespace App\Services;


use App\DTO\CalllMetricReportDTO;
use Illuminate\Support\Collection;
use function GuzzleHttp\json_encode;

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
                $incCollection = $group->name->includes;
                foreach ($incCollection as $include) {
                    if(isset($include->tracking_number) && in_array($include->tracking_number, $metrics))
                        return true;
                }

                return false;
            });
        }

        return $dto;
    }
}
