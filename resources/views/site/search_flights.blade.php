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
        .round-trip1 p {
      font-size: 15px;
      font-weight: 500;
    }

    .round-trip1 span {
      font-size: 12px;
      margin-left: 5px;
    }

    .shadow {
      border: 1px solid #b0dae3;
    }

    .departture {
      text-align: left;
    }

    .departture p {
      font-weight: 600;
      font-size: 16px;
      margin-bottom: 0;
    }

    .departture span:nth-child(1) {
      font-size: 16px;
      font-weight: 600;
      border-bottom: 1px solid #ccc;
      margin-bottom: 0px;
    }

    .departture span:nth-child(2) {
      font-size: 10px;
      margin-bottom: 0px;
    }

    .shadow img {
      width: 40px;
    }

    .time-gap span:nth-child(1) {
      font-size: 11px;
      font-weight: 500;
      padding-bottom: 3px;
      line-height: 0;
    }

    .price-round {
      font-size: 13px !important;
      font-weight: 600 !important;
      text-align: center;
    }

    .price-round i {
      font-size: 11px;
    }

    .departture input {
      width: 20px;
      height: 20px;
      /* border-bottom: 5px solid #ccc; */
      margin-bottom: 5px;
      margin-top: 0;
    }

    .pricedetails {
      position: relative;
    }

    .pricedetails-btm {
      position: sticky;
      bottom: 0;
      background-color: #9bd3df;
      padding: 15px;
      border-radius: 5px;
      width: 100%;
      z-index: 9999;
      float: right;
      margin-top: 15px;
    }

    .btm-price {
      border-right: 1px solid #293389;

    }

    .btm-flights-price p {
      font-weight: 600;
      margin-bottom: 0;
      font-size: 13px;
    }

    .btm-flights-price a {
      color: #0d6efd;
      font-size: 12px;
    }

    .btm-fligh-price {
      text-align: right !important;
      margin-top: 15px;
    }

    .btm-fligh-price p {
      text-align: right !important;
    }

    .btm-fligh-price a {
      color: #0d6efd;
      font-size: 12px;
    }

    .fixed-btm {
      position: relative;
    }

    :host {
      display: block;
    }
    .final-price {
      font-size: 18px;
      margin-bottom: 0;
    }

    .bg-tablle {
      display: flex;
      background-color: #eeeeee;
      padding: 0px 5px;
      margin-top: 15px;
    }

    .bg-tablle p {
      width: 33%;
      padding: 1px 5px;
      font-size: 13px;
    }

    .loader_div{
  position: absolute;
  top: 0;
  bottom: 0%;
  left: 0;
  right: 0%;
  z-index: 9999;
  opacity:0.7;
  display:none;
  background: lightgrey url('http://cdnjs.cloudflare.com/ajax/libs/semantic-ui/0.16.1/images/loader-large.gif') center center no-repeat;
}
    </style>
@endsection

@section('content')
<div id="loader_div" class="loader_div"></div>
    <!-- book modal -->

    @if($_GET['tripType'] == 'oneway')

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
@endif

    <section class="bg-grey" style="height: 300px; margin-bottom: -150px;">
        <form method="get" action="{{ route('SearchFlights') }}" name="searchOneWay" id="searchOneWay">
            @csrf
        <div class="container container-make mt-5" style="  ">

            <div class="row">
                <div class="col-md-2 " style="">

                    <div class="airport-name-inner ">
                        <small class="inner-smaltext">Trip Type</small>
                        <select name="tripType" id="trip_type" class="form-control">
                            <option <?php  if($_GET['tripType']=='oneway'){echo 'selected';} ?> value="oneway">One Way Trip</option>
                            <option <?php  if($_GET['tripType']=='round'){echo 'selected';} ?> value="round">Round Trip</option>
                            <option <?php  if($_GET['tripType']=='multi'){echo 'selected';} ?> value="3">Multi-Trip</option>
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
                                {{-- <div class="mbsc-row"> --}}
                                    <label>
                                        {{-- Departure --}}

                                        <input autocomplete="off" id="flightBookingDepart" name="flightBookingDepart"
                                             placeholder="Please select..." value="{{ $_GET['flightBookingDepart'] }}"/>
                                    </label>

                                {{-- </div> --}}
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
                                    <input autocomplete="off" id="flightBookingReturn" name="flightBookingReturn"
                                      placeholder="Please select..." value="{{ $return_date }}" />
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

                <div class="col-md-9 p-3 bbook-price-details">
                    <div class="card">
                        <div class="card-body card-shadow">

                            @if ( $result_array->status->success == true && $result_array->status->httpStatus ==200 )
                             @if(isset($result_array->searchResult->tripInfos->ONWARD))
                            <h5>Flights from {{ $result_array->searchResult->tripInfos->ONWARD[0]->sI[0]->da->city }} to {{ $result_array->searchResult->tripInfos->ONWARD[0]->sI[0]->aa->city }}
                                @if($_GET['tripType'] == 'round')
                                , and back
                                @endif

                            </h5>
                            @elseif (isset($result_array->searchResult->tripInfos->COMBO))
                            <h5>Flights from {{ $result_array->searchResult->tripInfos->COMBO[0]->sI[0]->da->city }} to {{ $result_array->searchResult->tripInfos->COMBO[0]->sI[0]->aa->city }}
                                @if($_GET['tripType'] == 'round')
                                , and back
                                @endif

                            </h5>

                            @endif
                            @endif


                            @if($_GET['tripType'] == 'oneway')
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

<?php
$sno=1;
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
                                                            $flight_code = $value->sI[0]->fD->aI->code;
                                                            $flight_logo = 'assets/img/AirlinesLogo/'.$flight_code.'.png';

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
                                                    <p class="flight-brand oneWayFromTo"><a href="#" data-bs-toggle="modal" id="" class="airportApiId{{ $sno++ }}"
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

@elseif($_GET['tripType'] == 'round')




<div class="row mt-2">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body round-trip1">
            @if ( $result_array->status->success == true && $result_array->status->httpStatus ==200 )
            @if(isset($result_array->searchResult->tripInfos->ONWARD))

          <p>{{ $result_array->searchResult->tripInfos->ONWARD[0]->sI[0]->da->city }} → {{ $result_array->searchResult->tripInfos->ONWARD[0]->sI[0]->aa->city }} <span>{{ date('D, d M',strtotime($_GET['flightBookingDepart'])) }}</span></p>
          @endif
          @endif
          <div class="bg-tablle">
            <p>Departure</p>
            <p>Duration</p>
            <p>Arrival</p>
            <p>Price</p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-body round-trip1">
            @if ( $result_array->status->success == true && $result_array->status->httpStatus ==200 )
            @if(isset($result_array->searchResult->tripInfos->RETURN))

            <p>{{ $result_array->searchResult->tripInfos->RETURN[0]->sI[0]->da->city }} → {{ $result_array->searchResult->tripInfos->RETURN[0]->sI[0]->aa->city }} <span>{{ date('D, d M',strtotime($_GET['flightBookingReturn'])) }}</span></p>
            @endif
            @endif
          <div class="bg-tablle">
            <p>Departure</p>
            <p>Duration</p>
            <p>Arrival</p>
            <p>Price</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-2">

    @if ( $result_array->status->success == true && $result_array->status->httpStatus ==200 )
    @if(isset($result_array->searchResult->tripInfos->ONWARD))

    <div class="col-md-6">
        @foreach ($result_array->searchResult->tripInfos->ONWARD as $key => $value)
        <div class="row mt-2">
            <div class="col-md-12">
      <div class="card">
        <div class="card-body round-trip1 shadow">
            <?php
            $flight_code = $value->sI[0]->fD->aI->code;
            $flight_logo = 'assets/img/AirlinesLogo/'.$flight_code.'.png';
             ?>
            <img src="{{ $flight_logo }}">
          <span>FI.No.{{ $value->sI[0]->fD->aI->code }}
            {{ $value->sI[0]->fD->fN }}, <b>{{ $value->sI[0]->fD->aI->name }}</b></span>
          <div class="row pt-3">
            <div class="col-md-3 departture">
              <span>{{ date('H:m', strtotime($value->sI[0]->dt)) }}</span>
              <span>{{ $value->sI[0]->da->city }}</span>
            </div>
            <div class="col-md-3 departture time-gap">
                <?php
                $minutes = $value->sI[0]->duration;
                $hours = intdiv($minutes, 60) . ' h ' . $minutes % 60 . ' m';
                ?>

              <span class="">{{ $hours }}</span>
              <span>
                @if ($value->sI[0]->stops == '0')
                NON-STOP
            @else
                {{ $value->sI[0]->stops }} Stops
            @endif
              </span>
            </div>
            <div class="col-md-3 departture">
              <span>{{ date('H:m', strtotime($value->sI[0]->at)) }}</span>
              <span>{{ $value->sI[0]->aa->city }}</span>
            </div>
            <div class="col-md-3 departture text-center">
              <input type="radio" name="roundFromTo" class="form-check-input roundFromTo">
              <p class="price-round"> <i class="fa-solid fa-indian-rupee-sign mr-2"></i> {{ number_format($value->totalPriceList[0]->fd->ADULT->fC->TF,0) }} </p>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endforeach
    </div>




    <div class="col-md-6">
        @foreach ($result_array->searchResult->tripInfos->RETURN as $key => $value)
<div class="row mt-2">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body round-trip1 shadow">
            <?php
            $flight_code = $value->sI[0]->fD->aI->code;
            $flight_logo = 'assets/img/AirlinesLogo/'.$flight_code.'.png';
             ?>
            <img src="{{ $flight_logo }}">
          <span>FI.No.{{ $value->sI[0]->fD->aI->code }}
            {{ $value->sI[0]->fD->fN }}, <b>{{ $value->sI[0]->fD->aI->name }}</b></span>
          <div class="row pt-3">
            <div class="col-md-3 departture">
              <span>{{ date('H:m', strtotime($value->sI[0]->dt)) }}</span>
              <span>{{ $value->sI[0]->da->city }}</span>
            </div>
            <div class="col-md-3 departture time-gap">
                <?php
                $minutes = $value->sI[0]->duration;
                $hours = intdiv($minutes, 60) . ' h ' . $minutes % 60 . ' m';
                ?>

              <span class="">{{ $hours }}</span>
              <span>
                @if ($value->sI[0]->stops == '0')
                NON-STOP
            @else
                {{ $value->sI[0]->stops }} Stops
            @endif
              </span>
            </div>
            <div class="col-md-3 departture">
              <span>{{ date('H:m', strtotime($value->sI[0]->at)) }}</span>
              <span>{{ $value->sI[0]->aa->city }}</span>
            </div>
            <div class="col-md-3 departture text-center">
              <input type="radio" name="roundToFrom" class="form-check-input">
              <p class="price-round"> <i class="fa-solid fa-indian-rupee-sign mr-2"></i> {{ number_format($value->totalPriceList[0]->fd->ADULT->fC->TF,0) }} </p>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endforeach
    </div>

    @endif
    @endif
  </div>


  @else
  {{-- {{ print_r($errors) }} --}}

  <div>
    <div>{{ $errors[0]->message}}</div>
  </div>
  @endif



                        </div>
                    </div>



          <!-- pricedetails -->

          <div class="row pricedetails-btm pricedetails-btm-full">
            <div class="col-md-8">
              <div class="row">
                <div class="col-md-6 btm-price">
                  <p>Departure ・ IndiGo</p>
                  <div class="row align-items-center">
                    <div class="col-md-2 p-0">
                      <img src="assets/img/flight-logo-2.png" class="img-fluid">
                    </div>
                    <div class="col-md-5 btm-flights-price">
                      <p>06:05 → 07:40</p>
                      <a href="#">Flight Details</a>
                    </div>
                    <div class="col-md-5 p-0">
                      <p class="price-round"> <i class="fa-solid fa-indian-rupee-sign mr-2"></i> 75,845.00 </p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 btm-price">
                  <p>Return ・ Go first</p>
                  <div class="row align-items-center">
                    <div class="col-md-2 p-0">
                      <img src="assets/img/flight-logo-2.png" class="img-fluid">
                    </div>
                    <div class="col-md-5 btm-flights-price">
                      <p>06:05 → 07:40</p>
                      <a href="#">Flight Details</a>
                    </div>
                    <div class="col-md-5 p-0">
                      <p class="price-round"> <i class="fa-solid fa-indian-rupee-sign mr-2"></i> 75,845.00 </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 btm-fligh-price">
              <div class="row justify-content-between align-items-center">
                <div class="col-md-8">
                  <p class="price-round"> <i class="fa-solid fa-indian-rupee-sign mr-2"></i> 75,845.00 </p>
                  <a href="#">Flight Details</a>
                </div>
                <div class="col-md-4">
                  <button class="btn btn-primary">Book</button>
                </div>
              </div>
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

        var elementPosition = $('#footer').offset();

$(window).scroll(function () {
//   console.log(elementPosition.top);
//   console.log($(window).scrollTop());
  if ($(window).scrollTop() < 200) {
    $('.pricedetails-btm-full').css('position', 'fixed').css('bottom', '0').css('right', '0').css('width','70%');
  } else {
    $('.pricedetails-btm').css('position', 'static').css('width','100%');
  }
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


        // $(function() {


        //     var todayDate = $('#flightBookingDepart').val();
        //     var returnDate = $('#flightBookingReturn').val();

        //     var d = new Date(todayDate);
        //     // var month = d.getMonth() + 1;
        //     // var day = d.getDate();

        //     var maxDate = parseInt(d.getFullYear() + 1) + '-03-31';


        //     mobiscroll.setOptions({
        //         locale: mobiscroll
        //             .localeEn, // Specify language like: locale: mobiscroll.localePl or omit setting to use default
        //         theme: 'ios', // Specify theme like: theme: 'ios' or omit setting to use default
        //         themeVariant: 'light' // More info about themeVariant: https://docs.mobiscroll.com/5-18-2/calendar#opt-themeVariant
        //     });

        //     // Mobiscroll Calendar initialization
        //     var min = todayDate;
        //     var max = maxDate;
        //     var booking = $('#flightBookingDepart').mobiscroll().datepicker({
        //         controls: [
        //             'calendar'
        //         ], // More info about controls: https://docs.mobiscroll.com/5-18-2/range#opt-controls
        //         select: 'range', // More info about select: https://docs.mobiscroll.com/5-18-2/range#methods-select
        //       //  display: 'anchored', // Specify display mode like: display: 'bottom' or omit setting to use default
        //         startInput: '#flightBookingDepart', // More info about startInput: https://docs.mobiscroll.com/5-18-2/range#opt-startInput
        //         endInput: '#flightBookingReturn', // More info about endInput: https://docs.mobiscroll.com/5-18-2/range#opt-endInput
        //         min: min, // More info about min: https://docs.mobiscroll.com/5-18-2/range#opt-min
        //         max: max, // More info about max: https://docs.mobiscroll.com/5-18-2/range#opt-max
        //         pages: 1,
        //         dateFormat: 'DDD, DD MMM YYYY',
        //         onInit: function(event,
        //         inst) { // More info about onInit: https://docs.mobiscroll.com/5-18-2/calendar#event-onInit
        //             inst.setVal([min], true);

        //         },


        //     }).mobiscroll('getInst');


        //     var oneWayDis = $("#trip_type").val();
        //     if(oneWayDis == 'oneway'){
        //     $('#flightBookingReturn').mobiscroll('getInst').setOptions({
        //         disabled: oneWayDis
        //     });
        //     if (oneWayDis) {
        //         booking.setOptions({
        //             select: 'date' // More info about select: https://docs.mobiscroll.com/5-18-2/range#methods-select
        //         });
        //     } else {
        //         booking.setOptions({
        //             select: 'range' // More info about select: https://docs.mobiscroll.com/5-18-2/range#methods-select
        //         });
        //     }
        // }

        //     $('#trip_type').on('change', function() {
        //         var oneWay = this.value == 'oneway';
        //         $('#flightBookingReturn').mobiscroll('getInst').setOptions({
        //             disabled: oneWay
        //         });

        //         if (oneWay) {
        //             booking.setOptions({
        //                 select: 'date' // More info about select: https://docs.mobiscroll.com/5-18-2/range#methods-select
        //             });
        //         } else {
        //             booking.setOptions({
        //                 select: 'range' // More info about select: https://docs.mobiscroll.com/5-18-2/range#methods-select
        //             });
        //         }
        //     });
        //     });

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

  $(document).ready(function() {
    $('.roundFromTo, .oneWayFromTo').click(function(){
        // alert($(this).val());
        $("#loader_div").show();

        setTimeout(function () {
      $("#loader_div").hide();
   }, 5000);

    })
  })

//   alert($('#trip_type').val() );
  if($('#trip_type').val() == 'oneway'){
    $('#flightBookingReturn').val('');
    $('#flightBookingReturn').prop('disabled', true);
  }else{
    $('#flightBookingReturn').prop('disabled', false);

  }

  $('#trip_type').on('change', function(){
    if($('#trip_type').val() == 'oneway'){
    $('#flightBookingReturn').val('');
    $('#flightBookingReturn').prop('disabled', true);
  }else{
    $('#flightBookingReturn').prop('disabled', false);
  }
  })


</script>

<script>
    var start_date = null, end_date = null;
    var timestamp_start_date = null, timestamp_end_date = null;
    var $input_start_date = null, $input_end_date = null;



    function getDateClass(date, start, end){
        if(end != null && start != null){
            if(date > start && date < end)
                return [ true, "sejour", "Séjour" ];
        }

        if(date == start)
            return [ true, "start", "Début de votre séjour" ];
        if(date == end)
            return [ true, "end", "Fin de votre séjour" ];

        return false;
    }

    function datepicker_draw_nb_nights(){
        var $datepicker = jQuery("#ui-datepicker-div");
        setTimeout(function(){
            if(start_date != null && end_date != null){
                var $qty_days_stay = jQuery("<div />", { class: "ui-datepicker-stay-duration" });
                var qty_nights_stay = get_days_difference(timestamp_start_date, timestamp_end_date);
                $qty_days_stay.text(qty_nights_stay + " nights stay");
                $qty_days_stay.appendTo($datepicker);
            }
        });
    }

            var fromDate = $('#flightBookingDepart').val();
            var returnDate = $('#flightBookingReturn').val();


                var d = new Date();
                var month = d.getMonth() + 1;
                var day = d.getDate();


                var todayDate = (day < 10 ? '0' : '') + day+ '-' +
                    (month < 10 ? '0' : '') + month + '-' + d.getFullYear();


                var maxDate = '31-03-'+parseInt(d.getFullYear() + 1) ;



    var options_start_date = {
        dateFormat : "dd-mm-yy",
        showAnim: false,
        constrainInput: true,
          numberOfMonths: 1,
        showOtherMonths: true,
        minDate: todayDate,
        maxDate: maxDate,
        beforeShow: function(input, datepicker){

            datepicker_draw_nb_nights();
        },
        beforeShowDay: function(date){

            // 0: published
            // 1: class
            // 2: tooltip
            var timestamp_date = date.getTime();
            var result = getDateClass(timestamp_date, timestamp_start_date, timestamp_end_date);
            if(result != false)
                return result;

            return [true, "", ""];
            // return [ true, "chocolate", "Chocolate! " ];
        },
        onSelect: function(date_string, datepicker){
            // this => input
            if($('#trip_type').val() != 'oneway'){
            start_date = $input_start_date.datepicker("getDate",'minDate');
            timestamp_start_date = start_date.getTime();
            }

        },
        onClose: function(){
            if(end_date != null){
                if(timestamp_start_date >= timestamp_end_date || end_date == null){
                    $input_end_date.datepicker("setDate", null);
                    end_date = null;
                    timestamp_end_date = null;
                    $input_end_date.datepicker("show");
                    return;
                }
            }
            if(start_date != null && end_date == null)
                $input_end_date.datepicker("show");
        }
    };

    var options_end_date = {
        dateFormat : "dd-mm-yy",
        showAnim: false,
        constrainInput: true,
          numberOfMonths: 1,
        showOtherMonths: true,
        minDate: todayDate,
        maxDate:maxDate,
        beforeShow: function(input, datepicker){
            datepicker_draw_nb_nights();
        },
        beforeShowDay: function(date){
            var timestamp_date = date.getTime();
            var result = getDateClass(timestamp_date, timestamp_start_date, timestamp_end_date);
            if(result != false)
                return result;

            return [ true, "", "Chocolate !" ];
        },
        onSelect: function(date_string, datepicker){
            // this => input
            end_date = $input_end_date.datepicker("getDate",'minDate');
            timestamp_end_date = end_date.getTime();
        },
        onClose: function(){
            if(end_date == null)
                return;

            if(timestamp_end_date <= timestamp_start_date || start_date == null){
                $input_start_date.datepicker("setDate", null);
                start_date = null;
                timestamp_start_date = null;
                $input_start_date.datepicker("show");
            }
        }
    };

    $input_start_date = jQuery("#flightBookingDepart");
    $input_end_date = jQuery("#flightBookingReturn");
// alert(fromDate)

    $input_start_date.datepicker(options_start_date);
    $input_start_date.datepicker('setDate',fromDate);
    $input_end_date.datepicker(options_end_date);
    $input_end_date.datepicker('setDate',returnDate);

    function get_days_difference(start_date, end_date){
        return Math.floor(end_date - start_date) / (1000*60*60*24);
    }
            </script>

@endsection
