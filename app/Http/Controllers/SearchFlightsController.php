<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class SearchFlightsController extends Controller
{
    public function SearchFlights(Request $request)
    {
        // dd($request->fromPlace);
        $api_key = "11193005ec7393-dd77-4f74-8f1a-417b714d8be1";
        $client = new Client();
        // dd($client);
        $campaignsUrl = "https://apitest.tripjack.com/fms/v1/air-search-all";

        $params = ['apikey'=>$api_key];
        $campaignsResponse = $client->request('POST', $campaignsUrl, ['json' => $params,'verify'  => true,]);

        $campaignsResponseBody = json_decode($campaignsResponse->getBody()->getContents());

        dd($campaignsResponseBody);

        // $status=$campaignsResponseBody->success;
        // $campaigns=$campaignsResponseBody->data;
        // //dd($campaigns);exit();
        // dd($campaigns);

    }
}
