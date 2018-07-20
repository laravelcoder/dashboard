<?php

namespace App\Services;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class CallMetricApi {
    protected $token;
    protected $serviceConfig;
    protected $client;
    public function __construct()
    {
        $this->serviceConfig = config('services.callmetric');
        $this->client = new Client([
            'base_uri'=>'https://api.calltrackingmetrics.com/api/v1/'
        ]);
    }

    /**
     * @param $url
     * @param string $method
     * @param array $options
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function executeRequest($url, $method = 'GET', $options = []) {
        $token = base64_encode($this->serviceConfig['api_key'].":".$this->serviceConfig['api_secret']);
        if(!isset($options['headers'])) {
            $options['headers'] = [];
        }
        if(!isset($options['headers']['Authorization'])) {
            $options['headers']['Authorization'] = "Basic $token";
        }

        return $this->client->request($method,$url, $options);
    }

    public function getNumbersForAccount($accountId, $page = 1) {
        $paginator = new LengthAwarePaginator([],0,10,1);
        if(empty($page) || $page<1)
            $page = 1;

        try {
            $resp = $this->executeRequest("accounts/$accountId/numbers.json",'GET',[
                'query'=>[
                    'page'=>$page
                ]
            ]);
            $jsonResponse = $resp->getBody()->getContents();

            if(!empty($jsonResponse)) {
                $decoded = json_decode($jsonResponse);
                $paginator = new LengthAwarePaginator($decoded->numbers, $decoded->total_entries, $decoded->per_page, $decoded->page);
            }
        } catch (GuzzleException $e) {
            report($e);
        }
        return $paginator;
    }

    public function getAllAccounts(){
        $collection = new Collection();
        try {
            $resp = $this->executeRequest('accounts.json');
            $jsonResponse = $resp->getBody()->getContents();

            if(!empty($jsonResponse)) {
                $collection = new Collection(json_decode($jsonResponse)->accounts);
            }
        } catch (GuzzleException $e) {
            report($e);
        }
        return $collection;
    }
}
