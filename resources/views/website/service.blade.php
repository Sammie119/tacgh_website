@extends('layouts.website')

@section('content')

    <!-- ======= Hero Section ======= -->
    <section id="cta" class="cta main-hero" style="background: no-repeat linear-gradient(rgba(40, 58, 90, 0.9), rgba(40, 58, 90, 0.9)), url({{ asset(get_asset('Hero Image')) }}) center center">
        <div class="container" data-aos="zoom-in">

        <div class="row">
            <div class="col-lg-12 text-center text-lg-start">
                <h1 class="text-center text-white text-bold">Services</h1>
                {{-- <p class="text-center"> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> --}}
            </div>
        </div>

        </div>
    </section>

    <main id="main">

        @forelse (get_services() as $key => $service)
            @if ($key % 2 == 0)
                <section id="{{ $service['title'] }}" class="why-us">
                    <div class="container-fluid mt-1 mb-1" data-aos="fade-up" style="margin-top: -4%; margin-bottom: -5%">

                        <div class="row" style="width: 70%; margin-left: 15%">

                            <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

                                <div class="content">
                                    <h3><strong>{{ $service['title'] }}</strong></h3>
                                    <p>{!! $service['description'] !!}</p>
                                </div>

                                <div class="accordion-list"></div>

                            </div>

                            <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style='background-image: url("{{ asset(get_asset_path($service['asset_id'])) }}");' data-aos="zoom-in" data-aos-delay="150">&nbsp;</div>
                        </div>

                    </div>
                </section><!-- End Why Us Section -->
            @else
                <section id="{{ $service['title'] }}" class="why-us section-bg">
                    <div class="container-fluid mt-1 mb-1" data-aos="fade-up" style="margin-top: -4%; margin-bottom: -5%">

                        <div class="row" style="width: 70%; margin-left: 15%">

                            <div class="col-lg-5 align-items-stretch order-2 order-lg-1 img" style='background-image: url("{{ asset(get_asset_path($service['asset_id'])) }}");' data-aos="zoom-in" data-aos-delay="150">&nbsp;</div>

                            <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-1 order-lg-2">

                                <div class="content">
                                    <h3><strong>{{ $service['title'] }}</strong></h3>
                                    <p>{!! $service['description'] !!}</p>
                                </div>

                                <div class="accordion-list"></div>

                            </div>

                        </div>

                    </div>
                </section><!-- End Why Us Section -->
            @endif
        @empty
            <div>
                No Data Found
            </div>
        @endforelse

    </main>

@endsection
