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
      {{-- <!-- ======= Services Section ======= -->
      <div class="album py-5 bg-body-tertiary">
        <div class="container">
    
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 g-3">
          
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
      </div> --}}

      <!-- ======= Why Us Section ======= -->
		<section id="why-us" class="why-us">
		  <div class="container-fluid mb-1 mt-1" data-aos="fade-up" style="margin-top: -4%; margin-bottom: -5%">
	
        <div class="row" style="width: 70%; margin-left: 15%">
    
          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">
    
            <div class="content">
              <h3><strong>velit pariatur architecto aut nihil</strong></h3>
              <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
              </p>
            </div>
      
            <div class="accordion-list"></div>
    
          </div>
    
          <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style='background-image: url("{{ asset('assets/website/img/why-us.png') }}");' data-aos="zoom-in" data-aos-delay="150">&nbsp;</div>
        </div>
	
		  </div>
		</section><!-- End Why Us Section -->

    <section id="why-us" class="why-us section-bg">
		  <div class="container-fluid mb-1 mt-1" data-aos="fade-up" style="margin-top: -4%; margin-bottom: -5%">
	
        <div class="row" style="width: 70%; margin-left: 15%">
    
          <div class="col-lg-5 align-items-stretch order-2 order-lg-1 img" style='background-image: url("{{ asset('assets/website/img/why-us.png') }}");' data-aos="zoom-in" data-aos-delay="150">&nbsp;</div>
          
          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-1 order-lg-2">
    
            <div class="content">
              <h3><strong>velit pariatur architecto aut nihil</strong></h3>
              <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
              </p>
            </div>
      
            <div class="accordion-list"></div>
    
          </div>
  
        </div>
	
		  </div>
		</section><!-- End Why Us Section -->
	
		{{-- <!-- ======= Skills Section ======= -->
		<section id="skills" class="skills section-bg">
		  <div class="container" data-aos="fade-up">
	
			<div class="row">
			  <div class="col-lg-6 d-flex align-items-center" data-aos="fade-right" data-aos-delay="100">
				<img src="{{ asset('assets/website/img/skills.png') }}" class="img-fluid" alt="">
			  </div>
			  <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left" data-aos-delay="100">
				<h3>Voluptatem dignissimos provident quasi corporis voluptates</h3>
				<p class="fst-italic">
				  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
				  magna aliqua.
				</p>
	
				<div class="skills-content">
	
				  <div class="progress">
					<span class="skill">HTML <i class="val">100%</i></span>
					<div class="progress-bar-wrap">
					  <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
				  </div>
	
				  <div class="progress">
					<span class="skill">CSS <i class="val">90%</i></span>
					<div class="progress-bar-wrap">
					  <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
				  </div>
	
				  <div class="progress">
					<span class="skill">JavaScript <i class="val">75%</i></span>
					<div class="progress-bar-wrap">
					  <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
				  </div>
	
				  <div class="progress">
					<span class="skill">Photoshop <i class="val">55%</i></span>
					<div class="progress-bar-wrap">
					  <div class="progress-bar" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
				  </div>
	
				</div>
	
			  </div>
			</div>
	
		  </div>
		</section><!-- End Skills Section --> --}}
    </main>
    
@endsection