@extends('layouts.website')

@section('content')

    <!-- ======= Hero Section ======= -->
    <section id="cta" class="cta main-hero" style="background: no-repeat linear-gradient(rgba(40, 58, 90, 0.9), rgba(40, 58, 90, 0.9)), url({{ asset(get_asset('Hero Image')) }}) center center">
        <div class="container" data-aos="zoom-in">

        <div class="row">
            <div class="col-lg-12 text-center text-lg-start">
                <h1 class="text-center text-white text-bold">About Us</h1>
                {{-- <p class="text-center"> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> --}}
            </div>
        </div>

        </div>
    </section>

    <main id="main">
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">
        
                <div class="row content">
                    <div class="col-12">{!! get_about('About Us') !!}</div>
                </div>
        
            </div>
        </section>

        <section id="about" class="about section-bg">
            <div class="container" data-aos="fade-up">
        
                <div class="section-title">
                    <h2>Mission</h2>
                </div>

                <div class="row content">
                    <div class="col-12 pt-4 pt-lg-0 text-center">
                        {!! get_about('Mission') !!}
                    </div>
                </div>
        
            </div>
        </section>

        <section id="about" class="about section-bg" style="margin-top: -5%">
            <div class="container" data-aos="fade-up">
        
                <div class="section-title">
                    <h2>Vision</h2>
                </div>

                <div class="row content">
                    <div class="col-12 pt-4 pt-lg-0 text-center">
                        {!! get_about('Vision') !!}
                    </div>
                </div>
        
            </div>
        </section>

        <section id="services" class="services">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Core Values</h2>
                </div>
        
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach ($about as $item)
                        <div class="col" data-aos="zoom-in" data-aos-delay="100">
                            <div class="icon-box" style="padding-top: 20px; padding-bottom: 20px">
                                
                                <div class="card-body">
                                    <h5 class="card-text" style="color: #37517e;">{!! strip_tags($item->subject) !!}</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
        
            </div>
        </section>
    </main>
    
@endsection