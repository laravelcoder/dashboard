<?php
namespace App\Http\Controllers\Admin;

use App\ContactCompany;
use App\DTO\CalllMetricReportDTO;
use App\Http\Controllers\Controller;
use App\Location;
use App\Services\CallMetricApi;
use App\Services\CallMetricReports;
use App\TrackingNumber;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class CallMetricsController extends Controller
{
    public function index(Request $request)
    {
        $search_params = ['date-range'=>'','location_id'=>'','company_id'=>'','tracking_number_ids'=>[]];
        $start = Carbon::now()->subDay(6);
        $end = Carbon::now();
        if ($request->get('date-range')) {
            $date_range_arr = explode(' - ', $request->get('date-range'));
            $start = Carbon::parse($date_range_arr[0]);
            $end = Carbon::parse($date_range_arr[1]);
        }

        if ($start && $end) {
            $search_params['date-range'] = date('m/d/Y', strtotime($start)) . ' - ' . date('m/d/Y', strtotime($end));
        }

        $company_id = $request->get('company_id');
        $location_id = $request->get('location_id');
        $companies = ContactCompany::select('name','id')->get();
        $selectedCompany = null;
        $locations = new Collection();
        if($company_id) {
            $selectedCompany = $companies->where('id',$company_id)->first();
            $locations = Location::byTrackingNumberCompany($company_id)
                ->select('id','nickname')
                ->get();
        }

        $tracking_numbers = new Collection();
        $trackingQuery = TrackingNumber::query();
        if(!empty($location_id)) {
            $trackingQuery = $trackingQuery->where('location_id',$location_id);
            $search_params['location_id'] = $location_id;
        }
        if($selectedCompany) {
            $trackingQuery = $trackingQuery->where('company_id',$selectedCompany->id);
            $search_params['company_id'] = $selectedCompany->id;
            $tracking_numbers = $trackingQuery->get();
        }
        if(!empty($request->get('tracking_number_ids'))){
            $search_params['tracking_number_ids'] = $request->get('tracking_number_ids');
        }
        if(count($search_params['tracking_number_ids'])===0 && count($tracking_numbers)>0)
            $search_params['tracking_number_ids'] = $tracking_numbers->pluck('id')->toArray();

        $filterable_tracking_numbers = $tracking_numbers->filter(function ($tracking_number) use ($search_params) {
            return in_array($tracking_number->id, $search_params['tracking_number_ids']);
        })->pluck('metrics_id')->toArray();

        $reportDto = null;
        if(!empty($search_params['tracking_number_ids']))
            $reportDto = (new CallMetricReports())->getReport($start, $end, $filterable_tracking_numbers);

        return view('admin.call_metrics.index', compact('locations','companies', 'tracking_numbers','search_params','reportDto'));
    }

//    public function numbersSelect2(Request $request) {
//        $service = new CallMetricApi();
//        $account_id = $request->get('account_id');
//        $page = $request->get('page');
//        $paginator = $service->getNumbersForAccount($account_id,$page);
//        $mappedItems = $paginator->map(function($item){
//            return [
//                'id'=>$item->id,
//                'number'=>$item->number
//            ];
//        });
//        return response()->json([
//            'results'=>$mappedItems,
//            'pagination'=>[
//                'more'=>$paginator->hasMorePages()
//            ]
//        ]);
//    }
}
