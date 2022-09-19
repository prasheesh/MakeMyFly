@extends('layouts.app')
@section('style-content')
    <link rel="stylesheet" href="assets/css/all.min.css">

    <!-- slick carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    {{-- mobi date picker --}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link href="{{ asset('mobiscroll/css/mobiscroll.jquery.min.css') }}" rel="stylesheet">

    <style>
        .table-booking {
            font-size: 14px;
            margin-bottom: 0;
        }

        .table-booking th {
            padding: 15px;
        }

        .table-booking td {
            padding: 15px;
        }

        .final-price {
            font-size: 18px;
            margin-bottom: 0;
        }

        .mt-5 {
            margin-top: 3rem;
        }
        .md-calendar-booking .mbsc-calendar-text {
            text-align: center;
        }

        .md-calendar-booking .booking-datetime .mbsc-datepicker-tab-calendar {
            flex: 1 1 0;
            min-width: 300px;
        }

        .md-calendar-booking .mbsc-timegrid-item {
            margin-top: 1.5em;
            margin-bottom: 1.5em;
        }

        .md-calendar-booking .mbsc-timegrid-container {
            top: 30px;
        }

        .modal-header {
            background: #3f90a1;
            color: #fff;
            border-radius: 0;
        }

        .modal-header i {
            color: #fff;
        }

        .count {
            margin: 0;
            padding: 0;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);
            border-radius: 6px;
            overflow: hidden;
            width: auto;
            float: left;
        }

        .count li {
            padding: 10px 15px;
            list-style: none;
            float: left;
            transition: 0.3s;
            border-right: solid 0px #ccc;
        }

        .count li:hover {
            background: #3f90a1;
            color: #fff;
            transition: 0.3s;
        }

        .count li.active {
            background: #3f90a1;
            color: #fff;
            transition: 0.3s;
        }
    </style>
@endsection;

@section('content')
    <!-- book modal -->


    @if ($result_array->status->success == true && $result_array->status->httpStatus ==200 )


    @foreach ($result_array->searchResult->tripInfos->ONWARD as $key => $value)



    <div class="modal" id="book-table{{ $value->sI[0]->id }}">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body p-0">

                    <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-times"></i></button>

                    <table class="table table-booking" style="">
                        <thead class="bg-grey" style="border-bottom: 2px solid #fff;">
                            <tr>
                                <th class="">FARES </th>
                                <th>CABIN BAG</th>
                                <th>CHECK-IN</th>
                                <th>CANCELLATION</th>
                                <th>DATE CHANGE</th>
                                <th>SEAT</th>
                                <th>MEAL</th>
                                <th></th>
                            </tr>

                        </thead>
                        <tbody>

<?php
$i=1;
$id=1;
$c=1;
$d=1;
$s=1;
$totalPriceList = count($value->totalPriceList);


?>
<input type="text" name="totalPriceList{{ $value->sI[0]->id }}" id="totalPriceList{{ $value->sI[0]->id }}" value="{{ $totalPriceList}}">
                          @foreach ($value->totalPriceList as $key => $values)

                            <tr>
                                <td class=""><b>Saver</b>
                                  <input type="text" name="uniqueTripPriceId{{ $value->sI[0]->id }}{{ $i++ }}" id="uniqueTripPriceId{{ $value->sI[0]->id }}{{ $id++ }}" value="{{ $values->id }}">

                                    <p>
                                        Fair offered by airline.
                                    </p>
                                </td>
                                <td>{{ $values->fd->ADULT->bI->cB }}</td>
                                <td>{{ $values->fd->ADULT->bI->iB }}</td>
                                <td id="cancellation{{ $value->sI[0]->id }}{{ $c++ }}">
                                    {{-- cancellation <br> fee starting <i class="fa-solid fa-indian-rupee-sign"></i> 3,500 --}}
                                 </td>
                                <td id="dateChangeText{{ $value->sI[0]->id }}{{ $d++ }}">
                                    {{-- Date change <br> fee starting <i class="fa-solid fa-indian-rupee-sign"></i> 3250 --}}
                                </td>
                                <td id="seatChargeId{{ $value->sI[0]->id }}{{ $s++ }}">
                                    {{-- Middle Seat Free, <br> Window/Asile Chargeable --}}
                                </td>
                                <td>
                                    @if (isset($values->fd->ADULT->mI))
                                    @if($values->fd->ADULT->mI == true)
                                    Free Meal
                                    @else
                                    Paid Meal
                                    @endif

                                    @endif


                                </td>
                                <td align="right">
                                    <p class="final-price"><b><i class="fa-solid fa-indian-rupee-sign"></i>{{ number_format($values->fd->ADULT->fC->NF) }}</b></p>
                                    <a href="{{ route('reviewDetails') }}?pkey={{ $values->id }}"> <button class="btn btn-book-now">Book Now</button> </a>
                                </td>

                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>


    <!-- book modal end -->
@endforeach

@endif

    <section class="bg-grey" style="height: 300px; margin-bottom: -150px;">
        <form method="get" action="{{ route('SearchFlights') }}" name="searchOneWay" id="searchOneWay">
            @csrf
        <div class="container container-make mt-5" style="  ">

            <div class="row">
                <div class="col-md-2 " style="">

                    <div class="airport-name-inner ">
                        <small class="inner-smaltext">Trip Type</small>
                        <select name="trip_type" id="trip_type" class="form-control">
                            <option value="oneway">One Way Trip</option>
                            <option <?php  if(isset($_GET['flightBookingReturn'])){echo 'selected';} ?> value="2">Round Trip</option>
                            <option value="3">Multi-Trip</option>
                        </select>
                        {{-- <p><b>Round trip</b></p> --}}

                    </div>
                </div>
                <div class="col-md-3" style="position: relative;">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="airport-name-inner">
                               <small class="inner-smaltext">From</small>
                            {{--      <p><b>Hyderabad</b></p> --}}

                                <select class="form-control" name="fromPlace" id="fromPlace">
                                    {{-- <option value="">Select From</option> --}}
                                    @foreach (DB::table('airport_details')->get() as $airport)
                                        <option <?php echo $_GET['fromPlace']==$airport->code?"selected":"" ?> value="{{ $airport->code }}">{{ $airport->name . ', ' . $airport->country }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <span  class=" from-to-inner"> </span>

                        </div>

                        <div class="col-md-6">
                            <div class="airport-name-inner">
                                <small class="inner-smaltext">To</small>
                                <select class="form-control" name="toPlace" id="toPlace">
                                    {{-- <option value="">Select To</option> --}}
                                    @foreach (DB::table('airport_details')->get() as $airport)
                                        <option <?php echo $_GET['toPlace']==$airport->code?"selected":"" ?> value="{{ $airport->code }}">{{ $airport->name . ', ' . $airport->country }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <span id="sameFromTo"  class="validation-error">From & To airports cannot be the same</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="airport-name-inner">
                                <small class="inner-smaltext">Departure</small>
                                <div class="mbsc-row">
                                    <label>
                                        {{-- Departure --}}

                                        <input id="flightBookingDepart" mbsc-input data-input-style="outline" name="flightBookingDepart"
                                            data-label-style="stacked" placeholder="Please select..." value="{{ $_GET['flightBookingDepart'] }}"/>
                                    </label>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="airport-name-inner" style=" padding: 6px 10px;">
                                <small>Return</small>
                                <label>
                                    {{-- Return --}}
                                    <?php
                                    if(isset($_GET['flightBookingReturn'])){
                                        $return_date = $_GET['flightBookingReturn'];
                                    }else{
                                        $return_date = '';
                                    }
                                    ?>
                                    <input id="flightBookingReturn" name="flightBookingReturn" mbsc-input data-input-style="outline"
                                        data-label-style="stacked" placeholder="Please select..." value="{{ $return_date }}" />
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Travellers & Class</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"><i
                                    class="fa fa-times"></i></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">

                                <div class="col-md-7 mb-4">
                                    <p>ADULTS (12y +)</p>
                                    <ul class="count" id="passengerCount">
                                        <li class="active" id="adult1" data-val="1">1</li>
                                        <li data-val="2" id="adult2">2</li>
                                        <li data-val="3" id="adult3">3</li>
                                        <li data-val="4" id="adult4">4</li>
                                        <li data-val="5" id="adult5">5</li>
                                        <li data-val="6" id="adult6">6</li>
                                        <li data-val="7" id="adult7">7</li>
                                        <li data-val="8" id="adult8">8</li>
                                        <li data-val="9" id="adult9">9</li>
                                    </ul>
                                </div>

                                {{-- <div class="col-md-5 mb-4">
  <p>CHILDREN (2y - 12y )</p>
  <ul class="count">
    <li class="active">0</li>
    <li>1</li>
    <li>2</li>
    <li>2</li>
    <li>4</li>
    <li>5</li>
    <li>6</li>
  </ul>
</div>

<div class="col-md-12 mb-4">
  <p>INFANTS (below 2y)</p>
  <ul class="count">
    <li class="active">0</li>
    <li>1</li>
    <li>2</li>
    <li>2</li>
    <li>4</li>
    <li>5</li>
    <li>6</li>
  </ul>
</div> --}}

                                <div class="col-md-12 mb-4">
                                    <p>CHOOSE TRAVEL CLASS</p>
                                    <ul class="count" id="chooseTravel">
                                        {{-- <li class="active" id="travel1" data-val="PREMIUM_ECONOMY">Premium Economy</li> --}}
                                        <li class="active" id="travel2" data-val="ECONOMY">Economy</li>
                                        <li id="travel3" data-val="BUSINESS">Business</li>
                                        <li id="travel4" data-val="FIRST">First Class</li>
                                    </ul>
                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-one" data-bs-dismiss="modal">Close</button>
                            <button id="saveTravelDetail" type="button" class="btn btn-theme"
                                data-bs-dismiss="modal">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal end -->


                <div class="col-md-2 travellerData" >

                    <div class="airport-name-inner" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <input type="hidden" value="1" id="adultval" name="adultval" class="">
                            <input type="hidden" value="ECONOMY" name="travelClass" id="travelClass" class="">
                        <small class="inner-smaltext">Travellers & Class</small>
                        <span id="travelInfo">
                        <p ><b>1 Adult</b></p>
                        </span>
                    </div>
                </div>

                <div class="col-md-2 ms-auto">
                    <button type="submit" class="btn btn-search-flights" id="searchFlightsButton">Search Flights</button>
                </div>
            </div>

        </div>
        </form>
    </section>
    {{-- {{ print_r($result_array->searchResult->tripInfos->ONWARD[0]) }} --}}

    <section style="padding-top: 50px;">

        <div class="container container-make">
            <div class="row">
                <div class="col-md-3 p-3">
                    <div class="card">
                        <div class=" card-body card-shadow">
                            <h5>One Way Price</h5>

                            <div class="mt-4">
                                <form>
                                    <input type="range" name="" class="form-range">
                                </form>
                                <span class=" left-range"><i class="fa-solid fa-indian-rupee-sign"></i> 6,363</span>
                                <span class=" right-range"><i class="fa-solid fa-indian-rupee-sign"></i> 20,636</span>

                            </div>

                            <div class="mt-4">
                                <h5>Stops From Hyderabad</h5>
                                <div class="d-flex justify-content-between mt-3">
                                    <div> <input type="radio" name=""> 1 Stop (2)</div>
                                    <div> <i class="fa-solid fa-indian-rupee-sign"></i> 6,363</div>
                                </div>
                                <div class="d-flex justify-content-between mt-2">
                                    <div> <input type="radio" name=""> 1 Stop (2)</div>
                                    <div> <i class="fa-solid fa-indian-rupee-sign"></i> 6,363</div>
                                </div>
                                <div class="d-flex justify-content-between mt-2">
                                    <div> <input type="radio" name=""> 1 Stop (2)</div>
                                    <div> <i class="fa-solid fa-indian-rupee-sign"></i> 6,363</div>
                                </div>
                            </div>


                            <div class="mt-4">
                                <h5>Departure From Hyderabad</h5>

                                <div class="row mt-3">
                                    <div class="col-md-4 align-items-center main-departure">
                                        <div class="departure-1">
                                            <div class=""><img src="assets/img/sun-set-1.png" class="img-fluid">
                                            </div>
                                            <p>Before 6 AM <br> 9418</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 main-departure">
                                        <div class="departure-1">
                                            <div class=""><img src="assets/img/sun-set-1.png" class="img-fluid">
                                            </div>
                                            <p>Before 6 AM <br> 9418</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 main-departure">
                                        <div class="departure-1">
                                            <div class=""><img src="assets/img/sun-set-1.png" class="img-fluid">
                                            </div>
                                            <p>Before 6 AM <br> 9418</p>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="mt-4">
                                <h5>Arrival at Mumbai</h5>

                                <div class="row mt-3">
                                    <div class="col-md-4 align-items-center main-departure">
                                        <div class="departure-1">
                                            <div class=""><img src="assets/img/sun-set-1.png" class="img-fluid">
                                            </div>
                                            <p>Before 6 AM <br> 9418</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 main-departure">
                                        <div class="departure-1">
                                            <div class=""><img src="assets/img/sun-set-1.png" class="img-fluid">
                                            </div>
                                            <p>Before 6 AM <br> 9418</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 main-departure">
                                        <div class="departure-1">
                                            <div class=""><img src="assets/img/sun-set-1.png" class="img-fluid">
                                            </div>
                                            <p>Before 6 AM <br> 9418</p>
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <div class="mt-4">
                                <h5>Airlines</h5>
                                <div class="d-flex justify-content-between mt-3">
                                    <div> <input type="radio" name=""> 1 Stop (2)</div>
                                    <div> <i class="fa-solid fa-indian-rupee-sign"></i> 6,363</div>
                                </div>
                                <div class="d-flex justify-content-between mt-2">
                                    <div> <input type="radio" name=""> 1 Stop (2)</div>
                                    <div> <i class="fa-solid fa-indian-rupee-sign"></i> 6,363</div>
                                </div>
                                <div class="d-flex justify-content-between mt-2">
                                    <div> <input type="radio" name=""> 1 Stop (2)</div>
                                    <div> <i class="fa-solid fa-indian-rupee-sign"></i> 6,363</div>
                                </div>
                                <div class="text-end mt-2"><a href="#">View more</a></div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-9 p-3">
                    <div class="card">
                        <div class="card-body card-shadow">
                            @if ( $result_array->status->success == true && $result_array->status->httpStatus ==200 )
                            <h5>Flights from {{ $result_array->searchResult->tripInfos->ONWARD[0]->sI[0]->da->city }} to {{ $result_array->searchResult->tripInfos->ONWARD[0]->sI[0]->aa->city }}</h5>
                            @endif
                            <div class="wrapper">
                                <div class="carousel">
                                    <div class="date-active">
                                        <p class="date-inner ">Mon, Jul 04</p>
                                        <p class="price-inner"><i class="fa-solid fa-indian-rupee-sign"></i> 6,825</p>
                                    </div>
                                    <div>
                                        <p class="date-inner">Mon, Jul 04</p>
                                        <p class="price-inner"><i class="fa-solid fa-indian-rupee-sign"></i> 6,825</p>
                                    </div>
                                    <div>
                                        <p class="date-inner">Mon, Jul 04</p>
                                        <p class="price-inner"><i class="fa-solid fa-indian-rupee-sign"></i> 6,825</p>
                                    </div>
                                    <div>
                                        <p class="date-inner">Mon, Jul 04</p>
                                        <p class="price-inner"><i class="fa-solid fa-indian-rupee-sign"></i> 6,825</p>
                                    </div>
                                    <div>
                                        <p class="date-inner">Mon, Jul 04</p>
                                        <p class="price-inner"><i class="fa-solid fa-indian-rupee-sign"></i> 6,825</p>
                                    </div>
                                    <div>
                                        <p class="date-inner">Mon, Jul 04</p>
                                        <p class="price-inner"><i class="fa-solid fa-indian-rupee-sign"></i> 6,825</p>
                                    </div>
                                    <div>
                                        <p class="date-inner">Mon, Jul 04</p>
                                        <p class="price-inner"><i class="fa-solid fa-indian-rupee-sign"></i> 6,825</p>
                                    </div>
                                    <div>
                                        <p class="date-inner">Mon, Jul 04</p>
                                        <p class="price-inner"><i class="fa-solid fa-indian-rupee-sign"></i> 6,825</p>
                                    </div>
                                    <div>
                                        <p class="date-inner">Mon, Jul 04</p>
                                        <p class="price-inner"><i class="fa-solid fa-indian-rupee-sign"></i> 6,825</p>
                                    </div>
                                    <div>
                                        <p class="date-inner">Mon, Jul 04</p>
                                        <p class="price-inner"><i class="fa-solid fa-indian-rupee-sign"></i> 6,825</p>
                                    </div>
                                    <div>
                                        <p class="date-inner">Mon, Jul 04</p>
                                        <p class="price-inner"><i class="fa-solid fa-indian-rupee-sign"></i> 6,825</p>
                                    </div>
                                    <div>
                                        <p class="date-inner">Mon, Jul 04</p>
                                        <p class="price-inner"><i class="fa-solid fa-indian-rupee-sign"></i> 6,825</p>
                                    </div>
                                    <div>
                                        <p class="date-inner">Mon, Jul 04</p>
                                        <p class="price-inner"><i class="fa-solid fa-indian-rupee-sign"></i> 6,825</p>
                                    </div>
                                    <div>
                                        <p class="date-inner">Mon, Jul 04</p>
                                        <p class="price-inner"><i class="fa-solid fa-indian-rupee-sign"></i> 6,825</p>
                                    </div>
                                    <div>
                                        <p class="date-inner">Mon, Jul 04</p>
                                        <p class="price-inner"><i class="fa-solid fa-indian-rupee-sign"></i> 6,825</p>
                                    </div>
                                    <div>
                                        <p class="date-inner">Mon, Jul 04</p>
                                        <p class="price-inner"><i class="fa-solid fa-indian-rupee-sign"></i> 6,825</p>
                                    </div>
                                    <div>
                                        <p class="date-inner">Mon, Jul 04</p>
                                        <p class="price-inner"><i class="fa-solid fa-indian-rupee-sign"></i> 6,825</p>
                                    </div>
                                    <div>
                                        <p class="date-inner">Mon, Jul 04</p>
                                        <p class="price-inner"><i class="fa-solid fa-indian-rupee-sign"></i> 6,825</p>
                                    </div>
                                    <div>
                                        <p class="date-inner">Mon, Jul 04</p>
                                        <p class="price-inner"><i class="fa-solid fa-indian-rupee-sign"></i> 6,825</p>
                                    </div>
                                    <div>
                                        <p class="date-inner">Mon, Jul 04</p>
                                        <p class="price-inner"><i class="fa-solid fa-indian-rupee-sign"></i> 6,825</p>
                                    </div>

                                </div>
                            </div>

                            <table class="table mt-3 mb-3">
                                <thead class="bg-thead">
                                    <tr>

                                        <th>Sorted By: </th>
                                        <th>Departure</th>
                                        <th>Duration</th>
                                        <th>Arrival</th>
                                        <th>Price</th>

                                    </tr>
                                </thead>
                                <tbody class="bg-tbody">

                                  {{-- {{ print_r($result_array->searchResult->tripInfos->ONWARD[2]->totalPriceList ) }} --}}

                                  @if ( $result_array->status->success == true && $result_array->status->httpStatus ==200 )

<?php $sno=1;

$flight_count =  count($result_array->searchResult->tripInfos->ONWARD);



?>

                                    @foreach ($result_array->searchResult->tripInfos->ONWARD as $key => $value)
                                        {{-- {{ print_r($value->totalPriceList[0]->fd->ADULT) }} --}}
                                        {{-- {{  $key.'<<<=>>>>'.print_r($value->totalPriceList[0]) }} --}}



                                        <tr>
                                            <td style="width:25%">
                                                <div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <?php
                                                            if ($value->sI[0]->fD->aI->code == '6E') {
                                                                $flight_logo = 'assets/img/flight-logo-2.png';
                                                            }elseif ($value->sI[0]->fD->aI->code == 'AI') {
                                                                $flight_logo = 'assets/img/sorted-flights.png';
                                                            }elseif ($value->sI[0]->fD->aI->code == 'EK') {
                                                                $flight_logo = 'assets/img/sorted-flights.png';
                                                            }else{
                                                                $flight_logo = 'assets/img/flight-logo-3.png';
                                                            }
                                                             ?>
                                                            <img src="{{ $flight_logo }}">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <p class="flight-number">
                                                                FI.No.{{ $value->sI[0]->fD->aI->code }}
                                                                {{ $value->sI[0]->fD->fN }}</p>
                                                            <p class="flight-brand">{{ $value->sI[0]->fD->aI->name }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td style="width:15%">
                                                <div>
                                                    <p class="flight-number">{{ $value->sI[0]->da->city }}</p>
                                                    <p class="flight-brand">{{ date('H:m', strtotime($value->sI[0]->dt)) }}
                                                    </p>
                                                </div>
                                            </td>
                                            <td style="width:25%">
                                                <div>
                                                    <p class="flight-number"><span class="brdr-btm-time">
                                                            @if ($value->sI[0]->stops == '0')
                                                                NON-STOP
                                                            @else
                                                                {{ $value->sI[0]->stops }} Stops
                                                            @endif

                                                        </span></p>
                                                    <?php
                                                    $minutes = $value->sI[0]->duration;
                                                    $hours = intdiv($minutes, 60) . ' h ' . $minutes % 60 . ' m';
                                                    ?>

                                                    <p class="flight-brand">{{ $hours }} </p>
                                                </div>
                                            </td>
                                            <td style="width:15%">
                                                <div>
                                                    <p class="flight-number">{{ $value->sI[0]->aa->city }}</p>
                                                    <p class="flight-brand">{{ date('H:m', strtotime($value->sI[0]->at)) }}
                                                    </p>
                                                </div>
                                            </td>
                                            <td style="width:20%">
                                                <div>
                                                    <p class=" flight-brand"><i class="fa-solid fa-indian-rupee-sign"></i>

                                                        {{ number_format($value->totalPriceList[0]->fd->ADULT->fC->TF,0) }}
                                                    </p>
                                                    <p class="flight-brand"><a href="#" data-bs-toggle="modal" id="" class="airportApiId{{ $sno++ }}"
                                                            data-bs-target="#book-table{{ $value->sI[0]->id }}" data-airportId={{ $value->sI[0]->id }}
                                                            data-flight_count={{ $flight_count }} onclick="getFareRules()">View & More</a></p>
                                                </div>
                                            </td>
                                        </tr>


                                    @endforeach

                                    @else
                                    {{-- {{ print_r($errors) }} --}}

                                    <tr>
                                      <td colspan="5" align="center"><div>{{ $errors[0]->message}}</div></td>
                                    </tr>
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection

@section('script-content')
    <!-- slick js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick.min.js"></script>

        <script type="text/javascript">
        $(document).ready(function() {
            $('.carousel').slick({
                slidesToShow: 7,
                dots: false,
                centerMode: true,
            });
        });
    </script>

<script src="{{ asset('mobiscroll/js/mobiscroll.jquery.min.js') }}"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<script>



$('#fromPlace').select2({
            placeholder: 'Select from',
        });
    $('#toPlace').select2({
            placeholder: 'Select to'
        });


        $(function() {


            var todayDate = $('#flightBookingDepart').val();
            var returnDate = $('#flightBookingReturn').val();

            var d = new Date(todayDate);
            // var month = d.getMonth() + 1;
            // var day = d.getDate();

            var maxDate = parseInt(d.getFullYear() + 1) + '-03-31';


            mobiscroll.setOptions({
                locale: mobiscroll
                    .localeEn, // Specify language like: locale: mobiscroll.localePl or omit setting to use default
                theme: 'ios', // Specify theme like: theme: 'ios' or omit setting to use default
                themeVariant: 'light' // More info about themeVariant: https://docs.mobiscroll.com/5-18-2/calendar#opt-themeVariant
            });

            // Mobiscroll Calendar initialization
            var min = todayDate;
            var max = maxDate;
            var booking = $('#flightBookingDepart').mobiscroll().datepicker({
                controls: [
                    'calendar'
                ], // More info about controls: https://docs.mobiscroll.com/5-18-2/range#opt-controls
                select: 'range', // More info about select: https://docs.mobiscroll.com/5-18-2/range#methods-select
              //  display: 'anchored', // Specify display mode like: display: 'bottom' or omit setting to use default
                startInput: '#flightBookingDepart', // More info about startInput: https://docs.mobiscroll.com/5-18-2/range#opt-startInput
                endInput: '#flightBookingReturn', // More info about endInput: https://docs.mobiscroll.com/5-18-2/range#opt-endInput
                min: min, // More info about min: https://docs.mobiscroll.com/5-18-2/range#opt-min
                max: max, // More info about max: https://docs.mobiscroll.com/5-18-2/range#opt-max
                pages: 1,
                dateFormat: 'DDD, DD MMM YYYY',
                onInit: function(event,
                inst) { // More info about onInit: https://docs.mobiscroll.com/5-18-2/calendar#event-onInit
                    inst.setVal([min], true);

                },


            }).mobiscroll('getInst');


            var oneWayDis = $("#trip_type").val();
            $('#flightBookingReturn').mobiscroll('getInst').setOptions({
                disabled: oneWayDis
            });
            if (oneWayDis) {
                booking.setOptions({
                    select: 'date' // More info about select: https://docs.mobiscroll.com/5-18-2/range#methods-select
                });
            } else {
                booking.setOptions({
                    select: 'range' // More info about select: https://docs.mobiscroll.com/5-18-2/range#methods-select
                });
            }

            $('#trip_type').on('change', function() {
                var oneWay = this.value == 'oneway';
                $('#flightBookingReturn').mobiscroll('getInst').setOptions({
                    disabled: oneWay
                });

                if (oneWay) {
                    booking.setOptions({
                        select: 'date' // More info about select: https://docs.mobiscroll.com/5-18-2/range#methods-select
                    });
                } else {
                    booking.setOptions({
                        select: 'range' // More info about select: https://docs.mobiscroll.com/5-18-2/range#methods-select
                    });
                }
            });
            });

            $('.from-to-inner').click(function() {
                var fromPlace = $('#fromPlace').val();
                var toPlace = $('#toPlace').val();

                $('#fromPlace').val(toPlace);
                $('#toPlace').val(fromPlace);
                $('#toPlace').trigger('change');
                $('#fromPlace').trigger('change');
                // console.log($('#fromPlace :selected').text());
            });


             //choose no of passenger
             $('#passengerCount li').click(function() {
                // alert($(this).data('val'));
                $("#passengerCount li").removeClass('active');
                $(this).addClass('active');
            });

            //Choose travel type
            $('#chooseTravel li').click(function() {
                // alert($(this).data('val'));
                $("#chooseTravel li").removeClass('active');
                $(this).addClass('active');
            });

            $(document).on('click', '#saveTravelDetail', function() {
                // $('#saveTravelDetail').click(function(){

                localStorage.clear();
                var adultsVal = $("#passengerCount .active").data('val');
                var travelClassVal = $("#chooseTravel .active").data('val');

                var adultsId = $("#passengerCount .active").attr('id');
                var travelId = $("#chooseTravel .active").attr('id');

                //    alert(adults);

                localStorage.setItem('adultsVal', adultsVal);
                localStorage.setItem('travelClassVal', travelClassVal);
                localStorage.setItem('adultsId', adultsId);
                localStorage.setItem('travelId', travelId);

                // alert(adultsVal);
                $('#travelClass').val(travelClassVal);
                $('#adultval').val(adultsVal);



                if (travelClassVal == 'PREMIUM_ECONOMY') {
                    var travelName = "Premium Economy";
                } else if (travelClassVal == 'ECONOMY') {
                    var travelName = "Economy";
                } else if (travelClassVal == 'BUSINESS') {
                    var travelName = "Business";
                } else if (travelClassVal == 'FIRST') {
                    var travelName = "First Class";
                }




                $('#travelInfo').replaceWith('<div class="airport-name" id="travelInfo"><p><b>' +
                    adultsVal + ' Adult </b></p><p>' + travelName + '</p></div>');

            });

            $('.travellerData').click(function() {
                // alert('hj');
                let adultsId = localStorage.getItem('adultsId');
                let travelId = localStorage.getItem('travelId');

                if (adultsId == null || travelId == null) {
                    $('#adult1').addClass('active');
                    $('#travel2').addClass('active');

                } else {

                    $("#passengerCount li").removeClass('active');
                    $('#' + adultsId).addClass('active');

                    $("#chooseTravel li").removeClass('active');
                    $('#' + travelId).addClass('active');
                }
            });

            let adultsVal = localStorage.getItem('adultsVal');
            if (adultsVal == null) {
                adultsVal = '1';
                localStorage.setItem('adultsVal', adultsVal);
                $('#adultval').val(adultsVal);

            }
            let travelClassVal = localStorage.getItem('travelClassVal');
            if (travelClassVal == null) {
                travelClassVal = 'ECONOMY';
                localStorage.setItem('travelClassVal', travelClassVal);
                $('#travelClass').val(travelClassVal);
            }

            $('#travelClass').val(travelClassVal);
            $('#adultval').val(adultsVal);

            if (travelClassVal == 'PREMIUM_ECONOMY') {
                var travelName = "Premium Economy";
            } else if (travelClassVal == 'ECONOMY') {
                var travelName = "Economy";
            } else if (travelClassVal == 'BUSINESS') {
                var travelName = "Business";
            } else if (travelClassVal == 'FIRST') {
                var travelName = "First Class";
            }

            $('#travelInfo').replaceWith('<div class="airport-name" id="travelInfo"><p><b>' + adultsVal +
                ' Adult </b></p><p>' + travelName + '</p></div>');

                $('#fromPlace, #toPlace').on('change', function() {
                var fromPlace = $('#fromPlace').val();
                var toPlace = $('#toPlace').val();
                if (fromPlace == toPlace) {
                    $('#sameFromTo').show();
                    $('#searchFlightsButton').hide();

                } else {
                    $('#sameFromTo').hide();
                    $('#searchFlightsButton').show();
                }

            });
// $( document ).ready( getFareRules );

  function getFareRules(){
var flight_count = $('.airportApiId1').attr('data-flight_count');
for(i=1;i<=flight_count;i++){

  var airportApiId = $('.airportApiId'+i).attr('data-airportId');
    // alert(airportApiId);

    var totalPriceList = $('#totalPriceList'+airportApiId).val();

    // alert(totalPriceList);

    for(j=1;j<=totalPriceList;j++){
        var uniqueTripPriceId = $('#uniqueTripPriceId'+airportApiId+j).val();
        // console.log(uniqueTripPriceId);
        var cancellationId = 'cancellation'+airportApiId+j;
        var dateChangeId = 'dateChangeText'+airportApiId+j;
        var seatChargeId = 'seatChargeId'+airportApiId+j;



     getFarePrices(uniqueTripPriceId,cancellationId,dateChangeId,seatChargeId);

    }

}

function getFarePrices(uniqueTripPriceId,cancellationId,dateChangeId,seatChargeId){

    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
          });

        $.ajax({
          type:'POST',
          url:'{{ route('getFarePrices') }}',
          data: {'uniqueTripPriceId':uniqueTripPriceId},
          dataType:'json',
          success: function(data){
            if(data.status.success == true && data.status.httpStatus == '200'){

                $.each(data.fareRule,function(k) {
                    // console.log(data.fareRule[k].fr.CANCELLATION.DEFAULT.policyInfo);

                    if((data.fareRule[k].fr.CANCELLATION).hasOwnProperty('DEFAULT') == true){
                    let cancellationText  = data.fareRule[k].fr.CANCELLATION.DEFAULT.policyInfo;
                    let myArray = cancellationText.replace(/__nls__/g,"<br>");
                    $('#'+cancellationId).html(myArray);


                    let dateChangeText  = data.fareRule[k].fr.DATECHANGE.DEFAULT.policyInfo;
                    let dateDisplay =  dateChangeText.replace(/__nls__/g,"<br>");
                    $('#'+dateChangeId).html(dateDisplay);

                    let seatCharge  = data.fareRule[k].fr.SEAT_CHARGEABLE.DEFAULT.policyInfo;
                    $('#'+seatChargeId).html(seatCharge);
                    }else{


                    let cancellationText  = data.fareRule[k].fr.CANCELLATION.BEFORE_DEPARTURE.policyInfo;
                    let myArray = cancellationText.replace(/__nls__/g,"<br>");
                    $('#'+cancellationId).html(myArray);

                    let dateChangeText  = data.fareRule[k].fr.DATECHANGE.BEFORE_DEPARTURE.policyInfo;
                    let dateDisplay =  dateChangeText.replace(/__nls__/g,"<br>");
                    $('#'+dateChangeId).html(dateDisplay);

                    // let seatCharge  = data.fareRule[k].fr.SEAT_CHARGEABLE.DEFAULT.policyInfo;
                    // $('#'+seatChargeId).html(seatCharge);



                    }

                });
            }



          }
        })
}

  }



</script>

@endsection
