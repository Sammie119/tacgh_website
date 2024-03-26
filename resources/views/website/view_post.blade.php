@extends('layouts.website')

@section('content')

    <main id="main" style="margin-top: 5.5rem;">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">
                @php
                    $urlParts = parse_url(url()->previous());
                    $host = explode('/',$urlParts['path']);
                @endphp
                <div class="d-flex justify-content-between align-items-center">
                    <h2>{{ $post->title }}</h2>
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li><a href="{{ url()->previous() }}">{{ ucfirst(end($host)) }}</a></li>
                        <li>{{ $post->title }}</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs Section -->

        <section id="portfolio-details" class="portfolio-details">
            <div class="container">

              <div class="row gy-4">

                <div class="col-lg-8">
                    @if(count(get_posts_image($post->id, 'all')) != 0)
                        <div class="portfolio-details-slider swiper">
                            <div class="swiper-wrapper align-items-center">
                                @foreach (get_posts_image($post->id, 'all') as $image)
                                    <div class="swiper-slide">
                                        <img src="{{ asset($image->path) }}" alt="image">
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    @endif

                    {!! $post->body !!}

                </div>

                <div class="col-lg-4">
                    @include('components.devotions')
                </div>

              </div>

            </div>
        </section>

    </main><!-- End #main -->

@endsection


{{-- <div class="col-lg-8">
    <div class="portfolio-details-slider swiper">
      <div class="swiper-wrapper align-items-center">

        <div class="swiper-slide">
          <img src="assets/img/portfolio/portfolio-1.jpg" alt="">
        </div>

        <div class="swiper-slide">
          <img src="assets/img/portfolio/portfolio-2.jpg" alt="">
        </div>

        <div class="swiper-slide">
          <img src="assets/img/portfolio/portfolio-3.jpg" alt="">
        </div>

      </div>
      <div class="swiper-pagination"></div>
    </div>
</div> --}}
