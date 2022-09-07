<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>:: MakeMyFly | Home </title>

  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/fonts/fontawesome/css/all.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}" >


  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

    <style type="text/css">

    </style>

    <!-- Jquery min JS google CDN -->
    <script src="{{ asset('assets/js/jquery-3.6.0.js') }}"></script>

  <link href="{{ asset('assets/css/toast.css') }}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="{{ asset('assets/js/toast.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</head>

<body>



    <!-- Login modal -->

<div class="modal" id="loginModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">

         <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-times"></i></button>
        <h5 class="modal-title modal-titile-mmf">
            Already Using Makemyfly?</h5>
        <p>Login here to your Account</p>

        <div class="clearfix mb-4"></div>
        <form method="post">
            <div class="row">
                <div class="col-md-12 label-modal ">
                    <div class="form-group">
                        <label>Email ID</label>
                        <input type="text" name="text" id="text" class="form-control" autocomplte='off'  placeholder=""/>
                        <p class="input-icon"><i class="fa fa-envelope"></i></p>
                    </div>
                </div>
                <div class="col-md-12 label-modal">
                    <div class="form-group">
                         <label>Passsword</label>
                        <input type="password" name="password" id="password"  autocomplte='off' class="form-control" placeholder="">
                        <p class="input-icon"><i class="fa fa-lock"></i></p>
                    </div>
                </div>
                <div class="col-md-8">
                    <p class="gotpw"><a href=""  data-bs-toggle="modal" data-bs-target="#forgot">Forgot Password?</a></p>
                    <p class="link"><a href="" data-bs-toggle="modal" data-bs-target="#reset"><i>Reset Password</i></a></p>
                </div>
                <div class="col-md-4 text-right">
                    <a href="" class="btn btn-theme float-end" data-bs-toggle="modal" data-bs-target="#loginotp" style="cursor:pointer">LOGIN</a>
                </div>
            </div>
        </form>
         <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>




<!-- OTP model -->

<div class="modal" id="loginotp">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">

         <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-times"></i></button>
        <h5 class="modal-title modal-titile-mmf">
            OTP Sent to your Registered Mobile</h5>
        <p>XXXXXXXX94 Please Verify</p>

        <div class="clearfix mb-4"></div>
        <form method="post">
            <div class="row">
                <div class="col-md-12 label-modal ">
                    <div class="form-group">
                        <label>Enter your OTP</label>
                       <div class="otp-input">
                        <input type="text" name="text" id="text" class="form-control form-otp" autocomplte='off'  placeholder=""/>
                        <input type="text" name="text" id="text" class="form-control form-otp" autocomplte='off'  placeholder=""/>
                        <input type="text" name="text" id="text" class="form-control form-otp" autocomplte='off'  placeholder=""/>
                        <input type="text" name="text" id="text" class="form-control form-otp" autocomplte='off'  placeholder=""/>
                        <input type="text" name="text" id="text" class="form-control form-otp" autocomplte='off'  placeholder=""/>
                        <input type="text" name="text" id="text" class="form-control form-otp" autocomplte='off'  placeholder=""/>
                      </div>
                    </div>
                </div>
                <div class="col-md-12 text-right mt-4">
                    <a href="home.html" class="btn btn-theme float-end">Submit</a>
                </div>
            </div>
        </form>
         <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>


<!-- forgot password -->


 <div class="modal" id="forgot">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">

         <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-times"></i></button>
        <h5 class="modal-title modal-titile-mmf">
            Forgot Password?</h5>
        <p class="mb-4">Enter detials for Create New Password</p>
        <small>OTP Sent to your Registered Mobile Number XXXXXX94 Please verify</small>
        <div class="clearfix mb-4"></div>
        <form method="post">
            <div class="row">
                <div class="col-md-12 mb-3 label-modal ">
                    <div class="form-group">
                        <label>Enter your OTP</label>
                       <div class="otp-input">
                        <input type="text" name="text" id="text" class="form-control form-otp" autocomplte='off'  placeholder=""/>
                        <input type="text" name="text" id="text" class="form-control form-otp" autocomplte='off'  placeholder=""/>
                        <input type="text" name="text" id="text" class="form-control form-otp" autocomplte='off'  placeholder=""/>
                        <input type="text" name="text" id="text" class="form-control form-otp" autocomplte='off'  placeholder=""/>
                        <input type="text" name="text" id="text" class="form-control form-otp" autocomplte='off'  placeholder=""/>
                        <input type="text" name="text" id="text" class="form-control form-otp" autocomplte='off'  placeholder=""/>
                      </div>
                    </div>
                </div>
                <div class="clearfix "></div>
                <div class="col-md-12 label-modal">
                    <div class="form-group">
                         <label>New Passsword</label>
                        <input type="password" autocomplte='off' name="password" id="password" class="form-control" placeholder=""/>
                        <p class="input-icon"><i class="fa fa-lock"></i></p>
                        <p class="input-icon-after"><i class="fa fa-eye"></i></p>
                    </div>
                </div>
                 <div class="col-md-12 label-modal">
                    <div class="form-group">
                         <label>Confirm New Passsword</label>
                        <input type="password" autocomplte='off' name="password" id="password" class="form-control" placeholder=""/>
                        <p class="input-icon"><i class="fa fa-lock"></i></p>
                        <p class="input-icon-after"><i class="fa fa-eye-slash"></i></p>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <a href="" class="btn btn-theme">Submit</a>
                </div>
            </div>
        </form>
         <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>


<!-- Reset password -->

<div class="modal" id="reset">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">

         <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-times"></i></button>
        <h5 class="modal-title modal-titile-mmf">
            Reset Password</h5>
        <p>Enter detials for Reset password</p>
        <div class="clearfix mb-4"></div>
        <form method="post">
            <div class="row">
                  <div class="col-md-12 label-modal">
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" autocomplte='off' name="password" id="password" class="form-control" placeholder=" "/>
                        <p class="input-icon"><i class="fa fa-lock"></i></p>
                        <p class="input-icon-after"><i class="fa fa-eye"></i></p>
                    </div>
                </div>
                <div class="col-md-12 label-modal">
                    <div class="form-group">
                          <label>New Password</label>
                        <input type="password" autocomplte='off' name="password" id="password" class="form-control" placeholder=""/>
                        <p class="input-icon"><i class="fa fa-lock"></i></p>
                        <p class="input-icon-after"><i class="fa fa-eye"></i></p>
                    </div>
                </div>
                 <div class="col-md-12 label-modal">
                    <div class="form-group">
                            <label>Confirm New Password</label>
                        <input type="password" autocomplte='off' name="password" id="password" class="form-control" placeholder=""/>
                        <p class="input-icon"><i class="fa fa-lock"></i></p>
                        <p class="input-icon-after"><i class="fa fa-eye-slash"></i></p>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <a href="" class="btn btn-theme">Submit</a>
                </div>
            </div>
        </form>
         <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>




  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container container-make   d-flex align-items-center">

      <h1 class="logo me-auto"><a href="{{ route('index') }}"><img src="assets/img/MMF.png"></a></h1>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <!--<li><a class="" href="javascript:void(0);">Flights</a></li>-->
          <li><a class="active" href="{{ route('index') }}">Home</a></li>
          <li><a href="{{ route('about') }}">About Us</a></li>
          <li><a href="{{ route('services') }}">Services</a></li>
          <li><a href="{{ route('contact') }}">Contact Us</a></li>
          <li><a data-bs-toggle="modal" data-bs-target="#loginModal" style="cursor:pointer">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header>

  <!-- End Header -->


  <main id="main">

            @yield('content')

</main><!-- End #main -->

    <!-- ======= Footer ======= -->
 <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <img src="{{asset('assets/img/MMF.png')}}" class="img-fluid" width="150">
            <p class="mt-3">

              <strong>Phone:</strong> +9140 66464466<br>
              <strong>Email:</strong>support@makemyfly.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4></h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('index') }}">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('about') }}">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('services') }}">Services</a></li>
               <li><i class="bx bx-chevron-right"></i> <a href="{{ route('contact')}}">Contact Us</a></li>

            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4></h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('privacy') }}">Privacy Policy</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('terms-conditions') }}">Terms of Service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="payment">Make Payment</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <!--<h4>Join Our Newsletter</h4>-->
            <!--<p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>-->
            <!--<form action="" method="post">-->
            <!--  <input type="email" name="email"><input type="submit" value="Subscribe">-->
            <!--</form>-->

             <div style="text-align:left;">
                  <h4>Address</h4>

                <p class="" style="color:#777;"> 21-7-760 , Ghansi bazaar,<br> Hyderabad - 500002</p>

            </div>

            <div class="social-links text-left text-md-right pt-3 pt-md-0">

            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>

            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>


          </div>




          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright" style="color: #fff;">
          &copy; Copyright <strong><span>MakeMyFly</span></strong>. All Rights Reserved
        </div>

      </div>


       <div class="credits">

          Designed by <a href="https://vmaxindia.com" target="_blank">VMax</a>
        </div>




    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/purecounter/purecounter.js')}}"></script>
  <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>

  {{-- <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script> --}}

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>

@yield('script-content')

</body>

</html>