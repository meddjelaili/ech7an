<div class="menu-button">
    <div class="fab-wrapper">
      <input id="fabCheckbox" type="checkbox" class="fab-checkbox" />
      <label class="fab" for="fabCheckbox">
        <span class="fab-dots fab-dots-2"><i class="fas fa-cogs"></i></span>
      </label>
      <div class="fab-wheel">
        

        @if (LaravelLocalization::getCurrentLocale() == 'ar')
            <a class="fab-action fab-action-1" rel="alternate" hreflang="en" href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">
                <span>English</span>
            </a>
        @else 
            <a class="fab-action fab-action-1" rel="alternate" hreflang="ar" href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}">
                <span>العربية</span>
            </a>
        @endif

       
        @foreach (currency()->getActiveCurrencies() as $currency)
          <a class="fab-action fab-action-{{$loop->index + 2}}" href="{{ url('/currency/change/'.'?currency='.$currency['code']) }}">
              <span>{{ $currency['code'] }}</span>
          </a>
        @endforeach
       
      </div>
    </div>
  </div>