<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\CallMetricApi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class CallMetricsController extends Controller
{
    public function index(Request $request)
    {
        
        $start = Carbon::now()->subDay(6);
        $end = Carbon::now();
        if ($request->get('date-range')) {
            $date_range_arr = explode(' - ', $request->get('date-range'));
            $start = Carbon::parse($date_range_arr[0]);
            $end = Carbon::parse($date_range_arr[1]);
        }

        $search_params = ['account'=>'','numbers'=>[]];
        if ($start && $end) {
            $search_params['date-range'] = date('m/d/Y', strtotime($start)) . ' - ' . date('m/d/Y', strtotime($end));
        }

        if ($request->get('account')) {
            $search_params['account'] = $request->get('account');
        }
        if ($request->get('numbers')) {
            $numbers = $request->get('numbers');
            foreach ($numbers as $numberJson) {
                $search_params['numbers'][] = json_decode($numberJson);
            }
        }

        $service = new CallMetricApi();
        $accounts = $service->getAllAccounts();

        if(empty($search_params['account']) && count($accounts)>0) {
            $search_params['account'] = $accounts->first()->id;
        }
        return view('admin.call_metrics.index', compact('accounts','search_params'));
    }

    public function numbersSelect2(Request $request) {
        $service = new CallMetricApi();
        $account_id = $request->get('account_id');
        $page = $request->get('page');
        $paginator = $service->getNumbersForAccount($account_id,$page);
        $mappedItems = $paginator->map(function($item){
            return [
                'id'=>$item->id,
                'number'=>$item->number
            ];
        });
        return response()->json([
            'results'=>$mappedItems,
            'pagination'=>[
                'more'=>$paginator->hasMorePages()
            ]
        ]);
    }
}
