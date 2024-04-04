<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>The Apostolic Church-Ghana</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/sys_img/favicon.ico') }}" rel="icon">
    {{-- <link href="{{ asset('assets/img/apple-touch-icon.png" rel="apple-touch-icon') }}"> --}}

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/website/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/website/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/website/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/website/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/website/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/website/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    @stack('styles')

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/website/css/calander_style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/website/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/website/css/main.css') }}" rel="stylesheet">

    <!-- =======================================================
    * Template Name: Squadfree
    * Updated: Sep 18 2023 with Bootstrap v5.3.2
    * Template URL: https://bootstrapmade.com/squadfree-free-bootstrap-template-creative/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>
	<!-- ======= Header ======= -->
    <header id="header" class="fixed-top header-transparent" style="background-color: #000060;">
        <div class="container d-flex align-items-center justify-content-between position-relative">

            <div class="logo">
                {{-- <h1 class="text-light"><a href="index.html"><span>TAC-GH</span></a></h1> --}}
                <!-- Uncomment below if you prefer to use an image logo -->
                <a href="/"><img src="{{ asset(get_asset('Logo')) }}" alt="Logo" class="img-fluid"></a>
            </div>

            <nav id="navbar" class="navbar" style="text-transform: uppercase;">
                <ul>
                    <li><a class="nav-link scrollto {{ request()->is('/') ? 'active' : '' }}" href="/">Home</a></li>
                    <li class="dropdown"><a class="a_dropdown {{ request()->is('about*') ? 'active' : '' }}" href="#"><span>About us</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="/about/mission_vision">Mission, Vision &#038; Core Values</a></li>
                            <li><a href="/about/brief_history">Brief History</a></li>
                            <li><a href="/about/rules_belief">Rules of Belief</a></li>
                            <li><a href="/about/rules_conduct">Rules of Conduct</a></li>
                            <li><a href="/about/tenets">Tenets</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="a_dropdown {{ request()->is('leadership*') ? 'active' : '' }}" href="#"><span>Leadership</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="/leadership/general_council">General Council</a></li>
                            <li><a href="/leadership/executives">Executives</a></li>
                            <li><a href="/leadership/council_apostles_prophets">Council of Apostles and Prophets</a></li>
                            <li><a href="/leadership/management_team">Management Team</a></li>
                            <li><a href="/leadership/former_leaders">Former Leaders</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="a_dropdown {{ request()->is('directorate*') ? 'active' : '' }}" href="#"><span>Directorates</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="/directorate/imed">IMED</a></li>
                            <li><a href="/directorate/imd">IMD</a></li>
                            <li><a href="/directorate/administration">Administration</a></li>
                            <li><a href="/directorate/mmfag">MMFAG</a></li>
                            <li><a href="/directorate/accounting_finance">Accounting &#038; Finance</a></li>
                            <li><a href="/directorate/audit">Audit</a></li>
                            <li class="dropdown"><a href="#"><span>Social Services</span> <i class="bi bi-chevron-right"></i></a>
                                <ul>
                                  <li><a href="/directorate/social_services/tactv">TAC Press</a></li>
                                  <li><a href="/directorate/social_services/tacpress">TACtv</a></li>
                                  <li><a href="/directorate/social_services/acts">ACTS</a></li>
                                  <li><a href="/directorate/social_services/agro">Agro</a></li>
                                  <li><a href="/directorate/social_services/siloam_hospitals">Siloam Hospitals</a></li>
                                  <li><a href="/directorate/social_services/facility">Facilities</a></li>
                                </ul>
                              </li>
                            {{-- <li><a href="#">Social Services</a></li> --}}
                        </ul>
                    </li>
                    <li class="dropdown"><a class="a_dropdown {{ request()->is('media*') ? 'active' : '' }}" href="#"><span>Media</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="/media/news">News Room</a></li>
                            <li><a href="/media/gallery">Photo Gallery</a></li>
                            <li><a href="/media/messages/videos">Videos</a></li>
                            <li><a href="/media/downloads/apostolic_herald">The Apostolic Herald</a></li>
                            <li><a href="/media/messages/sermons">Sermons</a></li>
                            <li><a href="/media/downloads/riches_of_grace">Riches of Grace</a></li>
                            <li><a href="/media/downloads/other_documents">Downloads</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link scrollto {{ request()->is('contact') ? 'active' : '' }}" href="/contact">Contact</a></li>
                    <li><a class="nav-link scrollto {{ request()->is('prayer_request') ? 'active' : '' }}" href="/prayer_request">Prayer Request</a></li>
                    {{-- <li><a class="nav-link scrollto social_media" href="#"><i class="bx bxl-twitter"></i></a></li>
                    <li><a class="nav-link scrollto social_media" href="#"><i class="bx bxl-facebook"></i></a></li>
                    <li><a class="nav-link scrollto social_media" href="#"><i class="bx bxl-instagram"></i></a></li>
                    <li><a class="nav-link scrollto social_media" href="#"><i class="bx bxl-skype"></i></a></li>
                    <li><a class="nav-link scrollto social_media" href="#"><i class="bx bxl-linkedin"></i></a></li> --}}
                </ul>
                <div class="navbar">

                </div>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

	@yield('content')

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-6">
                        <div class="footer-info">
                            <h3>The Apostolic Church-Ghana</h3>
                            <p class="pb-3"><em>General Headquarters</em></p>
                            <p>
                                {{ get_contact_subject('Street') }} <br>
                                {{ get_contact_subject('Address') }}, {{ get_contact_subject('Town') }}<br><br>
                                <strong>Phone:</strong> {{ get_contact_subject('Contact Number 1') }}, {{ get_contact_subject('Contact Number 2')}}<br>
                                <strong>Email:</strong> {{ get_contact_subject('Email') }}<br>
                            </p>
                            <div class="social-links mt-3">
                                <a href="{{ get_contact_subject('Twitter') }}" class="twitter" target="_blank"><i class="bx bxl-twitter"></i></a>
                                <a href="{{ get_contact_subject('Facebook') }}" class="facebook" target="_blank"><i class="bx bxl-facebook"></i></a>
                                <a href="{{ get_contact_subject('Instagram') }}" class="instagram" target="_blank"><i class="bx bxl-instagram"></i></a>
                                <a href="{{ get_contact_subject('Whatsapp') }}" class="google-plus" target="_blank"><i class="bx bxl-whatsapp"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="/about/mission_vision">Mission & Vision</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="/about/tenets">Tenets</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="/about/rules_conduct">Rules of Conduct</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="/about/rules_belief">Rules of Belief</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="/about/brief_history">Brief History</a></li>

                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Our Social Services</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="/directorate/social_services/siloam_hospitals">Siloam Hospitals</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="/directorate/social_services/tactv">TAC Press</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="/directorate/social_services/agro">Agro</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="/directorate/social_services/tactv">TACtv</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="/directorate/social_services/facility">TACRCRC - Fafraha</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-newsletter">

                        <section class="ftco-section" style="margin-top: -27%; padding-top: 0px; padding-bottom: 0px;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="calendar calendar-first" id="calendar_first">
                                        <div class="calendar_header">
                                            <button class="switch-month switch-left"> <i class="fa fa-chevron-left"></i></button>
                                             <h2></h2>
                                            <button class="switch-month switch-right"> <i class="fa fa-chevron-right"></i></button>
                                        </div>
                                        <div class="calendar_weekdays"></div>
                                        <div class="calendar_content"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                Copyright &copy; {{ date('Y') }} <strong><span>The Apostolic Church-Ghana</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/squadfree-free-bootstrap-template-creative/ -->
                <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/website/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets/website/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/website/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/website/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/website/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/website/vendor/swiper/swiper-bundle.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/website/vendor/php-email-form/validate.js') }}"></script> --}}

    <script src="{{ asset('assets/website/js/jquery.min.js') }}"></script>
    <!-- Template Main JS File -->
    <script src="{{ asset('assets/website/js/calander_main.js') }}"></script>
    <script src="{{ asset('assets/website/js/main.js') }}"></script>
    @stack('scripts')

</body>

</html>
