@extends('layouts.website')

@section('content')

    <main id="main" style="margin-top: 5.5rem;">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Gallery</h2>
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li>Gallery</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs Section -->

        <section id="portfolio-details" class="portfolio-details">
            <div class="container">

              <div class="row gy-4">

                <div class="col-lg-8">
                    <!-- ======= Portfolio Section ======= -->
                    <section id="portfolio" class="portfolio">
                        <div class="container" style="margin-top: -60px">

                            <div class="row" data-aos="fade-in">
                                <div class="col-lg-12 d-flex justify-content-center">
                                    <ul id="portfolio-flters">
                                        <li data-filter="*" class="filter-active">All</li>
                                        <li data-filter=".filter-GSEC">GSEC</li>
                                        <li data-filter=".filter-CAPS">CAPS</li>
                                        <li data-filter=".filter-EXEC">EXEC</li>
                                        <li data-filter=".filter-MGNT">MGNT</li>
                                        <li data-filter=".filter-EVENT">EVENT</li>
                                        <li data-filter=".filter-NEHPj">NEHPj</li>
                                        <li data-filter=".filter-OTHER">OTHER</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row portfolio-container" data-aos="fade-up">
                                @forelse ($gallery as $item)
                                    <div class="col-lg-4 col-md-6 portfolio-item filter-{{ $item->tag }} mb-3">
                                        <div class="portfolio-wrap">
                                            <img src="{{ asset('public/'.get_singe_image_gallery($item->gallery_group)) }}" class="img-fluid" alt="">
                                            <div class="portfolio-links">
                                                <a href="/media/gallery/{{ $item->gallery_group }}"><i class="fa fa-chevron-right"></i></a>
                                                <a href="/media/news/{{ $item->post_id }}" title="More Details"><i class="bx bx-link"></i></a>
                                            </div>
                                            <div class="mt-2 text-center">
                                                {{ $item->name }}
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div>
                                        <h3>Gallery is Empty</h3>
                                    </div>
                                @endforelse
                            </div>

                        </div>
                    </section><!-- End Portfolio Section -->
                </div>

                <div class="col-lg-4">
                    @include('components.devotions')
                </div>

              </div>

            </div>
        </section>

    </main><!-- End #main -->

@endsection
