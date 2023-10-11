@extends('layouts.website')

<style>
	.event-header {
		color: #37517e;
		margin-top: -10;
	}
</style>

@section('content')

 <!-- ======= Hero Section ======= -->
    <section id="cta" class="cta main-hero" style="background: no-repeat linear-gradient(rgba(40, 58, 90, 0.9), rgba(40, 58, 90, 0.9)), url({{ asset(get_asset('Hero Image')) }}) center center">
        <div class="container" data-aos="zoom-in">

        <div class="row">
            <div class="col-lg-12 text-center text-lg-start">
                <h1 class="text-center text-white text-bold">News</h1>
                {{-- <p class="text-center"> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> --}}
            </div>
        </div>

        </div>
    </section>

    <main id="main">

        <!-- ======= News Section ======= -->
		<section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="row content" style="margin-bottom: -5%">
                    @forelse (get_posts() as $post)
                        <div class="col-lg-6 mb-2">
                            <h3 class="event-header">{{ $post['title'] }}</h3>
                            <p>{{ $post['description'] }}</p>
                            <a href="news/{{ $post['id'] }}" class="btn-learn-more mb-4">Read More</a>
                        </div>
                    @empty
                        <div>
                            No Post Found
                        </div>
                    @endforelse

                </div>

            </div>
		</section><!-- End News Section -->

    </main>

@endsection
