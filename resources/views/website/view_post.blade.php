@extends('layouts.website')

@section('content')

 <!-- ======= Hero Section ======= -->
    <section id="cta" class="cta main-hero" style="background: no-repeat linear-gradient(rgba(40, 58, 90, 0.9), rgba(40, 58, 90, 0.9)), url({{ asset(get_asset('Hero Image')) }}) center center">
        <div class="container" data-aos="zoom-in">

        <div class="row">
            <div class="col-lg-12 text-center text-lg-start">
                <h1 class="text-center text-white text-bold">{{ $post->title }}</h1>
                <p class="text-center"> {{ $post->description }}</p>
            </div>
        </div>

        </div>
    </section>

  <main id="main">

    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="row content">
                <div class="col-12">{!! $post->body !!}</div>
            </div>

        </div>
    </section>

  </main>

@endsection
