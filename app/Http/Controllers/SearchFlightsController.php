<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
class SearchFlightsController extends Controller
{
  public function __construct(Request $request){
    $this->api_key = '11193005ec7393-dd77-4f74-8f1a-417b714d8be1';
  }

    public function SearchFlights(Request $request)
    {

      // dd($request->all());
        $travelDate = date('Y-m-d', strtotime($request->flightBookingDepart));
        $travelReturnDate = date('Y-m-d', strtotime($request->flightBookingReturn));
        if($request->tripType == 'oneway'){

        $data = '{
            "searchQuery": {
              "cabinClass": "' . $request->travelClass . '",
              "paxInfo": {
                "ADULT": "' . $request->adultval . '",
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
        }else if($request->tripType == 'round'){
          $data = '{
            "searchQuery": {
              "cabinClass": "' . $request->travelClass . '",
              "paxInfo": {
                "ADULT": "' . $request->adultval . '",
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
                },
                {
                  "fromCityOrAirport": {
                    "code": "' . $request->toPlace . '"
                  },
                  "toCityOrAirport": {
                    "code": "' . $request->fromPlace . '"
                  },
                  "travelDate": "' . $travelReturnDate . '"
                }
              ],
              "searchModifiers": {
                "isDirectFlight": true,
                "isConnectingFlight": false
              }
            }
          }';
        }


// dd($data);
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

        // dd($result_array->success);
        if ($result_array->status->success == true) {
          // return $result_array;
            return view('site/search_flights',compact('result_array'));
            // return $result_array;
        } else {
          $errors = $result_array->errors;
          $result_array = $result_array;
          return view('site/search_flights',compact('result_array','errors'));
        }
    }

    public function getFarePrices(Request $request)
    {

          $uniqueTripPriceId = $request->uniqueTripPriceId;

          $data = '{
            "id":"'.$uniqueTripPriceId.'",
            "flowType":"SEARCH"
          }';


        $method = "POST";
        $url = "https://apitest.tripjack.com/fms/v1/farerule";
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

        $result_array =  $result;
        return $result_array;
    }


}
