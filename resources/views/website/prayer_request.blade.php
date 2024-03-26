@extends('layouts.website')

@section('content')

    <main id="main" style="margin-top: 5.5rem;">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Prayer Request</h2>
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li>Prayer Request</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs Section -->

        <!-- ======= Prayer Section ======= -->
        <section id="contact" class="contact">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 ">
                        <form action="/forms/prayer_request" method="post" role="form" class="php-email-form">
                            @csrf
                            <div class="mb-3" style="text-align: center">
                                <h3>Prayer Request</h3>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6 form-group">
                                    <input type="number" name="contact" class="form-control" id="contact" placeholder="Contact" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <select class="form-control" name="type" id="type" required>
                                        <option selected disabled>--Select request type--</option>
                                        <option>Prayer Request</option>
                                        <option>Counselling</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                            </div>
                            <div class="my-3">
                                @if(session()->has('success_1'))
                                    <div class="alert alert-success">
                                        {{ session()->get('success_1') }}
                                    </div>
                                @endif
                                @if(session()->has('error_1'))
                                    <div class="alert alert-danger">
                                        {{ session()->get('error_1') }}
                                    </div>
                                @endif
                            </div>
                            <div class="text-center"><button type="submit">Send Request</button></div>
                        </form>
                    </div>

                    <div class="col-lg-6">
                        <form action="/forms/testimony" method="post" role="form" class="php-email-form">
                            @csrf
                            <div class="mb-3" style="text-align: center">
                                <h3>Testimony</h3>
                            </div>

                            <div class="form-group mb-3">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
                            </div>

                            <div class="form-group mb-3">
                                <input type="number" class="form-control" name="contact" id="contact" placeholder="Contact" required>
                            </div>

                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" rows="5" placeholder="Testimony" required></textarea>
                            </div>
                            <div class="my-3">
                                @if(session()->has('success_2'))
                                    <div class="alert alert-success">
                                        {{ session()->get('success_2') }}
                                    </div>
                                @endif
                                @if(session()->has('error_2'))
                                    <div class="alert alert-danger">
                                        {{ session()->get('error_2') }}
                                    </div>
                                @endif
                            </div>
                            <div class="text-center"><button type="submit">Send Testimony</button></div>
                        </form>
                    </div>

                </div>
            </div>
        </section><!-- End Prayer Section -->

    </main><!-- End #main -->

@endsection

@push('scripts')
    {{-- <script src="https://www.google.com/recaptcha/api.js?render=6Ld8YqMpAAAAAM4FyS7aw_OmhwFOcDAWfalyblKo"></script> --}}
    {{-- <script src="https://www.google.com/recaptcha/api.js"></script> --}}
@endpush
