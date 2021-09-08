@extends('layouts.app')
    @section('style')

        <link rel="stylesheet" href="{{ asset('css/payment.css')}}">
        @if (LaravelLocalization::getCurrentLocale() == 'ar')
            <link rel="stylesheet" href="{{ asset('css/payment_ar.css') }}">
        @endif
        <style>
            section .container .contactinfo .info li {
                display: block;
                width: 260px !important;
            }
            section .container .contactinfo .info li span:nth-child(1) img {
                max-width: 60%;
            }
        </style>
    @endsection

  
@section('content')
  


    <!-- payment -->


    <section>
        <div class="container">
          <div class="contactinfo">
            <div>
              <h2 style="font-size: 21px">{{__('Paysera Wallet Info')}}</h2>
              <ul class="info">
                <li>
                  <span><img src="{{asset('images/paysera.svg')}}" alt=""></span>         
                </li>

                <li>
                  <span style="color:#cac5c5">Account:</span>
                  <span>{{$settings['paysera_wallet_acount']}}</span>
                </li>
                <li>
                  <span style="color:#cac5c5">Address:</span>
                  <span>{{$settings['paysera_wallet_address']}}</span>
                </li>
                  <li>
                    <span style="color:#cac5c5">SWIF:</span>
                    <span>{{$settings['paysera_wallet_swif']}}</span>
                  </li>
                  <li>
                      <span style="color:#cac5c5">IBAN:</span>
                      <span>{{$settings['paysera_wallet_iban']}}</span>
                  </li>
              </ul>
              <h2 style="font-size: 13px">{{$topUpAmount->amount}}</h2>
              <ul class="info">

                
              </ul> 
            </div>
          </div>
          <form action="{{ route('buy.topup.buy_now') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="quantity" value="{{$data['quantity']}}">
            <input type="hidden" name="total_price" value="{{ $data['price'] }}">
            <input type="hidden" name="topUpAmount_id" value="{{ $topUpAmount->id }}">
            <input type="hidden" name="payment_id" value="{{ $data['payment_id'] }}">
            <input type="hidden" name="currency" value="€‏">
            <input type="hidden" name="payment_method" value="paysera_wallet">
            <input type="hidden" name="payment_id" value="{{ $data['payment_id'] }}">

            
              <div class="contactForm">
                <h2>{{__('Payment Info')}}</h2>
                <div class="formBox">
                    <div class="inputBox w50" style="margin-bottom: 60px !important;">
                    
                        <span>{{__('Quantity')}}:</span>
                        <span id="quantity" class="will-get">{{ $data['quantity'] }}</span>
    
                    </div>
                    <div class="inputBox w50" style="margin-bottom: 60px !important;">
                     
                        <span>{{__('Price')}}:</span>
                        <span class="will-get sub-price">{{ $data['price'] }}€</span>

                    </div>
                
                  
                    <div class="inputBox w50">
                        <input type="file" name="img" accept="image/*">
                        <span class="upload-image">{{__('Proof with image')}}</span> 
                    </div>
                    <div class="inputBox w50">
                          <input type="file" name="pdf" accept="application/pdf">
                          <span class="upload-image">{{__('Proof with Pdf')}}</span> 
                    </div>
                 

                    @auth
                      <input type="hidden" name="email"  value="{{Auth::user()->email}}" >
                    @else     
                      <div class="inputBox w50">
                        <input type="email" name="email"  required>
                        <span>{{__('E-mail')}}</span>
                      </div>
                    @endauth

                    <div class="inputBox w50 mt-1">
                      <input type="text" name="coupon">
                      <span>{{__('Coupon')}}</span>
                    </div>
                    
                    @foreach ($orderDetails as $key => $row)

                        <div class="inputBox w50">
                            <input type="hidden" name="orderDetails[{{$key}}][value]" value="{{$row['value']}}"  required>
                            <input type="hidden" name="orderDetails[{{$key}}][name]" value="{{ $row['name'] }}" >
                        </div> 
                    @endforeach

                    
                 
                  
               
                 
                  <div class="inputBox w100">
                    <input type="submit" value="{{__('Pay Now')}}" id="btn">
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
      
    </script>
@endsection