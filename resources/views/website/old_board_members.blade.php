@extends('layouts.website')

@section('content')

    <!-- ======= Hero Section ======= -->
    <section id="cta" class="cta main-hero" style="background: no-repeat linear-gradient(rgba(40, 58, 90, 0.9), rgba(40, 58, 90, 0.9)), url({{ asset(get_asset('Hero Image')) }}) center center">
        <div class="container" data-aos="zoom-in">

        <div class="row">
            <div class="col-lg-12 text-center text-lg-start">
                <h1 class="text-center text-white text-bold">Former Board Members</h1>
                {{-- <p class="text-center"> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> --}}
            </div>
        </div>

        </div>
    </section>

    <main id="main">
        
      <!-- ======= Team Section ======= -->
      <section id="team" class="team section-bg">
        <div class="container" data-aos="fade-up">
    
          <div class="row" style="margin-top: -2%">
      
            @forelse (get_stuff('Former Board Member') as $staff)
              <div class="col-lg-6 mt-4" data-aos="zoom-in" data-aos-delay="100">
                <div class="member d-flex align-items-start">
                  <div class="pic"><img src="{{ asset($staff['image_path']) }}" class="img-fluid" alt=""></div>
                  <div class="member-info">
                    <h4>{{ $staff['name'] }}</h4>
                    <span>{{ $staff['position'] }}</span>
                    <p>{{ $staff['description'] }}</p>
                    <div class="social">
                      @isset($staff['twitter_address'])<a href="{{ $staff['twitter_address'] }}"><i class="ri-twitter-fill"></i></a>@endisset
                      @isset($staff['facebook_address'])<a href="{{ $staff['facebook_address'] }}"><i class="ri-facebook-fill"></i></a>@endisset
                      @isset($staff['instagram_address'])<a href="{{ $staff['instagram_address'] }}"><i class="ri-instagram-fill"></i></a>@endisset
                      @isset($staff['linkedin_address'])<a href="{{ $staff['linkedin_address'] }}"> <i class="ri-linkedin-box-fill"></i> </a>@endisset
                      @isset($staff['whatsapp_address'])<a href="{{ $staff['whatsapp_address'] }}"> <i class="ri-whatsapp-fill"></i> </a>@endisset
                    </div>
                  </div>
                </div>
              </div>
            @empty
              <div class="col-12">No Data Found</div>
            @endforelse
      
          </div>
        
        </div>

        <div class="text-center mt-4">
          <a href="/board" class="btn-learn-more">Current Members</a>
        </div>

      </section><!-- End Team Section -->

    </main>
    
@endsection