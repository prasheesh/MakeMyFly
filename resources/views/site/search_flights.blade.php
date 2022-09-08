@extends('layouts.app')
@section('style-content')
<link rel="stylesheet" href="assets/css/all.min.css" >

<!-- slick carousel -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css">

<!-- Template Main CSS File -->
<link href="assets/css/style.css" rel="stylesheet">

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
    margin-top:3rem;
  }

</style>

@endsection;

@section('content')


<!-- book modal -->

<div class="modal" id="book-table">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-body p-0">

         <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-times"></i></button>

           <table class="table table-booking" style="">
             <thead class="bg-grey" style="border-bottom: 2px solid #fff;">
               <tr>
                 <th class="">FARES</th>
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
               <tr>
                 <td class=""><b>Saver</b>
                  <p>
                    Fair offered by airline.
                  </p>
                </td>
                  <td >7kgs</td>
                   <td>15kgs</td>
                    <td>cancellation <br>  fee starting <i class="fa-solid fa-indian-rupee-sign"></i> 3,500 </td>
                     <td>Date change <br>  fee starting <i class="fa-solid fa-indian-rupee-sign"></i> 3250</td>
                      <td>Middle Seat Free, <br> Window/Asile Chargeable</td>
                       <td>----</td>
                         <td align="right"><p class="final-price"><b><i class="fa-solid fa-indian-rupee-sign"></i> 5,834</b></p>
                         <a href="{{ route('passenger-details') }}"> <button class="btn btn-book-now">Book Now</button> </a>
                        </td>

               </tr>


                <tr>
                 <td class=""><b>Saver</b>
                  <p>
                    Fair offered by airline.
                  </p>
                </td>
                  <td >7kgs</td>
                   <td>15kgs</td>
                    <td>cancellation <br>  fee starting <i class="fa-solid fa-indian-rupee-sign"></i> 3,500 </td>
                     <td>Date change <br>  fee starting <i class="fa-solid fa-indian-rupee-sign"></i> 3250</td>
                      <td>Middle Seat Free, <br> Window/Asile Chargeable</td>
                       <td>----</td>
                         <td align="right"><p class="final-price"><b><i class="fa-solid fa-indian-rupee-sign"></i> 5,834</b></p>
                         <a href="{{ route('passenger-details') }}"> <button class="btn btn-book-now">Book Now</button></a>
                        </td>

               </tr>
             </tbody>
           </table>
         <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>


<!-- book modal end -->


<section class="bg-grey" style="height: 300px; margin-bottom: -150px;">
	<div class="container container-make mt-5" style="  ">

<div class="row">
  <div class="col-md-2 " style="">

        <div class="airport-name-inner ">
           <small class="inner-smaltext">Trip Type</small>
          <p><b>Round trip</b></p>

        </div>
      </div>
      <div class="col-md-3" style="position: relative;">
        <div class="row">
          <div class="col-md-6">
        <div class="airport-name-inner from-to-inner ">
           <small class="inner-smaltext">From</small>
          <p><b>Hyderabad</b></p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="airport-name-inner">
          <small class="inner-smaltext">To</small>
          <p><b>Mumbai</b></p>
        </div>
      </div>
    </div>
       </div>
      <div class="col-md-3">
        <div class="row">
          <div class="col-md-6">
        <div class="airport-name-inner">
          <small class="inner-smaltext">Departure</small>
          <p><b>10 June, 22</b></p>
        </div>
          </div>
          <div class="col-md-6" >
        <div class="airport-name-inner" style=" padding: 6px 10px;">
          <small class="inner-smaltext">Return</small>
          <a href="{{ route('passenger-details') }}"><p class="return-book">Select Return</p></a>
          </div>
        </div>
      </div>
      </div>
      <div class="col-md-2">
        <div class="airport-name-inner">
           <small class="inner-smaltext">Travellers & Class</small>
          <p><b>1 Adult, 1 Child</b></p>
        </div>
      </div>

      <div class="col-md-2 ms-auto">
        <button class="btn btn-search-flights">Search Flights</button>
      </div>
     </div>
   </div>
 </section>

 <section style="padding-top: 50px;">

 <div class="container container-make">
  <div class="row" >
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
            <div class=""><img src="assets/img/sun-set-1.png" class="img-fluid"></div>
            <p>Before 6 AM <br> 9418</p>
         </div>
       </div>
        <div class="col-md-4 main-departure">
           <div class="departure-1">
            <div class=""><img src="assets/img/sun-set-1.png" class="img-fluid"></div>
            <p>Before 6 AM <br> 9418</p>
         </div>
        </div>
        <div class="col-md-4 main-departure">
           <div class="departure-1">
            <div class=""><img src="assets/img/sun-set-1.png" class="img-fluid"></div>
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
            <div class=""><img src="assets/img/sun-set-1.png" class="img-fluid"></div>
            <p>Before 6 AM <br> 9418</p>
         </div>
       </div>
        <div class="col-md-4 main-departure">
           <div class="departure-1">
            <div class=""><img src="assets/img/sun-set-1.png" class="img-fluid"></div>
            <p>Before 6 AM <br> 9418</p>
         </div>
        </div>
        <div class="col-md-4 main-departure">
           <div class="departure-1">
            <div class=""><img src="assets/img/sun-set-1.png" class="img-fluid"></div>
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
    <div class="text-end mt-2"><a href="#" >View more</a></div>
  </div>

  </div>
  </div>
  </div>

  <div class="col-md-9 p-3">
    <div class="card">
      <div class="card-body card-shadow">
     <h5>Flights from Hyderabad to Mumbai</h5>
   <div class="wrapper">
      <div class="carousel">
        <div class="date-active"><p class="date-inner ">Mon, Jul 04</p>
          <p class="price-inner"><i class="fa-solid fa-indian-rupee-sign"></i> 6,825</p>
        </div>
        <div><p class="date-inner">Mon, Jul 04</p>
          <p class="price-inner"><i class="fa-solid fa-indian-rupee-sign"></i> 6,825</p>
        </div>
        <div><p class="date-inner">Mon, Jul 04</p>
          <p class="price-inner"><i class="fa-solid fa-indian-rupee-sign"></i> 6,825</p>
        </div>
        <div><p class="date-inner">Mon, Jul 04</p>
          <p class="price-inner"><i class="fa-solid fa-indian-rupee-sign"></i> 6,825</p>
        </div>
        <div><p class="date-inner">Mon, Jul 04</p>
          <p class="price-inner"><i class="fa-solid fa-indian-rupee-sign"></i> 6,825</p>
        </div>
        <div><p class="date-inner">Mon, Jul 04</p>
          <p class="price-inner"><i class="fa-solid fa-indian-rupee-sign"></i> 6,825</p>
        </div>
         <div><p class="date-inner">Mon, Jul 04</p>
          <p class="price-inner"><i class="fa-solid fa-indian-rupee-sign"></i> 6,825</p>
        </div>
        <div><p class="date-inner">Mon, Jul 04</p>
          <p class="price-inner"><i class="fa-solid fa-indian-rupee-sign"></i> 6,825</p>
        </div>
        <div><p class="date-inner">Mon, Jul 04</p>
          <p class="price-inner"><i class="fa-solid fa-indian-rupee-sign"></i> 6,825</p>
        </div>
        <div><p class="date-inner">Mon, Jul 04</p>
          <p class="price-inner"><i class="fa-solid fa-indian-rupee-sign"></i> 6,825</p>
        </div>
        <div><p class="date-inner">Mon, Jul 04</p>
          <p class="price-inner"><i class="fa-solid fa-indian-rupee-sign"></i> 6,825</p>
        </div>
        <div><p class="date-inner">Mon, Jul 04</p>
          <p class="price-inner"><i class="fa-solid fa-indian-rupee-sign"></i> 6,825</p>
        </div>
        <div><p class="date-inner">Mon, Jul 04</p>
          <p class="price-inner"><i class="fa-solid fa-indian-rupee-sign"></i> 6,825</p>
        </div>
        <div><p class="date-inner">Mon, Jul 04</p>
          <p class="price-inner"><i class="fa-solid fa-indian-rupee-sign"></i> 6,825</p>
        </div>
        <div><p class="date-inner">Mon, Jul 04</p>
          <p class="price-inner"><i class="fa-solid fa-indian-rupee-sign"></i> 6,825</p>
        </div>
        <div><p class="date-inner">Mon, Jul 04</p>
          <p class="price-inner"><i class="fa-solid fa-indian-rupee-sign"></i> 6,825</p>
        </div>
         <div><p class="date-inner">Mon, Jul 04</p>
          <p class="price-inner"><i class="fa-solid fa-indian-rupee-sign"></i> 6,825</p>
        </div>
        <div><p class="date-inner">Mon, Jul 04</p>
          <p class="price-inner"><i class="fa-solid fa-indian-rupee-sign"></i> 6,825</p>
        </div>
        <div><p class="date-inner">Mon, Jul 04</p>
          <p class="price-inner"><i class="fa-solid fa-indian-rupee-sign"></i> 6,825</p>
        </div>
        <div><p class="date-inner">Mon, Jul 04</p>
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
            <tr>
              <td style="width:25%">
                <div>
                  <div class="row">
                    <div class="col-md-4">
                      <img src="assets/img/sorted-flights.png">
                    </div>
                    <div class="col-md-8">
                     <p class="flight-number">FI.No.AI 698</p>
                      <p class="flight-brand">Air India</p>
                    </div>
                  </div>
                </div>
              </td>
              <td style="width:15%">
                <div>
                  <p class="flight-number">Hyderabad</p>
                  <p class="flight-brand">22:25</p>
                </div>
              </td>
               <td style="width:25%">
                 <div>
                  <p class="flight-number"><span class="brdr-btm-time">NON-STOP</span></p>
                  <p class="flight-brand">01 h 25 m </p>
                </div>
               </td>
                <td style="width:15%">
                  <div>
                  <p class="flight-number">Mumbai</p>
                  <p class="flight-brand">22:25</p>
                </div>
                </td>
                 <td style="width:20%">
                   <div>
                  <p class=" flight-brand"><i class="fa-solid fa-indian-rupee-sign"></i> 5,834</p>
                  <p class="flight-brand"><a href="#" data-bs-toggle="modal" data-bs-target="#book-table">View & More</a></p>
                </div>
                 </td>
            </tr>
            <tr>
              <td style="width:25%">
                <div>
                  <div class="row">
                    <div class="col-md-4">
                      <img src="assets/img/flight-logo-2.png">
                    </div>
                    <div class="col-md-8">
                     <p class="flight-number">FI.No.AI 698</p>
                      <p class="flight-brand">IndiGo  </p>
                    </div>
                  </div>
                </div>
              </td>
              <td style="width:15%">
                <div>
                  <p class="flight-number">Hyderabad</p>
                  <p class="flight-brand">22:25</p>
                </div>
              </td>
               <td style="width:25%">
                 <div>
                  <p class="flight-number"><span class="brdr-btm-time">NON-STOP</span></p>
                  <p class="flight-brand">01 h 25 m </p>
                </div>
               </td>
                <td style="width:15%">
                  <div>
                  <p class="flight-number">Mumbai</p>
                  <p class="flight-brand">22:25</p>
                </div>
                </td>
                 <td style="width:20%">
                   <div>
                  <p class=" flight-brand"><i class="fa-solid fa-indian-rupee-sign"></i> 5,834</p>
                  <p class="flight-brand"><a href="#" data-bs-toggle="modal" data-bs-target="#book-table">View & More</a></p>
                </div>
                 </td>
            </tr>
            <tr>
              <td style="width:25%">
                <div>
                  <div class="row">
                    <div class="col-md-4">
                      <img src="assets/img/flight-logo-3.png">
                    </div>
                    <div class="col-md-8">
                     <p class="flight-number">FI.No.AI 698</p>
                      <p class="flight-brand">AirAsia</p>
                    </div>
                  </div>
                </div>
              </td>
              <td style="width:15%">
                <div>
                  <p class="flight-number">Hyderabad</p>
                  <p class="flight-brand">22:25</p>
                </div>
              </td>
               <td style="width:25%">
                 <div>
                  <p class="flight-number"><span class="brdr-btm-time">NON-STOP</span></p>
                  <p class="flight-brand">01 h 25 m </p>
                </div>
               </td>
                <td style="width:15%">
                  <div>
                  <p class="flight-number">Mumbai</p>
                  <p class="flight-brand">22:25</p>
                </div>
                </td>
                 <td style="width:20%">
                   <div>
                  <p class=" flight-brand"><i class="fa-solid fa-indian-rupee-sign"></i> 5,834</p>
                  <p class="flight-brand"><a href="#">View & More</a></p>
                </div>
                 </td>
            </tr>
            <tr>
              <td style="width:25%">
                <div>
                  <div class="row">
                    <div class="col-md-4">
                      <img src="assets/img/flight-logo-4.png">
                    </div>
                    <div class="col-md-8">
                     <p class="flight-number">FI.No.AI 698</p>
                      <p class="flight-brand">SpiceJet</p>
                    </div>
                  </div>
                </div>
              </td>
              <td style="width:15%">
                <div>
                  <p class="flight-number">Hyderabad</p>
                  <p class="flight-brand">22:25</p>
                </div>
              </td>
               <td style="width:25%">
                 <div>
                  <p class="flight-number"><span class="brdr-btm-time">NON-STOP</span></p>
                  <p class="flight-brand">01 h 25 m </p>
                </div>
               </td>
                <td style="width:15%">
                  <div>
                  <p class="flight-number">Mumbai</p>
                  <p class="flight-brand">22:25</p>
                </div>
                </td>
                 <td style="width:20%">
                   <div>
                  <p class=" flight-brand"><i class="fa-solid fa-indian-rupee-sign"></i> 5,834</p>
                  <p class="flight-brand"><a href="#">View & More</a></p>
                </div>
                 </td>
            </tr>
            <tr>
              <td style="width:25%">
                <div>
                  <div class="row">
                    <div class="col-md-4">
                      <img src="assets/img/sorted-flights.png">
                    </div>
                    <div class="col-md-8">
                     <p class="flight-number">FI.No.AI 698</p>
                      <p class="flight-brand">Air India</p>
                    </div>
                  </div>
                </div>
              </td>
              <td style="width:15%">
                <div>
                  <p class="flight-number">Hyderabad</p>
                  <p class="flight-brand">22:25</p>
                </div>
              </td>
               <td style="width:25%">
                 <div>
                  <p class="flight-number"><span class="brdr-btm-time">NON-STOP</span></p>
                  <p class="flight-brand">01 h 25 m </p>
                </div>
               </td>
                <td style="width:15%">
                  <div>
                  <p class="flight-number">Mumbai</p>
                  <p class="flight-brand">22:25</p>
                </div>
                </td>
                 <td style="width:20%">
                   <div>
                  <p class=" flight-brand"><i class="fa-solid fa-indian-rupee-sign"></i> 5,834</p>
                  <p class="flight-brand"><a href="#">View & More</a></p>
                </div>
                 </td>
            </tr>
            <tr>
              <td style="width:25%">
                <div>
                  <div class="row">
                    <div class="col-md-4">
                      <img src="assets/img/sorted-flights.png">
                    </div>
                    <div class="col-md-8">
                     <p class="flight-number">FI.No.AI 698</p>
                      <p class="flight-brand">Air India</p>
                    </div>
                  </div>
                </div>
              </td>
              <td style="width:15%">
                <div>
                  <p class="flight-number">Hyderabad</p>
                  <p class="flight-brand">22:25</p>
                </div>
              </td>
               <td style="width:25%">
                 <div>
                  <p class="flight-number"><span class="brdr-btm-time">NON-STOP</span></p>
                  <p class="flight-brand">01 h 25 m </p>
                </div>
               </td>
                <td style="width:15%">
                  <div>
                  <p class="flight-number">Mumbai</p>
                  <p class="flight-brand">22:25</p>
                </div>
                </td>
                 <td style="width:20%">
                   <div>
                  <p class=" flight-brand"><i class="fa-solid fa-indian-rupee-sign"></i> 5,834</p>
                  <p class="flight-brand"><a href="#">View & More</a></p>
                </div>
                 </td>
            </tr>
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
      $(document).ready(function(){
  $('.carousel').slick({
  slidesToShow: 7,
  dots:false,
  centerMode: true,
  });
});
    </script>
@endsection