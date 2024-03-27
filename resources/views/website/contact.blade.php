@extends('layouts.website')

@section('content')

    <main id="main" style="margin-top: 5.5rem;">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Contact Us</h2>
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li>Contact Us</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact section-bg">
            <div class="container">

                <div class="row">
                    <div class="col-lg-6">
                        <div class="info-box mb-4">
                            <i class="bx bx-map"></i>
                            <h3>Our Address</h3>
                            <p>{{ get_contact_subject('Street') }} {{ get_contact_subject('Address') }}, {{ get_contact_subject('Town') }}</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="info-box  mb-4">
                            <i class="bx bx-envelope"></i>
                            <h3>Email Us</h3>
                            <p>{{ get_contact_subject('Email') }}</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="info-box  mb-4">
                            <i class="bx bx-phone-call"></i>
                            <h3>Call Us</h3>
                            <p>{{ get_contact_subject('Contact Number 1') }}, {{ get_contact_subject('Contact Number 2')}}</p>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-6 ">
                        <iframe class="mb-4 mb-lg-0" src="{{ get_contact_subject('Google Map') }}" frameborder="0" style="border:0; width: 100%; height: 370px;" allowfullscreen loading="lazy"></iframe>
                    </div>

                    <div class="col-lg-6">
                        <form action="/forms/contact" method="post" role="form" class="php-email-form">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                            </div>
                            <div class="my-3">
                                @if(session()->has('success'))
                                    <div class="alert alert-success">
                                        {{ session()->get('success') }}
                                    </div>
                                @endif
                                @if(session()->has('error'))
                                    <div class="alert alert-danger">
                                        {{ session()->get('error') }}
                                    </div>
                                @endif
                                {{-- <div class="sent-message">Your message has been sent. Thank you!</div> --}}
                            </div>
                            <div class="text-center"><button
                                {{-- class="g-recaptcha" --}}
                                type="submit"
                                {{-- data-sitekey="{{ env('RECAPTCHAsitekey') }}"
                                data-callback='onRecaptchaSuccess' --}}
                                >Send Message</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

@endsection

@push('scripts')
    {{-- <script src="https://www.google.com/recaptcha/api.js?render=6Ld8YqMpAAAAAM4FyS7aw_OmhwFOcDAWfalyblKo"></script> --}}
    {{-- <script src="https://www.google.com/recaptcha/api.js"></script> --}}
@endpush
