@extends('layouts.website')

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="cta" class="cta main-hero" style="background: no-repeat linear-gradient(rgba(40, 58, 90, 0.9), rgba(40, 58, 90, 0.9)), url({{ asset(get_asset('Hero Image')) }}) center center">
        <div class="container" data-aos="zoom-in">

        <div class="row">
            <div class="col-lg-12 text-center text-lg-start">
                <h1 class="text-center text-white text-bold">Gallery</h1>
                {{-- <p class="text-center"> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> --}}
            </div>
        </div>

        </div>
    </section>
    
    <main id="main">
    
        <div class="album py-5 bg-light">
            <div class="container">
    
                <div class="row">
                    @forelse ($gallery as $item)
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top" src="{{ asset(get_singe_image_gallery($item->gallery_group)) }}" alt="Image" width="100" height="200">
                                <div class="card-body">
                                    <p class="card-text">{{ $item->name }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary" onclick="window.location.href='/gallery/{{ $item->gallery_group }}';">View</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div>
                            <h3>Gallery is Empty</h3>
                        </div>
                    @endforelse
                    
                </div>
            </div>
        </div>
    </main>

@endsection