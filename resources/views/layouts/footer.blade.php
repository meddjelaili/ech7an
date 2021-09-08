<!-- Footer -->

<footer class="footer">
  <div class="container text-center" style="margin: 0 10px">
    <div class="row">

      <div class=" col-lg-4">
        <div class="footer-about">
          <div class="footer-logo">
            @if (LaravelLocalization::getCurrentLocale() == 'en')
            <a href="" style="text-align: left;"><img src="{{asset('/images/'.$settings['site_logo']) }}" alt=""></a>
             </div>

               <p style="text-align: left;">{{$settings['about_us_en']}}</p>


           @else
           <a href="" style="text-align: right;"><img src="{{asset('/images/'.$settings['site_logo']) }}" alt=""></a>
             </div>
               <p>{{$settings['about_us_ar']}}</p>
           @endif

        </div>
      </div>





      <div class="col-lg-4">
        <div class="footer-about">
          <div class="footer-info">
              <span>{{$settings['site_address']}}</span>
          </div>
          <div class="footer-info">
            <span>{{__('E-mail Address')}} : {{$settings['site_email']}}</span>
        </div>
        <div class="footer-info">
          <a href="{{$settings['facebook']}}">
            <i class="fab fa-facebook"></i>
          </a>
          <a href="{{$settings['twitter']}}">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="{{$settings['instagram']}}">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="{{$settings['linkedIn']}}">
            <i class="fab fa-linkedin"></i>
          </a>
      </div>
          <div class="footer-info payment-method">
              <h4>{{__('Payment Methods')}}</h4>
              <a href="#" >
                <img src="{{ asset('ccp.jpg') }}" alt="" style="max-width: 10%;">
              </a>
              <a href="#" >
                <img src="{{ asset('baridimob.jpg') }}" alt="" style="max-width: 10%;">
              </a>
              <a href="#" >
                <img src="{{ asset('paysera_bank.jpg') }}" alt="" style="max-width: 10%;">
              </a>
              <a href="#" >
                <img src="{{ asset('paysera.jpg') }}" alt="" style="max-width: 10%;">
              </a>
           </div>

        </div>
      </div>

      <div class=" col-lg-4 text-left">
        <div class="footer-widget ">
          <h6 >{{__('LINKS')}}</h6>
          <ul>
            @foreach ($pages as $page)
              <li><a href="{{ route('page',$page->slug) }}">{{ $page->title }}</a></li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>


        <div class="footer-copyright-text">
          <p>{{__('Copyright &copy; 2021 All rights reserved')}}</p>
        </div>

  </div>
</footer>

<!-- End Footer -->
