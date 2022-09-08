@extends('layouts.app')
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
    <button class="nav-link active " id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">One Way</button>
  </li>
  <li class="nav-item  nav-item-border" role="presentation">
    <button class="nav-link " id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Round Trip</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Multi City</button>
  </li>
</ul>



<div class="tab-content tab-content-btm" id="myTabContent">

  <!-- 1st tab -->

  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
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
     			<div class="col-md-6" >
     				<small>Return</small>
     		<div class="airport-name" style="padding: 4px 15px;">
     			<a href="#"><p class="return-book">Click to add a return flight for a better discounts</p></a>
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

     	<div class="col-md-2 ms-auto " style="    margin-top: 1rem;">
     		  <a href="{{ route('search-flights') }}"> <button class="btn btn-search-flights">Search Flights</button> </a>
     	</div>
     </div>
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
          <div class="col-md-6" >
            <small>Return</small>
        <div class="airport-name" style="padding: 4px 15px;">
          <a href="#"><p class="return-book">Click to add a return flight for a better discounts</p></a>
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
          <div class="col-md-6" >
            <small>Return</small>
        <div class="airport-name" style="padding: 4px 15px;">
          <a href="#"><p class="return-book">Click to add a return flight for a better discounts</p></a>
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
          <a href="{{ route('search-flights') }}"> <button class="btn btn-search-flights">Search Flights</button></a>
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

 </div> <!--End of container -->

@endsection