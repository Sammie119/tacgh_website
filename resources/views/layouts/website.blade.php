<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>TACCCU - Home</title>
	<meta content="" name="description">
	<meta content="" name="keywords">

	<!-- Favicons -->
	<link href="{{ asset('assets/sys_img/favicon.ico') }}" rel="icon">
	<link href="{{ asset('assets/website/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<!-- Vendor CSS Files -->
	<link href="{{ asset('assets/website/vendor/aos/aos.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/website/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/website/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/website/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/website/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/website/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/website/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

	@stack('styles')

	<!-- Template Main CSS File -->
	<link href="{{ asset('assets/website/css/style.css') }}" rel="stylesheet">

	<style>
        .main-hero {
            margin-top: 4%;
        }

        #infoi {
            width: 7%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 10;
            margin-left: 5%;
            background-color: #fff;
        }
	</style>

	<!-- =======================================================
	* Template Name: Arsha
	* Updated: Sep 18 2023 with Bootstrap v5.3.2
	* Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
	* Author: BootstrapMade.com
	* License: https://bootstrapmade.com/license/
	======================================================== -->
</head>

<body>
	<!-- ======= Header ======= -->
	<header id="header" class="fixed-top ">
		<div class="container d-flex align-items-center">

			 <div id="infoi" class="d-flex align-items-center">
				<div>
					{{-- <img src="{{ asset('assets/sys_img/tacccu_logo2.jpg') }}" width="80" height="50" alt="logo" style="margin-left: 11%"> --}}
					<a href="/"><img src="{{ asset(get_asset('Logo')) }}" alt="logo" style="margin-left: 5%; width: 90%"></a>
				</div>
			 </div>

			<h1 class="logo me-auto"><a href="/">
				{{-- <img src="{{ asset('assets/sys_img/tacccu_logo2.jpg') }}" width="50" alt="logo" style="'backgroung-color: white"> --}}
			</a></h1>
			<!-- Uncomment below if you prefer to use an image logo -->
			<!-- <a href="index.html" class="logo me-auto"><img src="{{ asset('') }}assets/website/img/logo.png" alt="" class="img-fluid"></a>-->

			<nav id="navbar" class="navbar">
				<ul>
					<li><a class="nav-link scrollto {{ request()->is('/') ? 'active' : '' }}" href="/">Home</a></li>
					<li><a class="nav-link scrollto {{ request()->is('about') ? 'active' : '' }}" href="/about">About Us</a></li>
					<li><a class="nav-link scrollto {{ request()->is('services') ? 'active' : '' }}" href="/services">Services</a></li>
					<li><a class="nav-link scrollto {{ request()->is('news*') ? 'active' : '' }}" href="/news">News</a></li>
					<li class="dropdown"><a href="#" class="{{ request()->is('stuff') ? 'active' : '' }} {{ request()->is('board') ? 'active' : '' }} {{ request()->is('committee') ? 'active' : '' }}"><span>Team</span> <i class="bi bi-chevron-down"></i></a>
						<ul>
						<li><a href="/board">Board of Members</a></li>
						<li><a href="/committee">Committee Members</a></li>
						<li><a href="/stuff">Staff</a></li>
						</ul>
					</li>
					<li><a class="nav-link scrollto {{ request()->is('contact') ? 'active' : '' }}" href="/contact">Contact</a></li>
					<li><a class="nav-link scrollto {{ request()->is('gallery*') ? 'active' : '' }}" href="/gallery">Gallery</a></li>
					<li><a class="getstarted scrollto {{ request()->is('downloads') ? 'active' : '' }}" href="/downloads">Downloads</a></li>
				</ul>
				<i class="bi bi-list mobile-nav-toggle"></i>
			</nav><!-- .navbar -->

		</div>
	</header><!-- End Header -->

	@yield('content')

    <!-- ======= Footer ======= -->
	<footer id="footer">

		<div class="footer-top" style="background: #37517e; color: #fff">
		  <div class="container">
			<div class="row">

			  <div class="col-lg-3 col-md-6 footer-contact">
				<h3>TACCCU</h3>
				<p>
					{{ get_contact_subject('Street') }} <br>
					{{ get_contact_subject('Address') }}<br>
					{{ get_contact_subject('Town') }} - {{ get_contact_subject('Country') }} <br><br>
				  <strong>Phone:</strong> {{ get_contact_subject('Contact Number 1') }}, {{ get_contact_subject('Contact Number 2') }}<br>
				  <strong>Email:</strong> {{ get_contact_subject('Email') }}<br>
				</p>
			  </div>

			  <div class="col-lg-3 col-md-6 footer-links">
				<h4>Useful Links</h4>
				<ul>
				  <li><i class="bx bx-chevron-right"></i> <a href="/">Home</a></li>
				  <li><i class="bx bx-chevron-right"></i> <a href="/about">About us</a></li>
				  <li><i class="bx bx-chevron-right"></i> <a href="/gallery">Gallery</a></li>
				  <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
				  <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
				</ul>
			  </div>

			  <div class="col-lg-3 col-md-6 footer-links">
				<h4>Our Services</h4>
				<ul>
                    @forelse (get_services() as $service)
                        <li><i class="bx bx-chevron-right"></i> <a href="/services/#{{ $service['title'] }}">{{ $service['title'] }}</a></li>
                    @empty
                        <li><i class="bx bx-chevron-right"></i> <a href="#">No Service</a></li>
                    @endforelse
				</ul>
			  </div>

			  <div class="col-lg-3 col-md-6 footer-links">
				<h4>Our Social Networks</h4>
				<p>Our social media handles are always available, get in touch with us...</p>
				<div class="social-links mt-3">
				  <a href="{{ get_contact_subject('Twitter') }}" target="_blank" class="twitter"><i class="bx bxl-twitter"></i></a>
				  <a href="{{ get_contact_subject('Facebook') }}" target="_blank" class="facebook"><i class="bx bxl-facebook"></i></a>
				  <a href="{{ get_contact_subject('Instagram') }}" target="_blank" class="instagram"><i class="bx bxl-instagram"></i></a>
				  <a href="{{ get_contact_subject('Skipe') }}" target="_blank" class="google-plus"><i class="bx bxl-skype"></i></a>
				  <a href="{{ get_contact_subject('Linked In') }}" target="_blank" class="linkedin"><i class="bx bxl-linkedin"></i></a>
				  <a href="{{ get_contact_subject('Whatsapp') }}" target="_blank" class="whastapp"><i class="bx bxl-whatsapp"></i></a>
				</div>
			  </div>

			</div>
			<div class="row">
				<div class="col-12">
					<div class="copyright">
						&copy; Copyright <strong><span>TACCCU</span></strong>. All Rights Reserved
					  </div>
					  <div class="credits">
						<!-- All the links in the footer should remain intact. -->
						<!-- You can delete the links only if you purchased the pro version. -->
						<!-- Licensing information: https://bootstrapmade.com/license/ -->
						<!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
						Designed by <a href="#">Sammav IT Services</a>
					  </div>
				</div>
			</div>
		  </div>
		</div>
	  </footer><!-- End Footer -->

	  <div id="preloader"></div>
	  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

	  <!-- Vendor JS Files -->
	  <script src="{{ asset('assets/website/vendor/aos/aos.js') }}"></script>
	  <script src="{{ asset('assets/website/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	  <script src="{{ asset('assets/website/vendor/glightbox/js/glightbox.min.js') }}"></script>
	  <script src="{{ asset('assets/website/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
	  <script src="{{ asset('assets/website/vendor/swiper/swiper-bundle.min.js') }}"></script>
	  <script src="{{ asset('assets/website/vendor/waypoints/noframework.waypoints.js') }}"></script>
	  {{-- <script src="{{ asset('assets/website/vendor/php-email-form/validate.js') }}"></script> --}}

	  @stack('scripts')
	  <!-- Template Main JS File -->
	  <script src="{{ asset('assets/website/js/main.js') }}"></script>

</body>

</html>
