@extends('layouts.website')

@push('styles')
    
@endpush

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="cta" class="cta main-hero" style="background: no-repeat linear-gradient(rgba(40, 58, 90, 0.9), rgba(40, 58, 90, 0.9)), url({{ asset(get_asset('Hero Image')) }}) center center">
        <div class="container" data-aos="zoom-in">

        <div class="row">
            <div class="col-lg-12 text-center text-lg-start">
                <h1 class="text-center text-white text-bold">{{ $gallery->last()->name }}</h1>
                <p class="text-center"> {{ $gallery->last()->description }}</p>
            </div>
        </div>

        </div>
    </section>
    
    <main id="main">
        <div class="container-fluid mt-4 mb-4">
            <div class="row">
                @foreach ($gallery as $item)
                    <a href="{{ asset($item->path) }}" data-toggle="lightbox" data-gallery="gallery" class="col-sm-3">
                        <img src="{{ asset($item->path) }}" class="img-fluid">
                    </a>
                @endforeach
            </div>
        </div>
    </main>

@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bs5-lightbox@1.8.3/dist/index.bundle.min.js"></script>
@endpush