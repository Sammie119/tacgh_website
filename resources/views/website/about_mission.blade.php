@extends('layouts.website')

@section('content')

    <main id="main" style="margin-top: 5.5rem;">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">
                @php $about = get_about('Mission and Vision') @endphp
                <div class="d-flex justify-content-between align-items-center">
                    <h2>{{ $about['description'] }}</h2>
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li>{{ $about['name'] }}</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs Section -->

        <section id="portfolio-details" class="portfolio-details">
            <div class="container">

              <div class="row gy-4">

                <div class="col-lg-8">
                    {!! $about['subject'] !!}
                </div>

                <div class="col-lg-4">
                    @include('components.devotions')
                </div>

              </div>

            </div>
        </section><!-- End Portfolio Details Section -->

    </main><!-- End #main -->

@endsection
