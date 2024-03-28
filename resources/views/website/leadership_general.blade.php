@extends('layouts.website')

@section('content')

    <main id="main" style="margin-top: 5.5rem;">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">
                @php
                    $gc = get_stuff('General Council')[0];
                    // dd($gc);
                @endphp
                <div class="d-flex justify-content-between align-items-center">
                    <h2>{{ $gc['is_staff_or_board'] }}</h2>
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li>{{ $gc['is_staff_or_board'] }}</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs Section -->

        <section id="portfolio-details" class="portfolio-details">
            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-8">
                        <img src="{{ asset('public/'.get_asset_path($gc['asset_id'])) }}" class="card-img-top img-fluid mb-4" alt="{{ $gc['name'] }}">
                        {!! $gc['description'] !!}
                    </div>

                    <div class="col-lg-4">
                        @include('components.devotions')
                    </div>

                </div>

            </div>
        </section>

    </main><!-- End #main -->

@endsection
