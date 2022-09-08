@extends('layouts.app')
@section('style-content')
<link rel="stylesheet" href="{{ asset('assets/css/all.min.css')}}" >


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
.form-control {
padding: 15px 0px 15px 15px;
}
.modal-headd {
  background: #257483;
color: white;
border-radius: 0;
border: 0px solid #257483;
}


</style>
@endsection
@section('content')
<!--Review Details modal -->

<div class="modal" id="review-details">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-body p-0">
          <div class="modal-header modal-headd">
            <h6>Review Details</h6>
          </div>
           <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-times"></i></button>

            <div class="p-3">
             <table class="table table-bordered ">
               <tr>
                 <td>First & Middle Name</td>
                 <td>Raju</td>
               </tr>
               <tr>
                 <td>Last Name</td>
                 <td>Krishna</td>
               </tr>
                <tr>
                 <td>Gender</td>
                 <td>Male</td>
               </tr>
             </table>
           </div>

             <div class="modal-footer text-end">
              <button class="btn btn-edit">Edit</button>
                <a href="{{ route('booking-final')}}"><button class="btn btn-confirm">Confirm</button></a>
             </div>

           <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>


  <!-- Review Details end -->

  <div class="bg-grey" style="height: 300px; margin-bottom: -270px;"></div>
  <section class="" >



    <div class="container container-make">
     <div class="row">

     <div class="col-md-9 p-3">
        <h5><b>Complete your booking</b></h5>
       <div class="card">

         <div class="card-body card-shadow">
            <div class="d-flex align-items-center justify-content-between">
              <div>
                <h5>Hyderabad <i class="fa-solid fa-arrow-right" style="    margin: 0px 5px;"></i> Mumbai</h5>
                <p class="f-14-mb-10">Monday, Jul 4  Non stop - 1h 25m</p>
              </div>

              <div>
                <button class="btn btn-refund">NON-REFUNDABLE</button>
                <p class="mt-3 f-14-mb-10">View Fare Rules</p>
              </div>

            </div>

           <div class="d-flex align-items-center justify-content-between">
             <div>
               <img src="assets/img/flight-logo-2.png" style="    width: 25%">  Air India, Al 698
             </div>
              <div>
                <a href="#">Economy</a>
                <i class="fa-solid fa-angle-right"></i>
                <a href="#">Ecoomic Basic</a>
              </div>
           </div>

           <div class="row bg-rajiv ">
             <div class="col-md-2">
               <p>22:25</p>
             </div>
               <div class="col-md-10">
                 <p><b>Hyderabad.</b> Rajiv Gandhi International Airport  </p>
                 <p > 1h 25m</p>
               </div>
                 <div class="col-md-2">
                   <p style="margin-bottom: 0px;">22:25</p>
                 </div>
                   <div class="col-md-10">
                      <p style="margin-bottom: 0px;"><b>Mumbai.</b> Chhatrapati Shivaji International Airport Terminal 2</p>
                   </div>
           </div>


           <div class="row align-items-center cancel-ticket">
             <div class="col-md-1">
               <img src="assets/img/flight-fly.png" class="img-fluid">
             </div>
              <div class="col-md-11 ps-0">
                <h5><b>canellation Refund Policy</b></h5>
                <p>Zero cancellation fee for your tickets when you cancel. Pay additional Rs.399</p>
              </div>
           </div>


           <div class="mt-3 mb-3 cancelation-tab">
               <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                   <li class="nav-item" role="presentation">
                     <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Cancellation Charges</button>
                   </li>
                   <li class="nav-item" role="presentation">
                     <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Data Changes Charges</button>
                   </li>
                 </ul>
                 <div class="tab-content ps-3" id="pills-tabContent">
                   <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                      <h6>Hyderabad - Mumbai</h6>

                      <table class="table table-bordered text-center ">
                       <tbody>
                         <tr>
                           <th colspan="2">Without Cancellation Protection</th>
                            <th colspan="2">With Cancellation Protection</th>
                         </tr>
                         <tr>
                           <td>Cancellation Fee <p><i class="fa-solid fa-indian-rupee-sign"></i> 2600</p></td>
                            <td>Cancellation Fee <p><i class="fa-solid fa-indian-rupee-sign"></i> 2600</p></td>
                             <td>Cancellation Fee <p><i class="fa-solid fa-indian-rupee-sign"></i> 2600</p></td>
                              <td>Cancellation Fee <p><i class="fa-solid fa-indian-rupee-sign"></i> 2600</p></td>
                         </tr>
                       </tbody>
                      </table>

                   </div>
                   <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                       <h6>Hyderabad - Mumbai</h6>

                      <table class="table table-bordered text-center ">
                       <tbody>
                         <tr>
                           <th colspan="2">Without Cancellation Protection</th>
                            <th colspan="2">With Cancellation Protection</th>
                         </tr>
                         <tr>
                           <td>Cancellation Fee <p><i class="fa-solid fa-indian-rupee-sign"></i> 2600</p></td>
                            <td>Cancellation Fee <p><i class="fa-solid fa-indian-rupee-sign"></i> 2600</p></td>
                             <td>Cancellation Fee <p><i class="fa-solid fa-indian-rupee-sign"></i> 2600</p></td>
                              <td>Cancellation Fee <p><i class="fa-solid fa-indian-rupee-sign"></i> 2600</p></td>
                         </tr>
                       </tbody>
                      </table>

                   </div>
                 </div>
           </div>


             <div class=" unsure-ticket align-items-center">
                <img src="assets/img/flight-fly.png" class="img-fluid">
                <span><h5><b>Unsure of your travel plans?</b></h5> </span>
             </div>

             <div class="row align-items-center check-ticket">
              <div class="col-md-12 form-check">
                   <input class="form-check-input" type="checkbox">
                <div class="add-type">
                 <p >Add Free Date Change</p>
                 <img src="assets/img/calender-addfree.png">
               </div>
                <div class="add-type1">
                 <p>Save up to ₹ 2,625 on date change charges up to 24 hours before departure. You just pay the fare difference. <a href="#"> View T&C </a></p>

                 <h6><i class="fa-solid fa-indian-rupee-sign"></i> 125</h6>
               </div>
              </div>
           </div>

           <div class="row align-items-center cancel-ticket">
             <div class="col-md-1">
               <img src="assets/img/travel-insurance.png" class="img-fluid">
             </div>
              <div class="col-md-11 ps-0">
                <h5><b>Travel Insurance</b></h5>
                <p>Zero cancellation fee for your tickets when you cancel. Pay additional Rs.399</p>
              </div>
           </div>

           <div class="row mt-3">

             <div class="col-md-4 ">
               <div class="delay-tabs">
                 <div class="row ">
                   <div class="col-md-2 img-pl-0">
                     <img src="assets/img/clock-expire-16.png">
                   </div>
                   <div class="col-md-10">
                     <p>Upto  <i class="fa-solid fa-indian-rupee-sign"></i> 1,000 </p>
                     <p>Trip Delay</p>

                   </div>
                 </div>
               </div>
             </div>

              <div class="col-md-4 ">
               <div class="delay-tabs">
                 <div class="row ">
                   <div class="col-md-2 img-pl-0">
                     <img src="assets/img/cancel-2.png">
                   </div>
                   <div class="col-md-10">
                     <p>Upto  <i class="fa-solid fa-indian-rupee-sign"></i> 2,000 </p>
                     <p>Missed flight Connection</p>

                   </div>
                 </div>
               </div>
             </div>

              <div class="col-md-4 ">
               <div class="delay-tabs">
                 <div class="row ">
                   <div class="col-md-2 img-pl-0">
                     <img src="assets/img/cancel-3.png">
                   </div>
                   <div class="col-md-10">
                     <p>Upto  <i class="fa-solid fa-indian-rupee-sign"></i> 2,000 </p>
                     <p>Trip cancellation</p>

                   </div>
                 </div>
               </div>
             </div>
           </div>



           <div class="row align-items-center check-ticket">
              <div class="col-md-12 form-check">
                   <input class="form-check-input" type="checkbox">
                <div class="">
                 <h6 class="add-free-chk" >Yes, Secure my trip.</h6>
               </div>
              </div>
              <div class="col-md-12 form-check">
                   <input class="form-check-input" type="checkbox">
                <div class="">
                 <h6 class="add-free-chk2">I do not wish to secure my trip</h6>
               </div>
              </div>

           </div>
           <div class="input-info">
             <p>By adding insurance you confirm all passengers are between 2 to 70 years of age, and agree to theTerms & Conditions andGood Health Terms</p>
           </div>


           <div class="row align-items-center cancel-ticket">
             <div class="col-md-1">
               <img src="assets/img/enter-travellar-img.png" class="img-fluid">
             </div>
              <div class="col-md-8 ps-0">
                <h5><b>Enter Traveller Details</b></h5>
                <p> Book faster and Easy</p>
              </div>
              <div class=" col-md-3 text-end">
                <button class="btn btn-blue-continue">Add New Adult</button>
              </div>
           </div>
           <form>
             <div class="row first-inputname ">
               <div class="col-md-4">
               <div class="form-group">
                 <input type="text" name="" class="form-control" placeholder="First and middle name">
               </div>
             </div>
             <div class="col-md-4">
               <div class="form-group">
                 <input type="text" name="" class="form-control" placeholder="Last name">
               </div>
             </div>
             <div class="col-md-4 text-end ">
               <div class="btn-group btn-grp" role="group" aria-label="Basic outlined example">
                   <button type="button" class="btn btn-outline-primary">Male</button>
                   <button type="button" class="btn btn-outline-primary">Female</button>
                 </div>
             </div>
             <label>Booking Details will be sent to</label>
              <div class="col-md-2">
               <div class="form-group">
                 <input type="text" name="" class="form-control" placeholder="Country Code">
               </div>
             </div>
              <div class="col-md-5">
               <div class="form-group">
                 <input type="text" name="" class="form-control" placeholder="Mobile Number">
               </div>
             </div>
              <div class="col-md-5">
               <div class="form-group">
                 <input type="text" name="" class="form-control" placeholder="Email ID">
               </div>
             </div>
           </div>
              <div class="row check-ticket-new">
              <div class=" form-check check-ticket">
                   <input class="form-check-input" type="checkbox">
                 <h6 class="" >Also send my booking details on WhatsApp</h6>

              </div>
            </div>
            <div class="row mt-5">
             <div class="col-md-3 ms-auto text-end">
             <a href="#"  data-bs-toggle="modal" data-bs-target="#review-details"><button class="btn btn-blue-continue"> Continue
             </button></a>
           </div>
            </div>
           </form>




         </div>
       </div>
     </div>
     <div class="col-md-3 p-3 mt30 ">
        <div class="card">
          <div class=" card-body card-shadow">
            <h5><b>Fare Summery</b></h5>

              <div class="accordion" id="myAccordion">
                  <div class="accordion-item">
                      <h2 class="accordion-header" id="headingOne">
                          <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                            <span class="ms-2">Base Fare </span> <span class="ms-auto"> <i class="fa-solid fa-indian-rupee-sign"></i>  4,600</span>
                          </button>
                      </h2>
                      <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#myAccordion">
                           <small class="ms-3">
                            <span>Base Fare </span>
                             <span class="float-end"> <i class="fa-solid fa-indian-rupee-sign"></i>  4,600</span>
                           </small>
                      </div>
                  </div>
              </div>


              <div class="accordion mt-2" id="myAccordion">
                  <div class="accordion-item">
                      <h2 class="accordion-header" id="headingOne">
                          <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne2">
                            <span class="ms-2">Fee & Surcharges </span> <span class="ms-auto"> <i class="fa-solid fa-indian-rupee-sign"></i>  500</span>
                          </button>
                      </h2>
                      <div id="collapseOne2" class="accordion-collapse collapse" data-bs-parent="#myAccordion">
                           <small class="ms-3">
                            <span>Other Charges </span>
                             <span class="float-end"> <i class="fa-solid fa-indian-rupee-sign"></i>  125</span>
                           </small>
                      </div>
                  </div>
              </div>

              <div class="accordion mt-2" id="myAccordion">
                  <div class="accordion-item">
                      <h2 class="accordion-header" id="headingOne">
                          <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne3">
                            <span class="ms-2">Other Charges </span> <span class="ms-auto"> <i class="fa-solid fa-indian-rupee-sign"></i> 125</span>
                          </button>
                      </h2>
                      <div id="collapseOne3" class="accordion-collapse collapse" data-bs-parent="#myAccordion">
                           <small class="ms-3">
                            <span>Other Charges </span>
                             <span class="float-end"> <i class="fa-solid fa-indian-rupee-sign"></i> 125</span>
                           </small>
                      </div>
                  </div>
                  <div class="border-dassed"></div>
              </div>

              <div class="row ">
                <div class="col-md-7">
                  <b>Total Amount</b>
                </div>
                <div class="col-md-5  text-end">
                  <i class="fa-solid fa-indian-rupee-sign"></i> 5,225
                </div>
              </div>


       </div>
      </div>


    </div>
    </div>
    </div>
  </section>
@endsection