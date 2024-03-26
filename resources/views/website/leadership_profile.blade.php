@extends('layouts.website')

@section('content')

    <main id="main" style="margin-top: 5.5rem;">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Profile of {{ $leadership->name }}</h2>
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li><a href="{{ url()->previous() }}">Leadership</a></li>
                        <li>{{ $leadership->name }}</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs Section -->

        <section id="portfolio-details" class="portfolio-details">
            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-8">
                        <img src="{{ asset(get_asset_path($leadership->asset_id)) }}" width="500" height="200" class="card-img-top img-fluid mb-4" alt="{{ $leadership->name }}">
                        {!! $leadership->description !!}
                    </div>

                    <div class="col-lg-4">
                        @include('components.devotions')
                    </div>

                </div>

            </div>
        </section>

    </main><!-- End #main -->

@endsection
