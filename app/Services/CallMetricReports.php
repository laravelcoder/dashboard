<?php

namespace App\Services;

use App\DTO\CallMetricReportDTO;
use Illuminate\Support\Collection;
use function GuzzleHttp\json_encode;
use App\DTO\CallMetricReportOptions;
use Illuminate\Pagination\LengthAwarePaginator;

class CallMetricReports {
    /**
     * Undocumented variable
     *
     * @var CallMetricApi
     */
    protected $service;
    /**
     * Undocumented variable
     *
     * @var array
     */
    protected $accounts;

    public function __construct()
    {
        $this->service = new CallMetricApi();
        $this->initAccounts();
    }

    protected function initAccounts() {
        $this->accounts = $this->service->getAllAccounts();
    }

    protected function getTrackingNumberFilters($numbers) {
        $filterIds = [];
        foreach ($numbers as $number) {
            
            foreach ($this->accounts as $callMetricAccount) {
                $result = $this->service->getNumbersForAccount($callMetricAccount->id, 1,$number);

                foreach ($result as $callMetricTrackingNumber) {
                    $filterIds[] = $callMetricTrackingNumber->filter_id;
                }
            }
        }
        
        return $filterIds;
    }

    /**
     * @return null|CallMetricReportDTO
     */
    public function getReport(CallMetricReportOptions $options, $tracking_numbers){
        $dto = null;
        
        if(count($this->accounts)>0) {
            $options->tracking_numbers_filter_ids = $this->getTrackingNumberFilters($tracking_numbers);
            $dto = new CallMetricReportDTO();
            $groups = [];
            $accountId = $this->accounts[0]->id;
            if (count($options->tracking_numbers_filter_ids) > 0) {
                $resp = $this->service->getReportSeries($accountId, $options);
                if($resp!==null) {
                    $dto->metrics = $resp->metrics;
                    $dto->aggregation = $resp->aggregations;
                    $dto->series = $resp->series;
                    $dto->groups = new LengthAwarePaginator($resp->groups->items,$resp->groups->total_entries,$resp->groups->per_page,$resp->groups->page);
                    $last_page = $resp->groups->total_pages;
                }
            }
        }
        
        return $dto;
    }
}
