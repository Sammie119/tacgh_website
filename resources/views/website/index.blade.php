@extends('layouts.website')

@section('content')

    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">

                @forelse (get_carousel() as $key => $carousel)
                    <div class="carousel-item @if ($key === 0) active @endif">
                        <img src="{{ asset(get_asset_path($carousel['asset_id'])) }}" class="d-block img-fluid" alt="{{ $carousel['name'] }}">
                        <div class="hero-container" data-aos="fade-up">
                            <h1>{{ $carousel['name'] }}</h1>
                            <h2>{{ $carousel['description'] }}</h2>
                            <a href="/media/news/{{ $carousel['post_id'] }}" class="btn-get-started scrollto"><i class="bx bx-chevrons-down"></i></a>
                        </div>
                    </div>
                @empty
                    <div class="carousel-item active">
                        <img src="{{ asset('assets/website/img/hero-bg.jpg')}}" class="d-block img-fluid" alt="image">
                        <div class="hero-container" data-aos="fade-up">
                            <h1>No Carousel</h1>
                            <h2>You have not set any Carousel</h2>
                            <a href="#" class="btn-get-started scrollto"><i class="bx bx-chevrons-down"></i></a>
                        </div>
                    </div>
                @endforelse

            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#hero-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#hero-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section><!-- End Hero -->

   <!-- ======= Values Section ======= -->
    <section id="motto" class="services">
        <div class="container" style="margin-top: -20px; width: 80%;">
            @php $value_1 = get_home_page("Vision"); @endphp
            @php $value_2 = get_home_page("Mission"); @endphp
            @php $value_3 = get_home_page("Theme"); @endphp
            <div class="row">
                <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-4 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" style="background-color: #000060; color: #fff;">
                        {{-- <div class="icon"><i class="bx bxl-dribbble" style="color: #fff;"></i></div> --}}
                        <h4 class="title" style="color: #fff; font-size: 1.5rem">{{ $value_1['title'] }}</h4>
                        <p class="description">{!! $value_1['description'] !!}</p>
                        {{-- <a class="btn btn-outline-light mt-4" href="#">Read more ...</a> --}}
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-4 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        {{-- <div class="icon"><i class="bx bx-file"></i></div> --}}
                        <h4 class="title" style="font-size: 1.5rem">{{ $value_2['title'] }}</h4>
                        <p class="description">{!! $value_2['description'] !!}</p>
                        {{-- <a class="btn btn-outline-primary mt-4 box-buttom-two" href="#">Read more ...</a> --}}
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-4 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" style="background-color: #d95701; color: #fff;">
                        {{-- <div class="icon"><i class="bx bxl-dribbble" style="color: #fff;"></i></div> --}}
                        <h4 class="title" style="font-size: 1.5rem">{{ $value_3['title'] }}</h4>
                        <p class="description">{!! $value_3['description'] !!}</p>
                        {{-- <a class="btn btn-outline-light mt-4" href="#">Read more ...</a> --}}
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Values Section -->

    <main id="main">

        <!-- ======= Fasting Section ======= -->
        @php
            $motto = get_home_page("Fasting");
            $fasting = $devotion = get_devotion('21 Days Fasting');
            $date = date_create(date('Y-m-d'));
        @endphp
        @isset($fasting['title'])
            <section id="services" class="services">
                <div class="container">
                    <div class="section-title" data-aos="fade-in" data-aos-delay="100">
                        <h2>{{ $motto['title'] }}</h2>
                        <h6 style="color: #6a777d">{{ date_format($date,"F j, Y") }}</h6>
                        <p>{!! $motto['description'] !!}</p>
                    </div>
                    <div class="section-title" data-aos="fade-in" data-aos-delay="100">

                        <h4>{{ $devotion['title'] }}</h4>
                        <p>
                            {!! $devotion['body'] !!}
                        </p>

                    </div>
                </div>
            </section>
        @endisset
        <!-- End Fasting Section -->

        <!-- ======= Event Section ======= -->
        <section id="services" class="services section-bg">
            <div class="container">
                @php $event = get_home_page("Event"); @endphp
                <div class="section-title" data-aos="fade-in" data-aos-delay="100">
                    <h2>{{ $event['title'] }}</h2>
                    <p>{!! $event['description'] !!}</p>
                </div>

                <div class="row">
                    @forelse (get_event(3) as $event)
						<div class="col-md-6 col-lg-4">
                            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                                <small class="text-muted">
                                    <ul class="list-inline">
                                        <li class="list-inline-item"><i class="bi bi-calendar"></i> {{ ($event['start_date'] == $event['end_date']) ? get_date_time_format($event['start_date']) : get_date_time_format($event['start_date'])." - ".get_date_time_format($event['end_date']) }}</li>
                                        <li class="list-inline-item"><i class="bi bi-clock"></i> {{ get_date_time_format($event['start_time'], 'time') }}</li> <br>
                                        <li class="list-inline-item mt-2"><i class="bi bi-geo-alt"></i> {{ $event['venue'] }}</li>
                                    </ul>
                                </small>
                                <h3 class="title">{{ $event['name'] }}</h3>
                                <p>{{ $event['description'] }}</p>
                            </div>
						</div>
					@empty
                        <div class="col-md-6 col-lg-4 ">
                            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                                <small class="text-muted">
                                    <ul class="list-inline">
                                        <li class="list-inline-item"><i class="bi bi-calendar"></i> No Date</li>
                                        <li class="list-inline-item"><i class="bi bi-clock"></i> No Time</li> <br>
                                        <li class="list-inline-item mt-2"><i class="bi bi-geo-alt"></i> No Venue</li>
                                    </ul>
                                </small>
                                <h3 class="title">No Event</h3>
                                <p>Kind enter an Event</p>
                            </div>

                        </div>
					@endforelse

                    <div class="col-12 text-center mt-3" data-aos="fade-up" data-aos-delay="300">
                        <a href="/event/calender" class="more_arrows"><i class="bx bx-chevrons-down"></i></a>
					</div>

                </div>

            </div>
        </section><!-- End Event Section -->

        <!-- ======= News Section ======= -->
        <section id="testimonials" class="testimonials">
            <div class="container">
                @php $news = get_home_page("News"); @endphp
                <div class="section-title" data-aos="fade-in" data-aos-delay="100">
                    <h2>{{ $news['title'] }}</h2>
                    {{-- <p>{!! $news['description'] !!}</p> --}}
                </div>

                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">
                        @forelse (get_posts() as $post)
                            @php
                                $date = date_create($post['created_at']);
                            @endphp
                            @if(get_posts_image($post['id']) != 'No Image')
                                <div class="swiper-slide" style="position: relative;">
                                    <div class="testimonial-item">
                                        <img src="{{ asset(get_posts_image($post['id'])) }}" class="card-img-top img-fluid" alt="{{ $post['title'] }}" style="padding-left: 2px; padding-right: 2px;">
                                        <div class="testimonial-box" style="margin-top: -2rem; position: absolute; padding-bottom: 0px"><h4>{{ date_format($date,"F j, Y") }}</h4></div>
                                        <div class="testimonial-box" style="padding-top: 0px">
                                            <h3>{{ $post['title'] }}</h3>
                                            <small style="color: #999;">{{ $post['description'] }}</small>
                                            <div class="text-left mt-3">
                                                <a class="testimony-more" href="/media/news/{{ $post['id'] }}">Continue reading...</a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End testimonial item -->
                            @endif
                        @empty
                            <div>
                                No Post Found
                            </div>
                        @endforelse

                    </div>

                    <div class="swiper-pagination"></div>
                </div>

                <div class="text-center mt-3" data-aos="fade-up" data-aos-delay="300">
                    <a href="/media/news" class="more_arrows"><i class="bx bx-chevrons-down"></i></a>
                </div>

            </div>
        </section><!-- End News Section -->

        <!-- ======= Advertisment Section ======= -->
        @php $advert = get_home_page("Advertisment"); @endphp
        <section id="cta" class="cta" style="background: linear-gradient(rgba(103, 176, 209, 0.8), rgba(103, 176, 209, 0.8)), url('{{ asset(get_asset_path($advert['asset_id'])) }}') fixed center center;">
            <div class="container" data-aos="zoom-in">
                <div class="text-center">
                    <h3>{{ $advert['title'] }}</h3>
                    <p> {!! $advert['description'] !!}</p>
                    {{-- <a class="cta-btn" href="#">Services</a> --}}
                </div>

                {{-- <div class="text-center mt-3" data-aos="fade-up" data-aos-delay="300">
                    <a href="/services" class="more_arrows" style="color: #fff; border: 2px solid #fff"><i class="bx bx-chevrons-down"></i></a>
                </div> --}}

            </div>
        </section><!-- End Advertisment Section -->

        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials section-bg">
            <div class="container">
                @php $testimony = get_home_page("Testimony"); @endphp
                <div class="section-title" data-aos="fade-in" data-aos-delay="100">
                    <h2>{{ $testimony['title'] }}</h2>
                    <!-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> -->
                </div>

                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">

                        @forelse (get_testimonies() as $testimony)
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <p>
                                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                        {{ $testimony['message'] }}
                                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                    </p>
                                    <h3>{{ $testimony['name'] }}</h3>
                                    <h4>Member</h4>
                                </div>
                            </div><!-- End testimonial item -->
                        @empty
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <p>
                                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                            No Testimony is Entered
                                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                    </p>
                                    <h3>No Name</h3>
                                    <h4>Nne</h4>
                                </div>
                            </div><!-- End testimonial item -->
                        @endforelse

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section><!-- End Testimonials Section -->

        <!-- ======= Leadership Section ======= -->
        <section id="team" class="team">
            <div class="container">
                @php $leadership = get_home_page("Leadership"); @endphp
                <div class="section-title" data-aos="fade-in" data-aos-delay="100">
                    <h2>{{ $leadership['title'] }}</h2>
                    {{-- <p>{!! $leadership['description'] !!}</p> --}}
                </div>

                <div class="row">
                    @php
                        $president = get_leadership('President');
                        $vice = get_leadership('Vice President');
                        $gs = get_leadership('General Secretary');
                    @endphp
                    {{-- {{ dd($president) }} --}}
                    <div class="col-lg-4 col-md-6">
                        <div class="member" data-aos="fade-up">
                            <div class="pic"><img src="{{ asset(get_asset_path($president['asset_id'])) }}" class="img-fluid" alt=""></div>
                            <div class="member-info">
                                <h4>{{ $president['name'] }}</h4>
                                <span>{{ $president['position'] }}</span>
                                <div class="social">
                                    <a href="{{ $president['whatsapp_address'] }}"><i class="bi bi-whatsapp"></i></a>
                                    <a href="{{ $president['twitter_address'] }}"><i class="bi bi-twitter"></i></a>
                                    <a href="{{ $president['facebook_address'] }}"><i class="bi bi-facebook"></i></a>
                                    <a href="{{ $president['instagram_address'] }}"><i class="bi bi-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="member" data-aos="fade-up" data-aos-delay="150">
                            <div class="pic"><img src="{{ asset(get_asset_path($vice['asset_id'])) }}" class="img-fluid" alt=""></div>
                            <div class="member-info">
                                <h4>{{ $vice['name'] }}</h4>
                                <span>{{ $vice['position'] }}</span>
                                <div class="social">
                                    <a href="{{ $vice['whatsapp_address'] }}"><i class="bi bi-whatsapp"></i></a>
                                    <a href="{{ $vice['twitter_address'] }}"><i class="bi bi-twitter"></i></a>
                                    <a href="{{ $vice['facebook_address'] }}"><i class="bi bi-facebook"></i></a>
                                    <a href="{{ $vice['instagram_address'] }}"><i class="bi bi-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="member" data-aos="fade-up" data-aos-delay="300">
                            <div class="pic"><img src="{{ asset(get_asset_path($gs['asset_id'])) }}" class="img-fluid" alt=""></div>
                            <div class="member-info">
                                <h4>{{ $gs['name'] }}</h4>
                                <span>{{ $gs['position'] }}</span>
                                <div class="social">
                                    <a href="{{ $gs['whatsapp_address'] }}"><i class="bi bi-whatsapp"></i></a>
                                    <a href="{{ $gs['twitter_address'] }}"><i class="bi bi-twitter"></i></a>
                                    <a href="{{ $gs['facebook_address'] }}"><i class="bi bi-facebook"></i></a>
                                    <a href="{{ $gs['instagram_address'] }}"><i class="bi bi-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Leadership Section -->

    </main><!-- End #main -->

@endsection
