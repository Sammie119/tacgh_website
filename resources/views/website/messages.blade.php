@extends('layouts.website')

@section('content')

    <main id="main" style="margin-top: 5.5rem;">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>{{ $title }}</h2>
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li>{{ $title }}</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs Section -->

        <section id="portfolio-details" class="portfolio-details">
            <div class="container">

              <div class="row gy-4">

                <div class="col-lg-8">
                    <div class="row row-cols-1 row-cols-md-2 g-4">
                        @forelse ($files as $key => $file)
                            <div class="col" data-aos="zoom-in" data-aos-delay="100">
                            <div class="icon-box">

                                <div class="card-body">
                                    <div class="ratio ratio-4x3 mb-3">
                                        <iframe src="https://www.youtube.com/embed/{{ $file->url }}" title="YouTube video" allowfullscreen></iframe>
                                    </div>
                                    <a href="/media/message/{{ $file->id }}">
                                        <table style="width: 100%">
                                            <tr>
                                                <td style="padding-left: 2%; width: 87%; color: #37517e;"><h5 class="card-text">{{ $file->title }}</h5></td>
                                                <td rowspan="2"><div class="icon"><i class="bx bx-arrow-from-left"></i></div></td>
                                            </tr>
                                            <tr>
                                                <td style="padding-left: 2%"><small class="text-muted">{{ $file->preacher }}</small></td>
                                            </tr>
                                        </table>
                                    </a>
                                </div>
                            </div>
                            </div>
                        @empty
                            <tr>
                                <td colspan="10">No File Available</td>
                            </tr>
                        @endforelse
                    </div>
                </div>

                <div class="col-lg-4">
                    @include('components.devotions')
                </div>

              </div>

            </div>
        </section>

    </main><!-- End #main -->

@endsection
