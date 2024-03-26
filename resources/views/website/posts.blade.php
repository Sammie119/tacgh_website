@extends('layouts.website')

@section('content')

    <main id="main" style="margin-top: 5.5rem;">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>News Room</h2>
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li>News Room</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs Section -->

        <section id="portfolio-details" class="portfolio-details">
            <div class="container">

              <div class="row gy-4">

                <div class="col-lg-8">
                    <div class="row">
                        @forelse (get_posts() as $post)
                        @php
                            $date = date_create($post['created_at']);
                        @endphp
                            <div class="col-lg-4 mb-2">
                                <div class="card" style="width: 100%;">
                                    <img src="{{ asset(get_posts_image($post['id'])) }}" class="card-img-top" alt="{{ get_posts_image($post['id']) }}">
                                    <div class="card-body">
                                      <h5 class="card-title">{{ $post['title'] }}</h5>
                                      <h6 style="color: #6a777d">Posted at: {{ date_format($date,"F j, Y") }}</h6>
                                      <p class="card-text">{{ $post['description'] }}</p>
                                      <a href="news/{{ $post['id'] }}" class="btn-learn-more mb-4">Read More...</a>
                                    </div>
                                  </div>
                                {{-- <h3 class="event-header"></h3>
                                <p></p>
                                <a href="news/{{ $post['id'] }}" class="btn-learn-more mb-4">Read More</a> --}}
                            </div>
                        @empty
                            <div>
                                No Post Found
                            </div>
                        @endforelse
                    </div>

                    <!-- ======= News Section ======= -->
                            {{-- @php $news = get_home_page("News"); @endphp

                            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                                <div class="swiper-wrapper">

                                    <div class="swiper-slide" style="position: relative;">
                                        <div class="testimonial-item">
                                            <img src="{{ asset('assets/website/img/testimonials/testimonials-1.jpg') }}" class="card-img-top img-fluid" alt="..." style="padding-left: 2px; padding-right: 2px;">
                                            <div class="testimonial-box" style="margin-top: -2rem; position: absolute; padding-bottom: 0px"><h4>March 17, 2024</h4></div>
                                            <div class="testimonial-box" style="padding-top: 0px">
                                                <h3>Sara Wilsson</h3>
                                                <small style="color: #999;">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                                                Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</small>
                                                <div class="text-left mt-3">
                                                    <a class="testimony-more" href="/messages">Continue reading...</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- End testimonial item -->

                                    <div class="swiper-slide" style="position: relative;">
                                        <div class="testimonial-item">
                                            <img src="{{ asset('assets/website/img/testimonials/testimonials-2.jpg') }}" class="card-img-top img-fluid" alt="..." style="padding-left: 2px; padding-right: 2px;">
                                            <div class="testimonial-box" style="margin-top: -2rem; position: absolute; padding-bottom: 0px"><h4>March 17, 2024</h4></div>
                                            <div class="testimonial-box" style="padding-top: 0px">
                                                <h3>Sara Wilsson</h3>
                                                <small style="color: #999;">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                                                Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</small>
                                                <div class="text-left mt-3">
                                                    <a class="testimony-more" href="/messages">Continue reading...</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- End testimonial item -->

                                    <div class="swiper-slide" style="position: relative;">
                                        <div class="testimonial-item">
                                            <img src="{{ asset('assets/website/img/testimonials/testimonials-3.jpg') }}" class="card-img-top img-fluid" alt="..." style="padding-left: 2px; padding-right: 2px;">
                                            <div class="testimonial-box" style="margin-top: -2rem; position: absolute; padding-bottom: 0px"><h4>March 17, 2024</h4></div>
                                            <div class="testimonial-box" style="padding-top: 0px">
                                                <h3>Sara Wilsson</h3>
                                                <small style="color: #999;">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                                                Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</small>
                                                <div class="text-left mt-3">
                                                    <a class="testimony-more" href="/messages">Continue reading...</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- End testimonial item -->

                                    <div class="swiper-slide" style="position: relative;">
                                        <div class="testimonial-item">
                                            <img src="{{ asset('assets/website/img/testimonials/testimonials-4.jpg') }}" class="card-img-top img-fluid" alt="..." style="padding-left: 2px; padding-right: 2px;">
                                            <div class="testimonial-box" style="margin-top: -2rem; position: absolute; padding-bottom: 0px"><h4>March 17, 2024</h4></div>
                                            <div class="testimonial-box" style="padding-top: 0px">
                                                <h3>Sara Wilsson</h3>
                                                <small style="color: #999;">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                                                Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</small>
                                                <div class="text-left mt-3">
                                                    <a class="testimony-more" href="/messages">Continue reading...</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- End testimonial item -->

                                    <div class="swiper-slide" style="position: relative;">
                                        <div class="testimonial-item">
                                            <img src="{{ asset('assets/website/img/testimonials/testimonials-5.jpg') }}" class="card-img-top img-fluid" alt="..." style="padding-left: 2px; padding-right: 2px;">
                                            <div class="testimonial-box" style="margin-top: -2rem; position: absolute; padding-bottom: 0px"><h4>March 17, 2024</h4></div>
                                            <div class="testimonial-box" style="padding-top: 0px">
                                                <h3>Sara Wilsson</h3>
                                                <small style="color: #999;">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                                                Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</small>
                                                <div class="text-left mt-3">
                                                    <a class="testimony-more" href="/messages">Continue reading...</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- End testimonial item -->

                                </div>

                                <div class="swiper-pagination"></div>
                            </div> --}}
                </div>

                <div class="col-lg-4">
                    @include('components.devotions')
                </div>

              </div>

            </div>
        </section>

    </main><!-- End #main -->

@endsection


