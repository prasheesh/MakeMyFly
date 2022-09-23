@extends('layouts.app')

@section('style-content')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link href="{{ asset('mobiscroll/css/mobiscroll.jquery.min.css') }}" rel="stylesheet">
    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
        }

        body,
        html {
            height: 100%;
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
@endsection

@section('content')
    <section class="banner">
        <div class="container-make container">

            <div class="row pt-5">
                <div class="col-md-12 text-center">
                    <h1>Domestic and International Flights</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="container container-make" style="    margin-top: -100px;">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item nav-item-border" role="presentation">
                {{-- <button class="nav-link active " id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">One Way</button> --}}
                <label class="nav-link active " id="home-tab" data-bs-toggle="tab" data-bs-target="#home" role="tab"
                    aria-controls="home" aria-selected="true">
                    One way
                    <input class="demo-flight-type" value="oneway" id="oneWay" mbsc-radio data-theme="material"
                        data-theme-variant="light" type="radio" name="flight-type" checked>
                </label>
            </li>
            <li class="nav-item  nav-item-border" role="presentation">
                {{-- <button class="nav-link " id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Round Trip</button> --}}
                <label class="nav-link " id="home-tab" data-bs-toggle="tab" data-bs-target="#home" role="tab"
                    aria-controls="profile" aria-selected="false">
                    Round trip
                    <input class="demo-flight-type" value="round" mbsc-radio data-theme="material"
                        data-theme-variant="light" type="radio" name="flight-type">
                </label>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button"
                    role="tab" aria-controls="contact" aria-selected="false">Multi City</button>
            </li>
        </ul>



        <div class="tab-content tab-content-btm" id="myTabContent">

            <!-- 1st tab -->

            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <form method="get" action="{{ route('SearchFlights') }}" name="searchOneWay" id="searchOneWay">
                    @csrf
                    <div class="row">
                        <div class="col-md-3 " style="position: relative;">
                            <small>From</small>

                            <div class="airport-name ">
                                {{-- <div class="mbsc-col-sm-12 mbsc-col-md-6">
                                <label>
                                    From
                                    <input mbsc-input id="fromPlace" name="fromPlace" data-dropdown="true" data-input-style="box" data-label-style="stacked" placeholder="Please select..."></select>
                                </label>
                            </div> --}}
                                {{-- <p><b>Hyderabad</b></p>
     			                <p>Rajiv Gandi international Airport</p> --}}
                                <select class="form-control" name="fromPlace" id="fromPlace">
                                    {{-- <option value="">Select From</option> --}}
                                    @foreach (DB::table('airport_details')->get() as $airport)
                                        <option value="{{ $airport->code }}">{{ $airport->name . ', ' . $airport->country }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <span class=" from-to"> </span>
                        </div>
                        {{-- <div class="col-md-1" style="position: relative;">
                        <div class=" from-to" style="position: relative;"></div>
                    </div> --}}
                        <div class="col-md-3">

                            <small>To</small>
                            <div class="airport-name">
                                {{-- <p><b>Mumbai</b></p>
     			              <p>Chathrapathi Shivaji international Airport</p> --}}
                                {{-- <div class="mbsc-col-sm-12 mbsc-col-md-6">
                          <label>
                              To
                              <input mbsc-input id="toPlace" name="toPlace" data-dropdown="true" data-input-style="box" data-label-style="stacked" placeholder="Please select..."></select>
                          </label>
                      </div> --}}

                                <select class="form-control" name="toPlace" id="toPlace">
                                    {{-- <option value="">Select To</option> --}}
                                    @foreach (DB::table('airport_details')->get() as $airport)
                                        <option value="{{ $airport->code }}">{{ $airport->name . ', ' . $airport->country }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <span id="sameFromTo" class="validation-error">From & To airports cannot be the same</span>

                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <small>Departure</small>
                                    <div class="mbsc-row">
                                        <label>
                                            Departure
                                            <input id="flightBookingDepart" mbsc-input data-input-style="outline"
                                                name="flightBookingDepart" data-label-style="stacked"
                                                placeholder="Please select..." />
                                        </label>

                                    </div>


                                </div>
                                <div class="col-md-6">
                                    <small>Return</small>
                                    <label>
                                        Return
                                        <input id="flightBookingReturn" name="flightBookingReturn" mbsc-input
                                            data-input-style="outline" data-label-style="stacked"
                                            placeholder="Please select..." />
                                    </label>

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

                        <div class="col-md-2 travellerData" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <small>Travellers & Classs</small>
                            <input type="text" value="1" id="adultval" name="adultval" class="">
                            <input type="text" value="ECONOMY" name="travelClass" id="travelClass" class="">
                            <div class="airport-name" id="travelInfo">

                                <p><b>1 Adult </b></p>
                                <p>Economy</p>
                            </div>
                        </div>

                        <div class="col-md-2 ms-auto " style="    margin-top: 1rem;">
                            {{-- <a href="{{ route('search-flights') }}"> --}}
                            <button id="searchFlightsButton" type="submit" class="btn btn-search-flights">Search Flights
                                one
                                Way</button>
                            {{-- </a> --}}
                        </div>
                    </div>
                </form>
            </div>

            <!-- 2nd tab -->
            {{-- <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                <div class="row">
                    <div class="col-md-3 " style="position: relative;">
                        <small>From</small>
                        <div class="airport-name from-to">
                            <p><b>Hyderabad</b></p>
                            <p>Rajiv Gandi international Airport</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <small>To</small>
                        <div class="airport-name">
                            <p><b>Mumbai</b></p>
                            <p>Chathrapathi Shivaji international Airport</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6">
                                <small>Departure</small>
                                <div class="airport-name">
                                    <p><b>10 June, 22</b></p>
                                    <p>Friday</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <small>Return</small>
                                <div class="airport-name" style="padding: 4px 15px;">
                                    <a href="#">
                                        <p class="return-book">Click to add a return flight for a better discounts</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <small>Travellers & Class</small>
                        <div class="airport-name">
                            <p><b>1 Adult 22</b></p>
                            <p>Economy</p>
                        </div>
                    </div>

                    <div class="col-md-2 ms-auto">
                        <a href="{{ route('search-flights') }}">
                            <button class="btn btn-search-flights">Search Flights</button></a>
                    </div>
                </div>

            </div> --}}


            <!-- 3rd tab -->

            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

                {{-- <div class="row">
                    <div class="col-md-3 " style="position: relative;">
                        <small>From</small>
                        <div class="airport-name from-to">
                            <p><b>Hyderabad</b></p>
                            <p>Rajiv Gandi international Airport</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <small>To</small>
                        <div class="airport-name">
                            <p><b>Mumbai</b></p>
                            <p>Chathrapathi Shivaji international Airport</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6">
                                <small>Departure</small>
                                <div class="airport-name">
                                    <p><b>10 June, 22</b></p>
                                    <p>Friday</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <small>Return</small>
                                <div class="airport-name" style="padding: 4px 15px;">
                                    <a href="#">
                                        <p class="return-book">Click to add a return flight for a better discounts</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <small>Travellers & Class</small>
                        <div class="airport-name">
                            <p><b>1 Adult 22</b></p>
                            <p>Economy</p>
                        </div>
                    </div>

                    <div class="col-md-2 ms-auto">
                        <a href="{{ route('search-flights') }}"> <button class="btn btn-search-flights">Search
                                Flights</button></a>
                    </div>
                </div> --}}
            <form name="" method="">
                <div class="row">


                    <div class="col-md-3 " style="position: relative;">
                        <small>From</small>

                            <div class="airport-name ">
                            
                                <select class="form-control" name="fromPlace" id="multi_fromPlace">
                                    {{-- <option value="">Select From</option> --}}
                                    @foreach (DB::table('airport_details')->get() as $airport)
                                        <option value="{{ $airport->code }}">{{ $airport->name . ', ' . $airport->country }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                           
                    </div>
                   
                    <div class="col-md-3">

                        <small>To</small>
                        <div class="airport-name">
                          <select class="form-control" name="toPlace" id="multi_toPlace">
                                {{-- <option value="">Select To</option> --}}
                                @foreach (DB::table('airport_details')->get() as $airport)
                                    <option value="{{ $airport->code }}">{{ $airport->name . ', ' . $airport->country }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <span id="sameFromTo"  class="validation-error">From & To airports cannot be the same</span>

                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6">
                                <small>Departure</small>
                                <div class="mbsc-row">
                                    <label>
                                        Departure
                                        <input id="flightBookingDepartMulti" mbsc-input data-input-style="outline"
                                            data-label-style="stacked" class="flightBookingDepartMulti" placeholder="Please select..." />
                                    </label>

                                </div>


                            </div>
                            {{-- <div class="col-md-6">
                                <small>Return</small>
                                <label>
                                    Return
                                    <input id="flightBookingReturn" mbsc-input data-input-style="outline"
                                        data-label-style="stacked" placeholder="Please select..." />
                                </label>

                            </div> --}}
                            <div class="col-md-6 multitravellerData"  data-bs-toggle="modal" data-bs-target="#multiCityModel" >
                                <small>Travellers & Classs</small>
                                <div class="airport-name" id="multitravelInfo">
                                    <p><b>1 Adult </b></p>
                                    <p>Economy</p>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="multiCityModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Travellers & Class</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-times"></i></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">

                            <div class="col-md-7 mb-4">
                                <p>ADULTS (12y +)</p>
                                <ul class="count" id="multipassengerCount">
                                    <li class="active" id="multiadult1" data-val="1" >1</li>
                                    <li data-val="2" id="multiadult2">2</li>
                                    <li data-val="3" id="multiadult3">3</li>
                                    <li data-val="4" id="multiadult4">4</li>
                                    <li data-val="5" id="multiadult5">5</li>
                                    <li data-val="6" id="multiadult6">6</li>
                                    <li data-val="7" id="multiadult7">7</li>
                                    <li data-val="8" id="multiadult8">8</li>
                                    <li data-val="9" id="multiadult9">9</li>
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
                            </div>
                            --}}

                            <div class="col-md-12 mb-4">
                                <p>CHOOSE TRAVEL CLASS</p>
                                <ul class="count" id="multichooseTravel">
                                    <li class="active" id="multitravel1" data-val="EC">Economy/Premium Economy</li>
                                    <li id="multitravel2" data-val="PEC">Premium Economy</li>
                                    <li id="multitravel3" data-val="BUS">Business</li>
                                    <li id="multitravel4" data-val="FC">First Class</li>
                                </ul>
                            </div>

                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-one" data-bs-dismiss="modal">Close</button>
                            <button id="savemultiTravelDetail" type="button" class="btn btn-theme" data-bs-dismiss="modal">Save changes</button>
                        </div>
                        </div>
                    </div>
                    </div>
                    <!-- Modal end -->

                    <div class="col-md-2 "  >
                        {{-- <small>Travellers & Classs</small>
                        <div class="airport-name" id="travelInfo">
                            <p><b>1 Adult </b></p>
                            <p>Economy</p>
                        </div> --}}
                    </div>

                    <div class="col-md-3 " style="position: relative;">
                        <small>From</small>

                            <div class="airport-name ">
                            
                                <select class="form-control" name="fromPlace" id="multi_fromPlace">
                                    {{-- <option value="">Select From</option> --}}
                                    @foreach (DB::table('airport_details')->get() as $airport)
                                        <option value="{{ $airport->code }}">{{ $airport->name . ', ' . $airport->country }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                           
                    </div>
                   
                    <div class="col-md-3">

                        <small>To</small>
                        <div class="airport-name">
                          <select class="form-control" name="toPlace" id="multi_toPlace">
                                {{-- <option value="">Select To</option> --}}
                                @foreach (DB::table('airport_details')->get() as $airport)
                                    <option value="{{ $airport->code }}">{{ $airport->name . ', ' . $airport->country }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <span id="sameFromTo"  class="validation-error">From & To airports cannot be the same</span>

                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6">
                                <small>Departure</small>
                                <div class="mbsc-row">
                                    <label>
                                        Departure
                                        <input id="flightBookingDepartMulti" mbsc-input data-input-style="outline"
                                            data-label-style="stacked" class="flightBookingDepartMulti" placeholder="Please select..." />
                                    </label>

                                </div>


                            </div>
                            {{-- <div class="col-md-6">
                                <small>Return</small>
                                <label>
                                    Return
                                    <input id="flightBookingReturn" mbsc-input data-input-style="outline"
                                        data-label-style="stacked" placeholder="Please select..." />
                                </label>

                            </div> --}}
                            <div class="col-md-6 hideaddbtn0"  >
                                <small>Travellers & Classs</small>
                                <div class="airport-name" id="">
                                    <a id="" type="" class="btn btn-search-flights" onclick="addMulticityRow()" >Add</a>
                                    <input type="hidden" name="addcount" id="addcount" class="addcount" value="1">
                                </div>
                            </div>

                        </div>
                    </div>
                    
                </div>
                <div class="" id="append_row"></div>
                   

                  
                <div class="row">
                    <div class="col-md-2 ms-auto " style="    margin-top: 1rem;">
                        {{-- <a href="{{ route('search-flights') }}"> --}}
                           <button id="searchFlightsButton" type="submit" class="btn btn-search-flights">Search Flights one
                                Way</button>
                              {{-- </a> --}}
                    </div>
                </div>
              
            </form>

            </div>


        </div>

        <section class="title">
            <h1>Makemyfly Flights offers for you</h1>
            <div class="row">
                <div class="col-md-4">
                    <img src="assets/img/covid-precations.png" class="img-fluid">
                </div>
                <div class="col-md-8">
                    <img src="assets/img/covid-precations-offers.png" class="img-fluid">
                </div>
            </div>
        </section>

    </div>
    <!--End of container -->
@endsection

@section('script-content')
    <script src="{{ asset('mobiscroll/js/mobiscroll.jquery.min.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        //default from to selection
        $(document).ready(onLoadFromToAirport);

        function onLoadFromToAirport() {
            $('#fromPlace').val('HYD');
            $('#toPlace').val('VGA');
            $('#toPlace').trigger('change');
            $('#fromPlace').trigger('change');
        }


        $(function() {
            var d = new Date();
            var month = d.getMonth() + 1;
            var day = d.getDate();

            var todayDate = d.getFullYear() + '-' +
                (month < 10 ? '0' : '') + month + '-' +
                (day < 10 ? '0' : '') + day;

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
                   

            //           // pages: 'auto',
            //           onInit: function (event, inst) {         // More info about onInit: https://docs.mobiscroll.com/5-18-2/calendar#event-onInit
            //               // inst.setVal([
            //               //     '2022-09-11T00:00',
            //               //     '2022-09-16T00:00',
            //               //     '2022-09-17T00:00'
            //               // ], true);
            //           },
            //           onPageLoading: function (event, inst) {  // More info about onPageLoading: https://docs.mobiscroll.com/5-18-2/calendar#event-onPageLoading
            //             // getPrices(event.firstDay, function callback(bookings) {
            //             //       inst.setOptions({
            //             //           labels: bookings.labels,     // More info about labels: https://docs.mobiscroll.com/5-18-2/calendar#opt-labels
            //             //           invalid: bookings.invalid    // More info about invalid: https://docs.mobiscroll.com/5-18-2/calendar#opt-invalid
            //             //       });
            //             //   });
            //           }
            //       });

            //       $('#return-booking').mobiscroll().datepicker({
            //           // display: 'inline',                       // Specify display mode like: display: 'bottom' or omit setting to use default
            //           controls: ['calendar'],                  // More info about controls: https://docs.mobiscroll.com/5-18-2/calendar#opt-controls
            //           min: min,                                // More info about min: https://docs.mobiscroll.com/5-18-2/calendar#opt-min
            //           max: max,                                // More info about max: https://docs.mobiscroll.com/5-18-2/calendar#opt-max
            //           // pages: 'auto',
            //           selectMultiple: false,
            //           selectMin: 1,
            //           // controls: ['date'],
            //           dateFormat: 'DDD, DD MMM YYYY',

            //           // pages: 'auto',
            //           onInit: function (event, inst) {         // More info about onInit: https://docs.mobiscroll.com/5-18-2/calendar#event-onInit
            //               // inst.setVal([
            //               //     '2022-09-11T00:00',
            //               //     '2022-09-16T00:00',
            //               //     '2022-09-17T00:00'
            //               // ], true);
            //           },
            //           onPageLoading: function (event, inst) {  // More info about onPageLoading: https://docs.mobiscroll.com/5-18-2/calendar#event-onPageLoading
            //             // getPrices(event.firstDay, function callback(bookings) {
            //             //       inst.setOptions({
            //             //           labels: bookings.labels,     // More info about labels: https://docs.mobiscroll.com/5-18-2/calendar#opt-labels
            //             //           invalid: bookings.invalid    // More info about invalid: https://docs.mobiscroll.com/5-18-2/calendar#opt-invalid
            //             //       });
            //             //   });
            //           }
            //       });


            var booking = $('#flightBookingDepart').mobiscroll().datepicker({
                controls: [
                    'calendar'
                ], // More info about controls: https://docs.mobiscroll.com/5-18-2/range#opt-controls
                select: 'range', // More info about select: https://docs.mobiscroll.com/5-18-2/range#methods-select
                display: 'anchored', // Specify display mode like: display: 'bottom' or omit setting to use default
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

            var oneWayDis = $("#oneway").val();
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

            $('.demo-flight-type').on('change', function() {
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



            function getPrices(d, callback) {
                var invalid = [],
                    labels = [];

                mobiscroll.util.http.getJson('https://trial.mobiscroll.com/getprices/?year=' + d.getFullYear() +
                    '&month=' + d.getMonth(),
                    function(bookings) {
                        for (var i = 0; i < bookings.length; ++i) {
                            var booking = bookings[i],
                                d = new Date(booking.d);

                            if (booking.price > 0) {
                                labels.push({
                                    start: d,
                                    title: '$' + booking.price,
                                    textColor: '#e1528f'
                                });
                            } else {
                                invalid.push(d);
                            }
                        }
                        callback({
                            labels: labels,
                            invalid: invalid
                        });
                    }, 'jsonp');
            }


            //         var fromPlace = $('#fromPlace').mobiscroll().select({
            //     display: 'anchored',
            //     filter: true,
            //     data: [],
            //     onFilter: function (ev) {
            //         fromFiltering(ev.filterText);
            //         return false;
            //     },
            // }).mobiscroll('getInst');


            // function fromFiltering(filterText) {
            //     // $.getJSON('https://trial.mobiscroll.com/airports/' + encodeURIComponent(filterText) + '?callback=?', function (data) {
            //     $.getJSON("{{ route('get-airports') }}"+ '/?filterText=' + filterText, function (data) {
            //       // console.log(data);
            //         var item;
            //         var airports = [];

            //         for (var i = 0; i < data.length; i++) {
            //             item = data[i];
            //             airports.push({ text: item.name+', '+item.country, value: item.code })
            //         }

            //         fromPlace.setOptions({ data: airports });
            //     }, 'jsonp');
            // }

            // fromFiltering('');


            //   var toPlace = $('#toPlace').mobiscroll().select({
            //     display: 'anchored',
            //     filter: true,
            //     data: [],

            //     onFilter: function (ev) {
            //         toFiltering(ev.filterText);
            //         return false;
            //     },
            // }).mobiscroll('getInst');

            // function toFiltering(filterText) {
            //     // $.getJSON('https://trial.mobiscroll.com/airports/' + encodeURIComponent(filterText) + '?callback=?', function (data) {
            //     $.getJSON("{{ route('get-airports') }}"+ '/?filterText=' + filterText, function (data) {
            //       // console.log(data);
            //         var item;
            //         var airports = [];


            //         for (var i = 0; i < data.length; i++) {
            //             item = data[i];
            //             airports.push({ text: item.name+', '+item.country, value: item.code })
            //         }

            //         toPlace.setOptions({ data: airports });
            //     }, 'jsonp');
            // }

            // toFiltering('');





            $('#fromPlace').select2({
                placeholder: 'Select from',
            });
            $('#toPlace').select2({
                placeholder: 'Select to'
            });

    /////////////Multi select//////    
    $('.multi_fromPlace').select2({
        placeholder: 'Select to'
    });
    $('.multi_toPlace').select2({
        placeholder: 'Select to'
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


            // function travelInfo(){

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
            // }

            // $('#flightBookingDepart').change(function() {
            //     alert($(this).val());
            // })
            // $('#flightBookingReturn').change(function() {
            //     alert($(this).val());
            // })

            $('.from-to').click(function() {
                var fromPlace = $('#fromPlace').val();
                var toPlace = $('#toPlace').val();

                $('#fromPlace').val(toPlace);
                $('#toPlace').val(fromPlace);
                $('#toPlace').trigger('change');
                $('#fromPlace').trigger('change');
                // console.log($('#fromPlace :selected').text());
            });



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



            //     $('form[name=searchOneWay]').on('submit', function(e) {
            //     e.preventDefault();
            //     var fromPlace = $('#fromPlace').val();
            //     var toPlace = $('#toPlace').val();
            //     var flightBookingDepart = $('#flightBookingDepart').val();
            //     var adultsVal = localStorage.getItem('adultsVal');
            //     var travelClassVal = localStorage.getItem('travelClassVal');
            //      var formData = {'fromPlace':fromPlace,'toPlace':toPlace,'flightBookingDepart':flightBookingDepart,'adultsVal':adultsVal,'travelClassVal':travelClassVal};

            //     //  console.log(formData);
            //      $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     },
            //   });

            //     $.ajax({
            //         type: 'POST',
            //         url: '{{ route('SearchFlights') }}',
            //         data: formData,
            //         dataType: 'json',
            //         // cache: false,
            //         // async: true,
            //         // processData: true,
            //         success: function (data) {
            //             if(data.status.success == false){
            //                 alert(data.errors[0].message);

            //             }
            //         }
            //     })


            // })

        });


        function addMulticityRow()  
{
   
    var addcount = $('#addcount').val();
    var prevbtnrmv = parseInt(addcount)-1;
 //   alert(addcount);
    var _token = '<?php echo csrf_token(); ?>';
    var post_data = {
        'addcount': addcount,
        '_token'   : _token,
        
        };
       $.ajax({
        type: "POST",
        url: "{{ url('add-multiselect-row') }}",
        data: post_data,
        // dataType: "JSON",  
        cache:false,
      
        success:function(data)
            {  
                $('#append_row').append(data);
                $("#addcount").val(parseInt(addcount)+1);
                $('.hideaddbtn'+prevbtnrmv).hide();  
                $('.hideclsbtn'+prevbtnrmv).hide();  

            },
            complete: function() 
            { 
                $("#overlay").fadeOut();
            }
       });
}
        
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});

function closeMulticityRow(removeid)
{
    var prevbtnrmv = parseInt(removeid)-1;
    $('.list_number'+removeid).remove();
    $('.hideaddbtn'+prevbtnrmv).show();  
    $('.hideclsbtn'+prevbtnrmv).show();   
    $("#addcount").val(parseInt(removeid)-1);

}

        //choose no of passenger
        $('#multipassengerCount li').click(function(){
                    // alert($(this).data('val'));
                    $("#multipassengerCount li").removeClass('active');
                    $(this).addClass('active');
                });

        //Choose travel type
                $('#multichooseTravel li').click(function(){
                    // alert($(this).data('val'));
                    $("#multichooseTravel li").removeClass('active');
                    $(this).addClass('active');
                });

        $(document).on('click', '#savemultiTravelDetail',function(){
             // $('#saveTravelDetail').click(function(){

            localStorage.clear();
           var multiadultsVal =  $("#multipassengerCount .active").data('val');
           var multitravelClassVal =  $("#multichooseTravel .active").data('val');

           var multiadultsId =  $("#multipassengerCount .active").attr('id');
           var multitravelId =  $("#multichooseTravel .active").attr('id');

                //   alert(multiadultsVal);
                //   alert(multitravelClassVal);

            localStorage.setItem('multiadultsVal', multiadultsVal);
            localStorage.setItem('multitravelClassVal', multitravelClassVal);
            localStorage.setItem('multiadultsId', multiadultsId);
            localStorage.setItem('multitravelId', multitravelId);



            if(multitravelClassVal == 'EC'){
                var multitravelName = "Economy/Premium Economy";
            }else if(multitravelClassVal == 'PEC'){
                var multitravelName = "Premium Economy";
            }else if(multitravelClassVal == 'BUS'){
                var multitravelName = "Business";
            }else if(multitravelClassVal == 'FC'){
                var multitravelName = "First Class";
            }

            $('#multitravelInfo').replaceWith('<div class="airport-name" id="multitravelInfo"><p><b>'+multiadultsVal+' Adult </b></p><p>'+multitravelName+'</p></div>');

        });

        $('.multitravellerData').click(function(){
            // alert('hj');
            let multiadultsId = localStorage.getItem('multiadultsId');
            let multitravelId = localStorage.getItem('multitravelId');
       

            $("#multipassengerCount li").removeClass('active');
            $('#'+multiadultsId).addClass('active');

            $("#multichooseTravel li").removeClass('active');
            $('#'+multitravelId).addClass('active');
        });
    </script>
@endsection
