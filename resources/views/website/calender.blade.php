@extends('layouts.website')

<style>
    .badge {
        background: no-repeat linear-gradient(rgba(40, 58, 90, 0.9), rgba(40, 58, 90, 0.9));
    }

    h3 {
        ;
    }
</style>

@section('content')

    <!-- ======= Hero Section ======= -->
    <section id="cta" class="cta main-hero" style="background: no-repeat linear-gradient(rgba(40, 58, 90, 0.9), rgba(40, 58, 90, 0.9)), url({{ asset(get_asset('Hero Image')) }}) center center">
        <div class="container" data-aos="zoom-in">

        <div class="row">
            <div class="col-lg-12 text-center text-lg-start">
                <h1 class="text-center text-white text-bold">Event Calender</h1>
                {{-- <p class="text-center"> Upcoming s</p> --}}
            </div>
        </div>

        </div>
    </section>

    <main id="main">
        <!-- ======= Services Section ======= -->
		<section id="services" class="services">
      
            <table style="width: 50%; margin-left: 25%">
                @forelse (get_event() as $event)
                    <tr>
                        <td rowspan="2" style="width: 5%"><h4 class="display-4"><span class="badge" style="">{{ date('d', strtotime($event['start_date'])) }}</span></h4></td>
                        <td style="padding-left: 2%"><h3 class="text-uppercase" style="color: #37517e"><strong>{{ $event['name'] }}</strong></h3></td>
                    </tr>
                    <tr>
                        <td style="padding-left: 2%">
                            <ul class="list-inline">
                                <li class="list-inline-item"><i class="bi bi-calendar"></i> {{ ($event['start_date'] == $event['end_date']) ? get_date_time_format($event['start_date']) : get_date_time_format($event['start_date'])." - ".get_date_time_format($event['end_date']) }}</li>
                                <li class="list-inline-item"><i class="bi bi-clock"></i> {{ get_date_time_format($event['start_time'], 'time') }}</li>
                                <li class="list-inline-item"><i class="bi bi-geo-alt"></i> {{ $event['venue'] }}</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: right; vertical-align: top; color: #37517e"><h3>{{ strtoupper(date('M', strtotime($event['start_date']))) }}</h3></td>
                        <td style="padding-left: 2%"><p>{{ $event['description'] }}</p></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10">No Event</td>
                    </tr>
                @endforelse
                
            </table>
      
        </section><!-- End Services Section -->
    </main>
    
@endsection