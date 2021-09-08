@extends('layouts.app')
    @section('style')

        <link rel="stylesheet" href="{{ asset('css/payment.css')}}">
        @if (LaravelLocalization::getCurrentLocale() == 'ar')
            <link rel="stylesheet" href="{{ asset('css/payment_ar.css') }}">
            <style>
              .will-get {
                  right: 140px !important;
              }
            </style>
        @endif
    @endsection

  
@section('content')
  


    <!-- payment -->


    <section>
        <div class="container">
          <div class="contactinfo">
            <div>
              <h2>{{__('Algérie Poste Info')}}</h2>
              <ul class="info">
                <li>
                  <span><img src="{{asset('images/ccp.png')}}" alt=""></span>
                  <span>{{$settings['ccp']}} <br>
                        {{$settings['ccp_name']}} <br>
                        {{$settings['ccp_city']}}
                  </span>
  
                </li>
                <li>
                  <span><img src="{{asset('images/baridimob.png')}}" alt="" style="width: 200px;"></span>
                  <span>{{$settings['baridimob']}}</span>
                </li>
                <li>
                  <span><img src="images/gift-cards/197.webp" alt=""></span>
                  <span>{{currency()->getCurrency('dzd')['exchange_rate']}}dzd = 1$</span>
                </li>
              </ul> 
            </div>
          </div>
          <form action="{{ route('wallet.charge') }}" method="POST" enctype="multipart/form-data">
            @csrf
              <div class="contactForm">
                <h2>{{__('Payment Info')}}</h2>
                <div class="formBox">
                  <div class="inputBox w50">
                    <input type="hidden" name="currency" value="DZD">
                    <input type="number" name="amount" required step="0.0001"  min="180" id="will-send">
                    <span>{{__('you will send Dzd')}}</span>
                  </div>
                  <div class="inputBox w50" style="margin-bottom: 60px !important;">
                    
                    <span>{{__('You will get')}}:</span>
                    <span id="will-get" class="will-get">00$</span>

                  </div>
                  <div class="inputBox w50">
                    <input type="hidden" name="payment_id" value="{{ $payment_id }}">
                    <input type="text" name="" value="{{ $payment_id }}"  disabled >
                    <span class="payment-ID" id="payment-ID">{{__('Your Payment ID')}}</span>
                  </div>
                  <div class="inputBox w50">
                    <span style="top: -10px">{{__('Baridi Mob')}}</span>
                    <span style="top: 15px">{{__('Ccp')}}</span>
                    <input type="radio" name="payment_method" value="baridimob" required>
                    <input type="radio" name="payment_method" value="ccp" required>
                  </div>
                  <div class="inputBox w50">
                    <input type="file" name="img" accept="image/*">
                    <span class="upload-image">{{__('Proof with image')}}</span> 
                </div>
                <div class="inputBox w50">
                      <input type="file" name="pdf" accept="application/pdf">
                    <span class="upload-image">{{__('Proof with Pdf')}}</span> 
                  </div>
                  <div class="inputBox w100" >
                    <span>{{__('Important Note:')}}</span>
                    <span class="important-note">{{__('When you choose to prove the image, it is necessary to write the payment ID on the proof receipt, or the transaction will be rejected')}}</span>
                  </div>
                  <div class="inputBox w100">
                    <input type="submit" value="{{__('Send')}}" id="btn">
                    <span></span>
                  </div>
                </div>
              </div>
          </form>
        </div>

     </section>
    
  
      <!-- End payment -->
  

@endsection

@section('script')
    <script>
      $("#will-send").on("input", function() {
        let willGet = $(this).val() / "{{currency()->getCurrency('dzd')['exchange_rate']}}";
        willGet = willGet.toFixed(3);
       if (willGet >= '1'){
          document.getElementById('will-get').innerText = willGet + '$'; 
       } else {
        document.getElementById('will-get').innerText = '00' + '$'; 
       }
      });
    </script>
@endsection