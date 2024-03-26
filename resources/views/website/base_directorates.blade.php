@extends('layouts.website')

@section('content')

    <main id="main" style="margin-top: 5.5rem;">
        @php
            $directorate = get_directorate($directorate);
        @endphp
        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>{{ $directorate['title'] }}</h2>
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li>{{ $directorate['title'] }}</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs Section -->

        <section id="portfolio-details" class="portfolio-details">
            <div class="container">

              <div class="row gy-4">

                <div class="col-lg-8">
                    {!! $directorate['description'] !!}
                </div>

                <div class="col-lg-4">
                    @include('components.devotions')
                </div>

              </div>

            </div>
        </section>

    </main><!-- End #main -->

@endsection
