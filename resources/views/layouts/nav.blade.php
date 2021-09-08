

 <!-- header -->
 <header class=" mb-3 border-bottom">
  <nav class="navbar navbar-expand-md   mb-4 navbar-soscial">
    <div class="container-fluid">
    

      <div class="soscial-link" >
        <a  href="{{ $settings['facebook'] }}"><i class="fa fa-facebook"></i></a>
        <a  href="{{ $settings['instagram'] }}"><i class="fa fa-instagram"></i></a>
        <a  href="{{ $settings['twitter'] }}"><i class="fa fa-twitter"></i></a>
        <a  href="{{ $settings['linkedIn'] }}"><i class="fa fa-linkedin"></i></a>
      </div>
            
      <div class="dropdown currency" >
        <a class="show_login" id="dropdownMenuButtonLG" data-bs-toggle="dropdown" aria-expanded="false"> 
           {{currency()->getUserCurrency()}}<i class="fa fa-angle-down" style="padding: 1px;width: 15px;"></i>
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonLG">
          
          @foreach (currency()->getActiveCurrencies() as $currency)
            <li>
              <a class="dropdown-item" href="{{ url('/currency/change/'.'?currency='.$currency['code']) }}">
                <span>{{ $currency['code'] }}</span>
              </a>
            </li>   
          @endforeach               
        </ul>
      </div>

      @if (LaravelLocalization::getCurrentLocale() == 'ar')
            <a class="lang" rel="alternate" hreflang="en" href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">
                <span>English</span>
            </a>
      @else 
            <a class="lang" rel="alternate" hreflang="ar" href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}">
                <span>العربية</span>
            </a>
      @endif
      
    </div>
  </nav>
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start mb-5">
      <div class="pull-right col-lg-3 col-md-3 col-sm-6 col-xs-12 logo" style="margin-right: 70px;">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none"></a>
          <img src="{{asset('/images/'.$settings['site_logo'])}}" class="img-responsive" style="max-width: 90%;margin-top: 14px;" alt="">
        </a>  
      </div>
      

     
      <div class="pull-left col-lg-8  " style="margin-top: 25px;">
        <div class="search-dev mt-2">  
          <form methods="get" action="{{ route('page.search') }}">
            {{-- @csrf --}}
            <div class="input-group search">
              <input type="search" name="search"  placeholder="{{__('Search for product')}}" aria-label="Search" class="form-control" required> 
            </div>
          </form>
        </div>
        
        <div class="user-icon float-end mt-md-4" style="margin-left: 5px;">
          @guest 
              
  
                <a class="show_login" href="{{ route('login') }}"> 
                    <i class="fas fa-user"></i> {{__('Login / Register')}}
                </a>
            @else

              <div class="dropdown">
                <a class="show_login" id="dropdownMenuButtonLG" data-bs-toggle="dropdown" aria-expanded="false"> 
                  <i class="fas fa-user"></i> {{ Auth::user()->name }} <i class="fa fa-angle-down" style="padding: 1px;width: 15px;"></i>
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonLG" style="z-index: 20 ">
                  <li><a class="dropdown-item" href="{{ route('profile.index') }}">{{__('Profile')}}</a></li>  
              

                  @if ($isAdmin)
                    <li><a class="dropdown-item" href="{{ route('admin.') }}">{{__('Dashboard')}}</a></li>                  
                  @endif                

                  <li><a class="dropdown-item" href="{{ route('wallet.index') }}">{{__('Wallet')}}</a></li> 
                  <li><a class="dropdown-item" href="{{ route('order.index') }}">{{__('My Order')}}</a></li>       
                  <li><hr class="dropdown-divider"></li>
                  <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
  
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                  </li>
                </ul>
              </div>

            @endguest

        </div>
        @auth
          <div class="user-icon float-end mt-md-4" style="margin-left: 5px">

            <a href="{{ route('order.index') }}"> 
              <i class="fas fa-shopping-cart" style="background: #fff;color: #39bbce;font-size: 19px;"></i> 
            </a>
          </div>
        @endauth
        
    </div>
  </div>
  <nav class="navbar navbar-expand-lg  rounded" aria-label="Eleventh navbar example">
    <div class="container-fluid">
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <div class="navbar-collapse collapse" id="navbarsExample09" >
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
     
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/home') }}">
              <i class="fas fa-home" style="max-width: 15px;max-height: 15px;color: #279fe0;"></i>
              {{__('Home')}}
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('page.topups') }}">
              <i class="fas fa-mobile-alt" style="max-width: 15px;max-height: 15px;color: #279fe0;"></i>
              {{__('Top Upss')}}
            </a>
          </li>

          <li class="nav-item">
            
            <a class="nav-link" href="{{ route('page.cards') }}">
              <i class="fas fa-credit-card" style="max-width: 15px;max-height: 15px;color: #279fe0;"></i>
              {{__('Cards')}}
            </a>
          </li>
          
          
          
        </ul>
        @auth
          @if (!Auth::user()->isMerchant())
            <div class="pull-left hidden-xs">
              <a href="{{ route('merchant.index') }}" class="fast-purchase" > {{__('Merchant')}} </a>
            </div>
          @endif
        @else 
          <div class="pull-left hidden-xs">
            <a href="{{ route('merchant.index') }}" class="fast-purchase"> {{__('Merchant')}} </a>
          </div>
        @endauth
        
        
       
      </div>
    </div>
  </nav>
</header>

  