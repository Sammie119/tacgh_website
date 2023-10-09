@extends('layouts.website')

<style>
	.event-header {
		color: #37517e;
		margin-top: -10;
	}
</style>

@section('content')
   
    <!-- ====== Carousel ====== -->
    <section id="carousel" class="carousel section-bg">
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="4000">
                    <img src="{{ asset('assets/website/img/hero-img.png') }}" width="400px" height="600px" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="text-white" style="text-shadow: 1px 1px 2px #37517e, 0 0 1em #37517e, 0 0 0.2em #37517e;">Some representative placeholder content for the first slide.</h2>
                        <p class="text-white" style="text-shadow: 1px 1px 2px #37517e, 0 0 1em #37517e, 0 0 0.2em #37517e;">Some representative placeholder content for the second slide...</p>
                        <button class="btn btn-danger">Read More...</button>
                    </div>
                </div>
                <div class="carousel-item active" data-bs-interval="4000">
                    <img src="{{ asset('assets/website/img/hero-img.png') }}" width="400px" height="600px" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="text-white" style="text-shadow: 1px 1px 2px #37517e, 0 0 1em #37517e, 0 0 0.2em #37517e;">Some representative placeholder content for the first slide.</h2>
                        <p class="text-white" style="text-shadow: 1px 1px 2px #37517e, 0 0 1em #37517e, 0 0 0.2em #37517e;">Some representative placeholder content for the second slide...</p>
                        <button class="btn btn-danger">Read More...</button>
                    </div>
                </div>
                <div class="carousel-item active" data-bs-interval="4000">
                    <img src="{{ asset('assets/website/img/hero-img.png') }}" width="400px" height="600px" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="text-white" style="text-shadow: 1px 1px 2px #37517e, 0 0 1em #37517e, 0 0 0.2em #37517e;">Some representative placeholder content for the first slide.</h2>
                        <p class="text-white" style="text-shadow: 1px 1px 2px #37517e, 0 0 1em #37517e, 0 0 0.2em #37517e;">Some representative placeholder content for the second slide...</p>
                        <button class="btn btn-danger">Read More...</button>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div><!-- End Carousel -->
    </section>
	
	<main id="main">

		<!-- ======= News Section ======= -->
		<section id="about" class="about">
            <div class="container" data-aos="fade-up">
        
                <div class="section-title">
                    <h2>News</h2>
                </div>
        
                <div class="row content">
                    <div class="col-lg-6">
						<h3 class="event-header">Lorem Ipsum</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                            magna aliqua.
                        </p>
						<a href="#" class="btn-learn-more">Read More</a>
                    </div>

					<div class="col-lg-6">
						<h3 class="event-header">Lorem Ipsum</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                            magna aliqua.
                        </p>
						<a href="#" class="btn-learn-more">Read More</a>
                    </div>
                </div>
        
            </div>
		</section><!-- End News Section -->

		<!-- ======= About Us Section ======= -->
		<section id="about" class="about section-bg">
            <div class="container" data-aos="fade-up">
        
                <div class="section-title">
                    <h2>About Us</h2>
                </div>
        
                <div class="row content">
                    <div class="col-12 text-center">
                        <p>
                            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                            culpa qui officia deserunt mollit anim id est laborum.
                        </p>

						<a href="/about" class="btn-learn-more">Learn More</a>
                    </div>
                </div>
        
            </div>
		</section><!-- End About Us Section -->
	
		<!-- ======= Why Us Section ======= -->
		<section id="why-us" class="why-us">
		  <div class="container-fluid" data-aos="fade-up">
	
			<div class="row">
	
			  <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">
	
				<div class="content">
				  <h3><strong>velit pariatur architecto aut nihil</strong></h3>
				  <p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
				  </p>
				</div>
	
				<div class="accordion-list">
				  <ul>
					<li>
					  <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1"><span>01</span> Non consectetur a erat nam at lectus urna duis? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
					  <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
						<p>
						  Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
						</p>
					  </div>
					</li>
	
					<li>
					  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed"><span>02</span> Feugiat scelerisque varius morbi enim nunc? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
					  <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
						<p>
						  Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
						</p>
					  </div>
					</li>
	
					<li>
					  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed"><span>03</span> Dolor sit amet consectetur adipiscing elit? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
					  <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
						<p>
						  Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
						</p>
					  </div>
					</li>
	
				  </ul>
				</div>
	
			  </div>
	
			  <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style='background-image: url("{{ asset('assets/website/img/why-us.png') }}");' data-aos="zoom-in" data-aos-delay="150">&nbsp;</div>
			</div>
	
		  </div>
		</section><!-- End Why Us Section -->
	
		<!-- ======= Skills Section ======= -->
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
		</section><!-- End Skills Section -->
	
		{{-- <!-- ======= Cta Section ======= -->
		<section id="cta" class="cta">
		  <div class="container" data-aos="zoom-in">
	
			<div class="row">
			  <div class="col-lg-9 text-center text-lg-start">
				<h3>Call To Action</h3>
				<p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			  </div>
			  <div class="col-lg-3 cta-btn-container text-center">
				<a class="cta-btn align-middle" href="#">Call To Action</a>
			  </div>
			</div>
	
		  </div>
		</section><!-- End Cta Section --> --}}

		<!-- ======= Events Section ======= -->
		<section id="about" class="about">
            <div class="container" data-aos="fade-up">
        
                <div class="section-title">
                    <h2>Events</h2>
                </div>
        
                <div class="row content">
					@forelse (get_event(3) as $event)
						<div class="col-lg-4">
							<small class="text-muted">
								<ul class="list-inline">
									<li class="list-inline-item"><i class="bi bi-calendar"></i> {{ ($event['start_date'] == $event['end_date']) ? get_date_time_format($event['start_date']) : get_date_time_format($event['start_date'])." - ".get_date_time_format($event['end_date']) }}</li>
									<li class="list-inline-item"><i class="bi bi-clock"></i> {{ get_date_time_format($event['start_time'], 'time') }}</li> <br>
									<li class="list-inline-item mt-2"><i class="bi bi-geo-alt"></i> {{ $event['venue'] }}</li>
								</ul>
							</small>
							<h3 class="event-header">{{ $event['name'] }}</h3>
							<p>{{ $event['description'] }}</p>
						</div>
					@empty
						<div class="col-12">
							No Event
						</div>
					@endforelse

					{{-- <div class="col-lg-4">
						<small class="text-muted">
							<ul class="list-inline">
								<li class="list-inline-item"><i class="bi bi-calendar"></i> {{ date('Y-m-d') }} - {{ date('Y-m-d') }}</li>
								<li class="list-inline-item"><i class="bi bi-geo-alt"></i> Cafe</li>
							</ul>
						</small>
						<h3 class="event-header">Lorem Ipsum</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                            magna aliqua.
                        </p>
                    </div>

                    <div class="col-lg-4 pt-4 pt-lg-0">
						<small class="text-muted">
							<ul class="list-inline">
								<li class="list-inline-item"><i class="bi bi-calendar"></i> {{ date('Y-m-d') }} - {{ date('Y-m-d') }}</li>
								<li class="list-inline-item"><i class="bi bi-geo-alt"></i> Cafe</li>
							</ul>
						</small>
						<h3 class="event-header">Lorem Ipsum</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                            magna aliqua.
                        </p>
                    </div> --}}

					<div class="col-12 text-center mt-3">
						<a href="/calender" class="btn-learn-more">View Calender</a>
					</div>
                </div>

            </div>

		</section><!-- End Events Section -->
	
	</main><!-- End #main -->
@endsection