@extends('layouts.website')

@section('content')

    <main id="main" style="margin-top: 5.5rem;">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">
                @php
                    $urlParts = parse_url(url()->previous());
                    $host = explode('/',$urlParts['path']);
                @endphp
                <div class="d-flex justify-content-between align-items-center">
                    <h2>{{ $message->title }}</h2>
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li><a href="{{ url()->previous() }}">{{ ucfirst(end($host)) }}</a></li>
                        <li>{{ $message->title }}</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs Section -->

        <section id="portfolio-details" class="portfolio-details">
            <div class="container text-center">
                <div class="section-title">
                    <p>{{ $message->preacher }}</p>
                </div>

                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" width="1160" height="653" src="https://www.youtube.com/embed/{{ $message->url }}?feature=oembed&wmode=opaque" allowfullscreen></iframe>
                </div>

            </div>
        </section>

    </main><!-- End #main -->

@endsection
