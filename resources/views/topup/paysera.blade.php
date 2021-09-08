@extends('layouts.app')
    @section('style')
    <style>
     
    </style>
        <link rel="stylesheet" href="{{ asset('css/payment.css')}}">
       
        @if (LaravelLocalization::getCurrentLocale() == 'ar')
        
           <link rel="stylesheet" href="{{ asset('css/payment_ar.css') }}">
           <style>
             @media (max-width: 1800px ) and (min-width:1010px) {
                    section .container .contactForm {
                    position: absolute !important;
              
                }
             }
           </style>
        @else 
        
          <style>
            section .container .contactForm {
                position: absolute !important;
          
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
              <h2>{{__('Pay With')}}:  <img src="{{asset('images/paysera.svg')}}" alt="" width="200px"></h2><br>
              <h2 style="font-size: 15px">{{$topUpAmount->amount}}</h2>
              <ul class="info">
                <li>
                  
                    <img src="{{asset('images/'. $topUpAmount->topUp->cover_image)}}" alt="" style="width: 140px;border-radius: 10px;">
                    
                </li>
                
              </ul> 
            </div>
          </div>
          <form action="{{ route('buy.topup.buy_now') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="quantity" value="{{$data['quantity']}}">
            <input type="hidden" name="total_price" value="{{ number_format((float)$data['total_price'], 2, '.', '') }}">
            <input type="hidden" name="topUpAmount_id" value="{{ $topUpAmount->id }}">
            <input type="hidden" name="payment_id" value="{{ $data['payment_id'] }}">
            <input type="hidden" name="payment_method" value="{{ $data['payment_method'] }}">
            <input type="hidden" name="currency" value="€‏">
  

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
                    
                    <div class="inputBox w50" style="margin-bottom: 60px !important;">
                        
                        <span>{{__('Tax')}}:</span>
                        <span  class="will-get processing-fees" style="color: red !important">{{ $data['tax'] }}€</span>

                    </div>

                    <div class="inputBox w50" style="margin-bottom: 60px !important;">
                    
                        <span>{{__('Total Price')}}:</span>
                        <span id="total-price" class="will-get total-price" >{{ number_format((float)$data['total_price'], 2, '.', '') }}€</span>

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