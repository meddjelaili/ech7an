
<!-- model -->

<div id="popup">
    <div class="content">
      <h2>{{__('Choose Payment Method')}}</h2>
      @if ($settings['paysera_status'] == 1)
  
        <a class="cash" href="{{ route('wallet.charge.index', 'paysera') }}">
          <div class="img"><img src="{{ asset('images/paysera.svg')}}"></div>
          <div class="name">Paysera</div>
        </a>

      @endif

      @if ($settings['ccp_status'] == 1)
        <a class="cash" href="{{ route('wallet.charge.index', 'ccpbaridimob') }}">
          <div class="img"><img src="{{ asset('images/AlgeriePoste.svg')}}" style="max-width: 30px !important;"></div>
          <div class="name">Ccp / Baridimob</div>
        </a>
      @endif

      @if ($settings['paysera_wallet_status'] == 1)
        <a class="cash" href="{{ route('wallet.charge.index', 'paysera-wallet') }}">
          <div class="img">
            <img src="{{ asset('paysera_bank2.jpg')}}" style="height: 60px;">
          </div>

        </a>
      @endif
    </div>

    <a class="close" onclick="popupToggle();"><svg width="28" height="28" viewBox="0 0 36 36" data-testid="close-icon"><path d="M28.5 9.62L26.38 7.5 18 15.88 9.62 7.5 7.5 9.62 15.88 18 7.5 26.38l2.12 2.12L18 20.12l8.38 8.38 2.12-2.12L20.12 18z"></path></svg></a>

  </div>
<!-- End model -->

@section('script')
    <script>
        function popupToggle() {
            
            const popup = document.getElementById('popup');
            popup.classList.toggle('active');
            
        }
    </script>
@endsection