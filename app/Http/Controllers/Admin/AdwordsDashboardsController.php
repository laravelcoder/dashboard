<?php
namespace App\Http\Controllers\Admin;

//use Google\AdsApi\AdWords\v201809\cm\CampaignService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Edujugon\GoogleAds\GoogleAds;
use Google\AdsApi\AdWords\Reporting\v201809\DownloadFormat;
use Google\AdsApi\AdWords\AdWordsServices;
use Google\AdsApi\AdWords\AdWordsSessionBuilder;
use Google\AdsApi\AdWords\v201802\cm\CampaignService;
use Google\AdsApi\AdWords\v201802\cm\OrderBy;
use Google\AdsApi\AdWords\v201802\cm\Paging;
use Google\AdsApi\AdWords\v201802\cm\Selector;
use Google\AdsApi\Common\OAuth2TokenBuilder;

class AdwordsDashboardsController extends Controller
{
    public function index()
    {

    	$ads = new GoogleAds();
    	$ads->service(CampaignService::class);
    	$campaignService = $ads->service(CampaignService::class);
		// $ads->service(AdGroupService::class);
		// $ads->service(AdGroupAdService::class);
		// $ads->service = google_service(CampaignService::class);
		//$ads->service(CampaignService::class)
		//    ->select(['199-359-6438', 'LARADA SCIENCES', 'Status', 'ServingStatus', 'StartDate', 'EndDate'])
		//    ->get();
		//   	$ads->env('test')
		//    ->oAuth([
		//        'clientId' => '448998543617-5b5b2l7tu0emlh1bs0oer78n0pke1hl4.apps.googleusercontent.com',
		//        'clientSecret' => '7Y3W9H-JBEbG922yj1zhITPi',
		//        'refreshToken' => '1/ITL2Qtl-x4kk0__oznQnkcBTgMl-j0bRFANK5Mq8DKA'
		//    ])
		//   	->session([
		//     'developerToken' => 'zW4xScLTsa5mwn-hSa7u7Q',
		//     'clientCustomerId' => '199-359-6438'
		// ]);
		// $service = google_service(CampaignService::class);
		// 	$ads->service(CampaignService::class)->select(['Id', 'Name', 'Status', 'ServingStatus', 'StartDate', 'EndDate'])->get();
		// $ads->service(CampaignService::class)
		//  ->select(['Id', 'Name', 'Status', 'ServingStatus', 'StartDate', 'EndDate'])
		//  ->get();



        return view('admin.adwords_dashboards.index', compact('ads', 'types', 'service','report'));
    }
}
