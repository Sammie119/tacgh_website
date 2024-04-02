@extends('layouts.website')

@section('content')

    <main id="main" style="margin-top: 5.5rem;">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">
                @php
                    $gc = get_stuff('Leadership');
                    $exec = get_stuff('Management');
                    // dd($gc);
                @endphp
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Management Team</h2>
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li>Management Team</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs Section -->

        <section id="portfolio-details" class="portfolio-details">
            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-8">
                        {{-- <img src="{{ asset(get_asset_path($gc['asset_id'])) }}" class="card-img-top img-fluid mb-4" alt="{{ $gc['name'] }}">
                        {!! $gc['description'] !!} --}}
                        <div class="row team">
                            <p style="text-align: justify;">
                                {!! get_stuff_except('Management Team')['description'] !!}
                            </p>

                            @forelse ($gc as $leadership)
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <div class="member" data-aos="fade-up">
                                        <div class="pic"><img src="{{ asset(get_asset_path($leadership['asset_id'])) }}" class="img-fluid" alt="{{ $leadership['name'] }}"></div>
                                        <div class="member-info" style="text-wrap: balance">
                                            <h4>{{ $leadership['name'] }}</h4>
                                            <span>{{ $leadership['position'] }}</span>
                                            {{-- <div class="social">
                                                <a href="{{ $leadership['whatsapp_address'] }}"><i class="bi bi-whatsapp"></i></a>
                                                <a href="{{ $leadership['twitter_address'] }}"><i class="bi bi-twitter"></i></a>
                                                <a href="{{ $leadership['facebook_address'] }}"><i class="bi bi-facebook"></i></a>
                                                <a href="{{ $leadership['instagram_address'] }}"><i class="bi bi-instagram"></i></a>
                                            </div> --}}
                                            <div class="social">
                                                <a href="/leadership/profile/{{ $leadership['id'] }}"><small>Profile of {{ $leadership['position'] }}</small></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div>No Member Entered</div>
                            @endforelse

                            @forelse ($exec as $executive)
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <div class="member" data-aos="fade-up">
                                        <div class="pic"><img src="{{ asset(get_asset_path($executive['asset_id'])) }}" class="img-fluid" alt="{{ $leadership['name'] }}"></div>
                                        <div class="member-info" style="text-wrap: balance">
                                            <h4>{{ $executive['name'] }}</h4>
                                            <span>{{ $executive['position'] }}</span>
                                            {{-- <div class="social">
                                                <a href="{{ $executive['whatsapp_address'] }}"><i class="bi bi-whatsapp"></i></a>
                                                <a href="{{ $executive['twitter_address'] }}"><i class="bi bi-twitter"></i></a>
                                                <a href="{{ $executive['facebook_address'] }}"><i class="bi bi-facebook"></i></a>
                                                <a href="{{ $executive['instagram_address'] }}"><i class="bi bi-instagram"></i></a>
                                            </div> --}}
                                            <div class="social">
                                                <a href="/leadership/profile/{{ $executive['id'] }}"><small>Profile of {{ $executive['position'] }}</small></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                {{-- <div>No Member Entered</div> --}}
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
