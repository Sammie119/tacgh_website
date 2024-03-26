@extends('layouts.website')

@section('content')

    <main id="main" style="margin-top: 5.5rem;">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>{{ $gallery->last()->name }}</h2>
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li><a href="{{ url()->previous() }}">Gallery</a></li>
                        <li>{{ $gallery->last()->name }}</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs Section -->

        <section id="portfolio-details" class="portfolio-details">
            <div class="container">

              <div class="row gy-4">

                    <!-- ======= Portfolio Section ======= -->
                    <section id="portfolio" class="portfolio">
                        <div class="container" style="margin-top: -60px">

                            <div class="row portfolio-container" data-aos="fade-up">
                                @foreach ($gallery as $item)
                                    <div class="col-lg-4 col-md-6 portfolio-item filter-app mb-3">
                                        <div class="portfolio-wrap">
                                            <img src="{{ asset($item->path) }}" class="img-fluid" alt="">
                                            <div class="portfolio-links">
                                                <a href="{{ asset($item->path) }}" data-gallery="portfolioGallery" class="portfolio-lightbox"><i class="fa fa-eye"></i></a>
                                                <a href="/media/news/{{ $item->post_id }}" title="More Details"><i class="bx bx-link"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </section><!-- End Portfolio Section -->

              </div>

            </div>
        </section>

    </main><!-- End #main -->

@endsection


