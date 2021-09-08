@extends('layouts.app')
@section('style')

 <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <!-- swipper-min-css------------------------------------------------ -->
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <style>
          html,
      body {
        position: relative;
        height: 100%;
      }

      body {
        background: #fff;
        font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
        font-size: 14px;
        color: #000;
        margin: 0;
        padding: 0;
      }
     
    </style>
    @if (LaravelLocalization::getCurrentLocale() == 'ar')
      <link rel="stylesheet" href="{{asset('css/swiper_ar.css')}}">
      <style>
         @media (max-width: 3000px) and (min-width: 1450px) {
                #popular-topup .container {
                  padding-right: 200px !important;
                }
                .footer .container 
                {
                  padding-right: 250px;
                }
              }
      </style>
    @else 
      <link rel="stylesheet" href="{{asset('css/swiper.css')}}">  
      <style>
        @media (max-width: 3000px) and (min-width: 1450px) {
                #popular-topup .container {
                  padding-left: 200px !important;
                }
                .footer .container 
                {
                  padding-left: 250px;
                }
              }
      </style>
    @endif
    
@endsection
@section('content')
  <!-- test 1 -->

  <section class="slideshow" style="z-index: 0">
    <div class="swiper-container mySlider" style="z-index: 0 !important;">
      <div class="swiper-wrapper" >
        <div class="swiper-slide">
          <a href="{{ $settings['slideshow_1_link'] }} ">
            <div class="cover"><img class="GamePic"  alt="slideshow" src="{{asset('/images/'.$settings['slideshow_1']) }}"></div>
          </a>
        </div>
        <div class="swiper-slide">
          <a href="{{ $settings['slideshow_2_link'] }}">
            <div class="cover" style="height: 200px;width: 400px;"><img class="GamePic"  alt="slideshow" src="{{asset('/images/'.$settings['slideshow_2']) }}"></div>
          </a>
        </div>
        <div class="swiper-slide">
          <a href="{{ $settings['slideshow_3_link'] }}">
            <div class="cover" style="height: 200px;width: 400px;"><img class="GamePic"  alt="slideshow" src="{{asset('/images/'.$settings['slideshow_3']) }}"></div>
          </a>
        </div>
        <div class="swiper-slide">
          <a href="{{ $settings['slideshow_4_link'] }}">

          <div class="cover" style="height: 200px;width: 400px;"><img class="GamePic"  alt="slideshow" src="{{asset('/images/'.$settings['slideshow_4']) }}"></div>
        </div>
        <div class="swiper-slide">
          <a href="{{ $settings['slideshow_5_link'] }}">
            <div class="cover" style="height: 200px;width: 400px;"><img class="GamePic"  alt="slideshow" src="{{asset('/images/'.$settings['slideshow_5']) }}"></div>
          </a>
        </div>
      
      
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </section>
  
  
<!-- End test 1 -->

<!-- Popular Top Up Games -->

<section id="popular-topup" class="slider">
        
    <div class="container swiper-container mySwiper" style="padding-top: 0;padding-bottom: 0;">


            <h3 class="heading">{{ __('Popular Top Up Games') }}</h3>
            <ul id="autoWidth" class="cs-hidden multiple-items swiper-wrapper">
              @foreach ($topUps as $row)
                <li class="swiper-slide">
                  <a href="{{ route('buy.topup',$row->slug) }}">
                    <div class="cover">
                      <img class="GamePic"  src="{{ asset('images/'.$row->cover_image) }}">
                    </div>
                    <div class="info">
                      <b>{{ $row->title }}</b>
                    </div>
                  </a>
                </li>
              @endforeach
                
            </ul>
        </div>

    
</section>

<!-- End Popular Top Up Games -->

<!-- Popular Cards -->

<section id="popular-topup" class="slider">
        
  <div class="container swiper-container mySwiper" style="padding-top: 0;padding-bottom: 0;">


          <h3 class="heading">{{ __('Popular Cards') }}</h3>
          <ul id="autoWidth" class="cs-hidden multiple-items swiper-wrapper" >
            @foreach ($cards as $row)
              <li class="swiper-slide">
                <a href="{{ route('buy.card',$row->slug) }}">
                  <div class="cover">
                    <img class="GamePic"  src="{{ asset('images/'.$row->cover_image) }}">
                  </div>
                  <div class="info">
                    <b>{{ $row->title }}</b>
                  </div>
                </a>
              </li>
            @endforeach
              
          </ul>
      </div>

  
</section>

<!-- End Popular  Cards-->


<!-- New Top Up Games -->

<section id="popular-topup" class="slider">
        
  <div class="container swiper-container mySwiper" style="padding-top: 0;padding-bottom: 0;">


          <h3 class="heading">{{ __('New Top Up Games') }}</h3>
          <ul id="autoWidth" class="cs-hidden multiple-items swiper-wrapper">
            @foreach ($new_topUps as $row)
              <li class="swiper-slide">
                <a href="{{ route('buy.topup',$row->slug) }}">
                  <div class="cover">
                    <img class="GamePic"  src="{{ asset('images/'.$row->cover_image) }}">
                  </div>
                  <div class="info">
                    <b>{{ $row->title }}</b>
                  </div>
                </a>
              </li>
            @endforeach
              
          </ul>
      </div>

  
</section>

<!-- End Popular Top Up Games -->

<!-- New Cards -->

<section id="popular-topup" class="slider">
        
  <div class="container swiper-container mySwiper" style="padding-top: 0;padding-bottom: 0;">


          <h3 class="heading">{{ __('New Cards') }}</h3>
          <ul id="autoWidth" class="cs-hidden multiple-items swiper-wrapper" >
            @foreach ($new_cards as $row)
              <li class="swiper-slide">
                <a href="{{ route('buy.card',$row->slug) }}">
                  <div class="cover">
                    <img class="GamePic"  src="{{ asset('images/'.$row->cover_image) }}">
                  </div>
                  <div class="info">
                    <b>{{ $row->title }}</b>
                  </div>
                </a>
              </li>
            @endforeach
              
          </ul>
      </div>

  
</section>

<!-- End Popular  Cards-->
@endsection
@section('script')
    <!-- swiper-min-js-------------------------------------------- -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!-- Initialize Swiper---------------------------------------- -->
     <script>
       var swiper = new Swiper(".mySwiper", {
         slidesPerView: "auto",
       });
      // slideSHow
        var swiper = new Swiper(".mySlider", {
          effect: "coverflow",
          grabCursor: true,
          centeredSlides: true,
          slidesPerView: "auto",
          loop: true,
          autoplay: {
              delay: 4000,
              disableOnInteraction: false,
            },
            pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
       
          coverflowEffect: {
            rotate: 10,
            stretch: 0,
            depth: 1200,
            modifier: 1,
            slideShadows: false,
          },
        
        });
      // End Test 1
     </script>
@endsection