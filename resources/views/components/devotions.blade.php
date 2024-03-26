@php
    $date = date_create(date('Y-m-d'));
    $devotion = get_devotion('Devotion');
    // dd($devotion);
@endphp
@isset($devotion['title'])
    <div class="portfolio-info">
        <h2>Riches of Grace</h2>

        <h6 style="color: #6a777d">{{ date_format($date,"F j, Y") }}</h6>

        <h4>{{ $devotion['title'] }}</h4>
        <p>
            {!! $devotion['body'] !!}
        </p>
    </div>
@else
    <div class="portfolio-info">
        <h2>Riches of Grace</h2>
    </div>
@endisset

