@extends('layouts.website')

@section('content')

    <main id="main" style="margin-top: 5.5rem;">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Event Calender</h2>
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li>Event Calender</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs Section -->

        <section id="portfolio-details" class="portfolio-details">
            <div class="container">

              <div class="row gy-4">

                <div class="col-lg-8">
                    <div class="row">
                        @forelse (get_event() as $event)
                            <div class="col-12 mb-3" style="border-bottom: 1px solid #000">
                                <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                                    <div class="row">
                                    <div class="col-5">
                                        <img src="{{ asset(get_asset_path($event['asset_id'])) }}" class="img-fluid mb-3" alt="Event Image">
                                    </div>
                                    <div class="col-7">
                                        <h3 class="title">{{ $event['name'] }}</h3>
                                        <p>{{ $event['description'] }}</p>
                                        <small class="text-muted">
                                            <ul class="list-inline">
                                                <li class="list-inline-item"><i class="bi bi-calendar"></i> {{ ($event['start_date'] == $event['end_date']) ? get_date_time_format($event['start_date']) : get_date_time_format($event['start_date'])." - ".get_date_time_format($event['end_date']) }}</li>
                                                <li class="list-inline-item"><i class="bi bi-clock"></i> {{ get_date_time_format($event['start_time'], 'time') }}</li> <br>
                                                <li class="list-inline-item mt-2"><i class="bi bi-geo-alt"></i> {{ $event['venue'] }}</li>
                                            </ul>
                                        </small>
                                    </div>

                                </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-md-6 col-lg-6 ">
                                <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                                    <small class="text-muted">
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><i class="bi bi-calendar"></i> No Date</li>
                                            <li class="list-inline-item"><i class="bi bi-clock"></i> No Time</li> <br>
                                            <li class="list-inline-item mt-2"><i class="bi bi-geo-alt"></i> No Venue</li>
                                        </ul>
                                    </small>
                                    <h3 class="title">No Event</h3>
                                    <p>Kind enter an Event</p>
                                </div>

                            </div>
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
