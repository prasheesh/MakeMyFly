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

        .modal-header{
            background: #3f90a1;
            color: #fff;
            border-radius: 0;
          }
          .modal-header i{
            color: #fff;
          }
          .count{
            margin: 0;
            padding: 0;
            box-shadow: 0px 0px 5px rgba(0,0,0,0.5);
            border-radius: 6px;
            overflow: hidden;
            width: auto;
            float: left;
          }
          .count li{
            padding: 10px 15px;
            list-style: none;
            float: left;
            transition: 0.3s;
            border-right: solid 0px #ccc;
          }
          .count li:hover{
            background: #3f90a1;
            color: #fff;
            transition: 0.3s;
          }
          .count li.active{
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
              <form method="post" action="" name="searchOneWay" id="searchOneWay">
                <div class="row">
                    <div class="col-md-3 " style="position: relative;">
                        <small>From</small>

                            <div class="airport-name from-to">
                              {{-- <div class="mbsc-col-sm-12 mbsc-col-md-6">
                                <label>
                                    From
                                    <input mbsc-input id="fromPlace" name="fromPlace" data-dropdown="true" data-input-style="box" data-label-style="stacked" placeholder="Please select..."></select>
                                </label>
                            </div> --}}
                                {{-- <p><b>Hyderabad</b></p>
     			                <p>Rajiv Gandi international Airport</p> --}}
                                <select class="form-control" name="fromPlace" id="fromPlace">
                                    <option value="">Select From</option>
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
                            {{-- <p><b>Mumbai</b></p>
     			              <p>Chathrapathi Shivaji international Airport</p> --}}
                         {{-- <div class="mbsc-col-sm-12 mbsc-col-md-6">
                          <label>
                              To
                              <input mbsc-input id="toPlace" name="toPlace" data-dropdown="true" data-input-style="box" data-label-style="stacked" placeholder="Please select..."></select>
                          </label>
                      </div> --}}

                            <select class="form-control" name="toPlace" id="toPlace">
                                <option value="">Select To</option>
                                {{-- @foreach (DB::table('airport_details')->get() as $airport)
                                    <option value="{{ $airport->code }}">{{ $airport->name . ', ' . $airport->country }}
                                    </option>
                                @endforeach --}}
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6">
                                <small>Departure</small>
                                <div class="mbsc-row">
                                    <label>
                                        Departure
                                        <input id="demo-flight-booking-type-outbound" mbsc-input data-input-style="outline"
                                            data-label-style="stacked" placeholder="Please select..." />
                                    </label>

                                </div>


                            </div>
                            <div class="col-md-6">
                                <small>Return</small>
                                <label>
                                    Return
                                    <input id="demo-flight-booking-type-return" mbsc-input data-input-style="outline"
                                        data-label-style="stacked" placeholder="Please select..." />
                                </label>

                            </div>
                        </div>
                    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
              <ul class="count">
                <li class="active">1</li>
                <li>2</li>
                <li>2</li>
                <li>4</li>
                <li>5</li>
                <li>6</li>
                <li>7</li>
                <li>8</li>
                <li>9</li>
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
              <ul class="count">
                <li class="active">Economy/Premium Economy</li>
                <li>Premium Economy</li>
                <li>Business</li>
                <li>First Class</li>
              </ul>
          </div>

        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-one" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-theme">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal end -->

                    <div class="col-md-2"  data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <small>Travellers & Class</small>
                        <div class="airport-name">
                            <p><b>1 Adult </b></p>
                            <p>Economy</p>
                        </div>
                    </div>

                    <div class="col-md-2 ms-auto " style="    margin-top: 1rem;">
                        {{-- <a href="{{ route('search-flights') }}"> --}}
                           <button class="btn btn-search-flights">Search Flights one
                                Way</button>
                              {{-- </a> --}}
                    </div>
                </div>
              </form>
            </div>

            <!-- 2nd tab -->
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

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

            </div>


            <!-- 3rd tab -->

            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

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
                        <a href="{{ route('search-flights') }}"> <button class="btn btn-search-flights">Search
                                Flights</button></a>
                    </div>
                </div>

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


        $('#fromPlace').select2({
            placeholder: 'From'
        });

        // $('#toPlace').select2({
        //     placeholder: 'To'
        // });


        // $(function() {
        //     $("#datepicker").datepicker();
        // });

        $(function() {



            mobiscroll.setOptions({
                locale: mobiscroll
                .localeEn, // Specify language like: locale: mobiscroll.localePl or omit setting to use default
                theme: 'ios', // Specify theme like: theme: 'ios' or omit setting to use default
                themeVariant: 'light' // More info about themeVariant: https://docs.mobiscroll.com/5-18-2/calendar#opt-themeVariant
            });

            // Mobiscroll Calendar initialization
            var min = '2022-09-13T00:00';
            var max = '2023-03-13T00:00';
            // $('#departure-booking').mobiscroll().datepicker({
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

            var booking = $('#demo-flight-booking-type-outbound').mobiscroll().datepicker({
                controls: [
                'calendar'], // More info about controls: https://docs.mobiscroll.com/5-18-2/range#opt-controls
                select: 'range', // More info about select: https://docs.mobiscroll.com/5-18-2/range#methods-select
                display: 'anchored', // Specify display mode like: display: 'bottom' or omit setting to use default
                startInput: '#demo-flight-booking-type-outbound', // More info about startInput: https://docs.mobiscroll.com/5-18-2/range#opt-startInput
                endInput: '#demo-flight-booking-type-return', // More info about endInput: https://docs.mobiscroll.com/5-18-2/range#opt-endInput
                min: min, // More info about min: https://docs.mobiscroll.com/5-18-2/range#opt-min
                max: max, // More info about max: https://docs.mobiscroll.com/5-18-2/range#opt-max
                pages: 1,
                dateFormat: 'DDD, DD MMM YYYY',
            }).mobiscroll('getInst');

            var oneWayDis = $("#oneWay").val();
            $('#demo-flight-booking-type-return').mobiscroll('getInst').setOptions({
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
                $('#demo-flight-booking-type-return').mobiscroll('getInst').setOptions({
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


            //--------- search flights ---------
            // $("#searchOneWay").submit()

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

    $("#toPlace").click(function () {
      var $dropdown = $("#toPlace");
      $.getJSON("{{ route('get-airports') }}"+ '/?filterText=', function (data) {
    //       // console.log(data);
    $dropdown.empty();
                    $dropdown.append($("<option />").val('').text('--Select--'));
                    $.each(data, function(key, value) {
                        $dropdown.append($("<option />").val(value.code).text(value.name));
                    });

                    $("#overlay").fadeOut();

                    $('#toPlace').select2({
                        placeholder: 'Select State'
                    });


        }, 'jsonp');
    })


    $("#tofrom").change(function(){
      alert($(this).val());
    })



        });
    </script>
@endsection
