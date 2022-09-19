<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewBookingController extends Controller
{
    public function __construct(Request $request){
        $this->api_key = '11193005ec7393-dd77-4f74-8f1a-417b714d8be1';
      }

    public function reviewDetails(Request $request)
    {
        $priceId = $request->pkey;
        $data = '{
            "priceIds" : [ "'.$priceId.'"]
          }';
        $method = "POST";
        $url = "https://apitest.tripjack.com/fms/v1/review";
        $curl = curl_init();
        switch ($method) {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, true);
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query(json_decode($data)));
        }
        //OPtions:
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'apikey:'.$this->api_key,
            'Content-Type:application/json',
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        //Execute:
        $result = curl_exec($curl);

        if (!$result) {
            die("Connection Failure");
        }
        curl_close($curl);
        // dd($result);

        $result_array =  json_decode($result);
        return view('site/passenger_details',compact('result_array'));
    }
}
