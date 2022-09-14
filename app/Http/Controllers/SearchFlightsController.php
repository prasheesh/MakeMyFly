<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchFlightsController extends Controller
{
    public function SearchFlights(Request $request)
    {
        dd($request->all());
    }
}
