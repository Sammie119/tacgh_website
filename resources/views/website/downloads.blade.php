@extends('layouts.website')

<style>
	.tb-header {
		color: #37517e;
	}
</style>

@section('content')

    <!-- ======= Hero Section ======= -->
    <section id="cta" class="cta main-hero" style="background: no-repeat linear-gradient(rgba(40, 58, 90, 0.9), rgba(40, 58, 90, 0.9)), url({{ asset(get_asset('Hero Image')) }}) center center">
        <div class="container" data-aos="zoom-in">

        <div class="row">
            <div class="col-lg-12 text-center text-lg-start">
                <h1 class="text-center text-white text-bold">Downloads</h1>
                {{-- <p class="text-center"> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> --}}
            </div>
        </div>

        </div>
    </section>

    <main id="main">
    
        <section id="services" class="services">
            <div class="container" data-aos="fade-up">
      
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    @forelse ($files as $key => $file)
                        <div class="col" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box" style="padding-top: 20px; padding-bottom: 20px">
                            
                            <div class="card-body">
                                <table style="width: 100%">
                                    <tr>
                                        <td rowspan="2"><img src="@if ($file->file_ext == 'pdf')
                                            {{ asset('assets/sys_img/pdf.png') }}
                                        @else
                                            {{ asset('assets/sys_img/docx.png') }}
                                        @endif" alt="file" class="float-left" width="50px" height="50px"></td>
                                        <td style="padding-left: 2%; width: 87%; color: #37517e;"><h5 class="card-text">{{ $file->name }}</h5></td>
                                        <td rowspan="2"><a href="/downloads/{{ $file->id }}"><div class="icon"><i class="bx bx-download"></i></div></https:></td>
                                    </tr>
                                    <tr>
                                        <td style="padding-left: 2%">{{ $file->file_ext }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        </div>
                    @empty
                        <tr>
                            <td colspan="10">No File Available</td>
                        </tr>
                    @endforelse
                </div>

            </div>
        </section><!-- End Services Section -->
    </main>
    
@endsection