@extends('layouts.website')

<style>
	.event-header {
		color: #37517e;
		margin-top: -10;
	}
</style>

@section('content')

    <!-- ====== Carousel ====== -->
    <section id="carousel" class="carousel" style="margin-bottom: -4%">
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                @foreach (get_carousel() as $key => $carousel)
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="{{ $key }}" @if ($key == 0) class="active" aria-current="true" @endif aria-label="Slide {{ $key+1 }}"></button>
                @endforeach
            </div>
            <div class="carousel-inner">

                @foreach (get_carousel() as $key => $carousel)
                    <div class="carousel-item @if($key == 0) active @endif" data-bs-interval="4000">
                        <img src="{{ asset(get_asset_path($carousel['asset_id'])) }}" class="d-block w-100": auto" alt="{{ $carousel['name'] }}">
                        <div class="carousel-caption d-none d-md-block">
                            <h2 class="text-white" style="text-shadow: 1px 1px 2px #37517e, 0 0 1em #37517e, 0 0 0.2em #37517e;">{{ $carousel['name'] }}</h2>
                            <p class="text-white" style="text-shadow: 1px 1px 2px #37517e, 0 0 1em #37517e, 0 0 0.2em #37517e;">{{ $carousel['description'] }}</p>
                            <button onclick="window.location.href='/news/{{ $carousel['post_id'] }}';" class="btn btn-danger">Read More...</button>
                        </div>
                    </div>
                @endforeach

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
		<section id="about" class="about section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>News</h2>
                </div>

                <div class="row content">
                    @forelse (get_posts(2) as $post)
                        <div class="col-lg-6 mt-4">
                            <h3 class="event-header">{{ $post['title'] }}</h3>
                            <p>{{ $post['description'] }}</p>
                            <a href="news/{{ $post['id'] }}" class="btn-learn-more">Read More</a>
                        </div>
                    @empty
                        <div>
                            No Post Found
                        </div>
                    @endforelse

                </div>

            </div>
		</section><!-- End News Section -->

		<!-- ======= About Us Section ======= -->
		<section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>About Us</h2>
                </div>

                <div class="row content">
                    <div class="col-12 text-center">
                        {!! get_about('Home Page') !!}
						<a href="/about" class="btn-learn-more">Learn More</a>
                    </div>
                </div>

            </div>
		</section><!-- End About Us Section -->

		<!-- ======= Why Us Section ======= -->
		<section id="why-us" class="why-us section-bg">
            @php $why = get_home_page("Why TACCCU"); @endphp
		  <div class="container-fluid" data-aos="fade-up" style="margin-top: -4%; margin-bottom: -5%">

			<div class="row" style="height: 500px">

			  <div class="col-lg-6 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

				<div class="content text-center">
				  <h3><strong>{{ $why['title'] }}</strong></h3>
				  {!! $why['description'] !!}
				</div>
			  </div>

			  <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style='background-image: url("{{ asset(get_asset_path($why['asset_id'])) }}");' data-aos="zoom-in" data-aos-delay="150">&nbsp;</div>
			</div>

		  </div>
		</section><!-- End Why Us Section -->

        <!-- ======= Skills Section ======= -->
		<section id="why-us" class="why-us">
            @php $skill = get_home_page("Skills"); @endphp
            <div class="container-fluid" data-aos="fade-up" style="margin-top: -4%; margin-bottom: -5%">

              <div class="row" style="height: 500px; margin-left: 5%">
                <div class="col-lg-5 align-items-stretch order-2 order-lg-1 img" style='background-image: url("{{ asset(get_asset_path($skill['asset_id'])) }}");' data-aos="zoom-in" data-aos-delay="150">&nbsp;</div>

                <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-1 order-lg-2">

                  <div class="content text-center">
                    <h3><strong>{{ $skill['title'] }}</strong></h3>
                    {!! $skill['description'] !!}
                  </div>
                </div>
              </div>

            </div>
        </section><!-- End Skills Section -->

		<!-- ======= Events Section ======= -->
		<section id="about" class="about section-bg">
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

					<div class="col-12 text-center mt-3">
						<a href="/calender" class="btn-learn-more">View Calender</a>
					</div>
                </div>

            </div>

		</section><!-- End Events Section -->

	</main><!-- End #main -->
@endsection
