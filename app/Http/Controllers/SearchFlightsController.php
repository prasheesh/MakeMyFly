<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class SearchFlightsController extends Controller
{

    public function SearchFlights(Request $request)
    {
        $travelDate = date('Y-m-d', strtotime($request->flightBookingDepart));

        $data = '{
            "searchQuery": {
              "cabinClass": "' . $request->travelClassVal . '",
              "paxInfo": {
                "ADULT": "' . $request->adultsVal . '",
                "CHILD": "0",
                "INFANT": "0"
              },
              "routeInfos": [
                {
                  "fromCityOrAirport": {
                    "code": "' . $request->fromPlace . '"
                  },
                  "toCityOrAirport": {
                    "code": "' . $request->toPlace . '"
                  },
                  "travelDate": "' . $travelDate . '"
                }
              ],
              "searchModifiers": {
                "isDirectFlight": true,
                "isConnectingFlight": false
              }
            }
          }';


        $method = "POST";

        $url = "https://apitest.tripjack.com/fms/v1/air-search-all";
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
            'apikey:11193005ec7393-dd77-4f74-8f1a-417b714d8be1',
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

        // dd($result_array->success);
        if ($result_array->status->success == true) {
            return view('site/search_flights',compact('result_array'));
            // return $result_array;
        } else {
            return $result_array;
        }
    }
}
