@extends('layouts.website')

@section('content')

    <!-- ======= Hero Section ======= -->
    <section id="cta" class="cta main-hero" style="background: no-repeat linear-gradient(rgba(40, 58, 90, 0.9), rgba(40, 58, 90, 0.9)), url({{ asset(get_asset('Hero Image')) }}) center center">
        <div class="container" data-aos="zoom-in">

        <div class="row">
            <div class="col-lg-12 text-center text-lg-start">
                <h1 class="text-center text-white text-bold">Services</h1>
                {{-- <p class="text-center"> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> --}}
            </div>
        </div>

        </div>
    </section>

    <main id="main">
        <!-- ======= Services Section ======= -->
		{{-- <section id="services" class="services">
            <div class="container" data-aos="fade-up">
      
              <div class="row">
                <div class="col-xl-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                  <div class="icon-box">
                    <img src="{{ asset('assets/sys_img/tacccu_logo_white.jpg') }}" alt="" width="100%" height="200">
                    <h4><a href="">Lorem Ipsum</a></h4>
                    <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
                  </div>
                </div>
      
                <div class="col-xl-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
                  <div class="icon-box">
                    <div class="icon"><i class="bx bx-file"></i></div>
                    <h4><a href="">Sed ut perspici</a></h4>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
                  </div>
                </div>
      
                <div class="col-xl-4 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="300">
                  <div class="icon-box">
                    <div class="icon"><i class="bx bx-tachometer"></i></div>
                    <h4><a href="">Magni Dolores</a></h4>
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
                  </div>
                </div>
      
              </div>
      
            </div>
    </section><!-- End Services Section --> --}}
    <div class="album py-5 bg-body-tertiary">
      <div class="container">
  
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
         
          <div class="col">
            <div class="icon-box shadow-sm">
              <img style="padding: 20px" src="{{ asset('assets/sys_img/tacccu_logo_white.jpg') }}" alt="" width="100%">
              <h4 style="padding-left: 20px; padding-right: 20px;"><a href="">Magni Dolores</a></h4>
              <div class="card-body">
                <p class="card-text" style="padding-left: 20px; padding-right: 20px;">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <div class="d-flex justify-content-between align-items-center">
                </div>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="icon-box shadow-sm">
              <img style="padding: 20px" src="{{ asset('assets/sys_img/tacccu_logo_white.jpg') }}" alt="" width="100%">
              <h4 style="padding-left: 20px; padding-right: 20px;"><a href="">Magni Dolores</a></h4>
              <div class="card-body">
                <p class="card-text" style="padding-left: 20px; padding-right: 20px;">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <div class="d-flex justify-content-between align-items-center">
                </div>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="icon-box shadow-sm">
              <img style="padding: 20px" src="{{ asset('assets/sys_img/tacccu_logo_white.jpg') }}" alt="" width="100%">
              <h4 style="padding-left: 20px; padding-right: 20px;"><a href="">Magni Dolores</a></h4>
              <div class="card-body">
                <p class="card-text" style="padding-left: 20px; padding-right: 20px;">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <div class="d-flex justify-content-between align-items-center">
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    </main>
    
@endsection