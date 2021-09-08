@extends('layouts.app')
        @section('style')

        <link rel="stylesheet" href="{{ asset('css/payment.css')}}">
        
        @if (LaravelLocalization::getCurrentLocale() == 'ar')
            <link rel="stylesheet" href="{{ asset('css/payment_ar.css') }}">
            
        @else 
          
        @endif
          <style>
            section .container .contactForm {
                position: absolute;
            }
          </style>
        @endsection

  
@section('content')
  


    <!-- payment -->


    <section>
        <div class="container">
          <div class="contactinfo">
            <div>
              <h2>{{__('Payment from wallet')}}</h2><br>
              <ul class="info">
                <li>
                    <span><img src="{{ asset('images/wallet.svg')}}" alt=""></span>
                    <span>{{__('Wallet Credit')}}: {{ Auth::user()->balanceFloat }}$</span>
    
                  </li>
               
              </ul>
              <h2>{{$cardType->type}}</h2>
              <ul class="info">
                  
                <li>
                  
                    <img src="{{asset('images/'. $cardType->card->cover_image)}}" alt="{{$cardType->type}}" style="width: 100px;border-radius: 10px;">
                    
                </li>
                
              </ul> 
            </div>
          </div>
          <form action="{{ route('buy.card.buy_now') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="quantity" value="{{$data['quantity']}}">
            <input type="hidden" name="total_price" value="{{ $data['price'] }}">
            <input type="hidden" name="cardType_id" value="{{ $cardType->id }}">
            <input type="hidden" name="payment_id" value="{{ $data['payment_id'] }}">
            <input type="hidden" name="currency" value="$">
            <input type="hidden" name="payment_id" value="{{ $data['payment_id'] }}">
            <input type="hidden" name="payment_method" value="wallet">
           
            
              <div class="contactForm">
                <h2>{{__('Payment Info')}}</h2>
                <div class="formBox">
                    <div class="inputBox w50" style="margin-bottom: 60px !important;">
                    
                        <span>{{__('Quantity')}}:</span>
                        <span id="quantity" class="will-get">{{ $data['quantity'] }}</span>
    
                    </div>
                    <div class="inputBox w50" style="margin-bottom: 60px !important;">
                     
                        <span>{{__('Price')}}:</span>
                        <span class="will-get sub-price">{{ $data['price'] }}$‏</span>

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

                    
                 @if (Auth::user()->balanceFloat < $data['price'])
                    <div class="inputBox w100" >
    
                        <span class="important-note">{{__('Not enough money in your wallet')}}!</span>
                    </div>
                 @else 
                    <div class="inputBox w100">
                        <input type="submit" value="Pay Now" id="btn">
                        <span></span>
                    </div>   
                 @endif
                    
               
                 
                  
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