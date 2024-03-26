@extends('layouts.website')

@section('content')

    <main id="main" style="margin-top: 5.5rem;">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>{{ $title }}</h2>
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li>{{ $title }}</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs Section -->

        <section id="portfolio-details" class="portfolio-details">
            <div class="container">

              <div class="row gy-4">

                <div class="col-lg-8">
                    <div class="row row-cols-1 row-cols-md-2 g-4">
                        @forelse ($files as $key => $file)
                            <div class="col" data-aos="zoom-in" data-aos-delay="100">
                            <div class="icon-box">

                                <div class="card-body">
                                    <table style="width: 100%">
                                        <tr>
                                            <td rowspan="2"><img src="@if ($file->file_ext == 'pdf')
                                                {{ asset('assets/sys_img/pdf.png') }}
                                            @else
                                                {{ asset('assets/sys_img/docx.png') }}
                                            @endif" alt="file" class="float-left" width="50px" height="50px"></td>
                                            <td style="padding-left: 2%; width: 87%; color: #37517e;"><h5 class="card-text">{{ $file->name }}</h5></td>
                                            <td rowspan="2"><a href="/media/download/{{ $file->id }}"><div class="icon"><i class="bx bx-download"></i></div></https:></td>
                                        </tr>
                                        <tr>
                                            <td style="padding-left: 2%"><small class="text-muted">{{ $file->file_ext }}</small></td>
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

                <div class="col-lg-4">
                    @include('components.devotions')
                </div>

              </div>

            </div>
        </section>

    </main><!-- End #main -->

@endsection
