<?php

namespace App\Http\Controllers\Admin;

use Analytics;
use App\Http\Controllers\Controller;
use App\Libraries\GoogleAnalytics;
use App\Services\Stats;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Spatie\Analytics\Period;
use Illuminate\Support\Facades\Config;

class AnalyticalDashboardsController extends Controller {

    public function index(Stats $stats) {


        $websites = \App\Website::orderBy('website','asc')->pluck('website', 'id');
        $views = \App\Analytic::orderBy('view_name','asc')->pluck('view_name', 'id');

        $start = Carbon::now()->subDay(6);
        $end = Carbon::now();

        if (Input::get('date-range')) {
            $date_range_arr = explode(' - ', Input::get('date-range'));
            $start = Carbon::parse($date_range_arr[0]);
            $end = Carbon::parse($date_range_arr[1]);
        }

        $search_params = array();
        if ($start && $end) {
            $search_params['date-range'] = date('m/d/Y', strtotime($start)) . ' - ' . date('m/d/Y', strtotime($end));
        }

        if (Input::get('website')) {
            $search_params['website'] = Input::get('website');
        }

        if (Input::get('view')) {
            $search_params['view'] = Input::get('view');
            $view_id = \App\Analytic::find(Input::get('view'))->view_id;
        }else{
            $view_id = \App\Analytic::first()->view_id;
        }

        if($view_id){
            Config::set('analytics.view_id', $view_id);
        }

        $toppages = Analytics::fetchMostVisitedPages(Period::create($start, $end), 100, $maxResults = 20);
        // $topkeywords = Analytics::getTopKeyWordsForPeriod($start,$end);
        // $topreferrers = Analytics::getTopReferrersForPeriod($start,$end,100);

        $online = Analytics::getAnalyticsService()->data_realtime->get('ga:' . config('analytics.view_id') . '', 'rt:activeVisitors')->totalsForAllResults['rt:activeVisitors'];

        //https://www.googleapis.com/analytics/v3/data/ga?ids=ga%3A117039068&start-date=7daysAgo&end-date=yesterday&metrics=ga%3AgoalCompletionsAll

        // https://developers.google.com/analytics/devguides/reporting/core/v3/common-queries
        $anadata = Analytics::performQuery(
               Period::create($start, $end), 'ga:sessions', [
                    'metrics' => 'ga:sessions, ga:pageviews, ga:bounces,ga:sessionDuration',
                    'dimensions' => 'ga:yearMonth',
                        ]
        );

        $goalcompletions = Analytics::performQuery(
                Period::create($start, 'yesterday'), 'ga:sessions', [
            'metrics' => 'ga:sessions, ga:goalCompletionsAll,ga:goal5Starts'
                ]
        );

        $analyticsData_mvp = Analytics::fetchMostVisitedPages(Period::create($start, $end));
        $this->data['url'] = $analyticsData_mvp->pluck('url');
        $this->data['pageTitle '] = $analyticsData_mvp->pluck('pageTitle');
        $this->data['pageViews'] = $analyticsData_mvp->pluck('pageViews');

        $result = GoogleAnalytics::country();
        $this->data['country'] = $result->pluck('country');
        $this->data['country_sessions'] = $result->pluck('sessions');

        $groupBy = 'date';
        $column_type = 'date';
        $column_name = 'Date';
        $column_format = 'M/d';

//		if ($start == $end) {
//                    $groupBy = 'hour';
//                    $column_type = 'datetime';
//                    $column_name = 'Time';
//                    $column_format = 'hh:mm a';
//		}
        // $visitorspageviews = Analytics::fetchTotalVisitorsAndPageViews(Period::days(14), $groupBy);
        $visitorspageviews = Analytics::fetchTotalVisitorsAndPageViews(Period::create($start, $end), $groupBy);
        $total_visitors = $total_pageviews = 0;
        $visitors_chart = $pageviews_chart = array();

        if (count($visitorspageviews) > 0) {
            foreach ($visitorspageviews as $row) {
                $total_visitors += $row['visitors'];
                $total_pageviews += $row['pageViews'];
                $visitors_chart[] = array('%%new Date(' . $row[$groupBy]->format('Y, m-1, d, H') . ') %%', (int) $row['visitors']);
                $pageviews_chart[] = array('%%new Date(' . $row[$groupBy]->format('Y, m-1, d, H') . ') %%', (int) $row['pageViews']);
            }
            $total_visitors = number_format($total_visitors);
            $total_pageviews = number_format($total_pageviews);
        }

        // $product_chart[0] = array('Product','Sold');
        // foreach($stats->getHighestSellingProducts(12,$start,$end) as $product){
        //     $product_chart[] = array($product->name,$product->sales_count);
        // }

        $page_chart[0] = array('Page', 'Pageviews');
        foreach ($toppages as $row) {
            $page_chart[] = array($row['url'], (int) $row['pageViews']);
        }

        // $revenue = $stats->totalRevenueByDate($start,$end);
        // $revenue_array = array();
        // foreach ($revenue as $row){
        //     $revenue_array[$row->order_date] = $row->total_revenue;
        // }
        //$interval = DateInterval::createFromDateString('1 day');
        //$period = new DatePeriod($start, $interval, $end);
        // $order_chart = array();
        // if(count($order_array) > 0){
        //     foreach ( $period as $dt ){
        //         $order_chart[] = array('%%new Date('.$dt->format('Y, m-1, d, H').') %%',(int)@$order_array[$dt->format('Y-m-d')]);
        //     }
        // }
        // $revenue_chart = array();
        // if(count($revenue_array) > 0){
        //     foreach ( $period as $dt ){
        //         $revenue_chart[] = array('%%new Date('.$dt->format('Y, m-1, d, H').') %%',(float)@$revenue_array[$dt->format('Y-m-d')]);
        //     }
        // }

        return view('admin.analytical_dashboards.index', compact('websites', 'views', 'search_params', 'analyticsData_mvp', 'chartData', 'stats', 'product_chart', 'page_chart', 'visitors_chart', 'pageviews_chart', 'topkeywords', 'topreferrers', 'start', 'end', 'toppages', 'total_visitors', 'total_pageviews', 'column_type', 'column_name', 'column_format', 'online' ))->with('active', 'home');
    }

}
