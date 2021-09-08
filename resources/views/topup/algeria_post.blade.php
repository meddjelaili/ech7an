@extends('layouts.app')
    @section('style')

        <link rel="stylesheet" href="{{ asset('css/payment.css')}}">
        @if (LaravelLocalization::getCurrentLocale() == 'ar')
            <link rel="stylesheet" href="{{ asset('css/payment_ar.css') }}">
        @endif
    @endsection

  
@section('content')
  


    <!-- payment -->


    <section>
        <div class="container">
          <div class="contactinfo">
            <div>
              <h2>{{__('Algérie Poste Info')}}</h2><br>
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
              </ul>
              <h2 style="font-size: 13px">{{$topUpAmount->amount}}</h2>
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
            <input type="hidden" name="total_price" value="{{ $data['price'] }}">
            <input type="hidden" name="topUpAmount_id" value="{{ $topUpAmount->id }}">
            <input type="hidden" name="payment_id" value="{{ $data['payment_id'] }}">
            <input type="hidden" name="currency" value="د.ج‏">
           
            
              <div class="contactForm">
                <h2>{{__('Payment Info')}}</h2>
                <div class="formBox">
                    <div class="inputBox w50" style="margin-bottom: 60px !important;">
                    
                        <span>{{__('Quantity')}}:</span>
                        <span id="quantity" class="will-get">{{ $data['quantity'] }}</span>
    
                    </div>
                    <div class="inputBox w50" style="margin-bottom: 60px !important;">
                     
                        <span>{{__('Price')}}:</span>
                        <span class="will-get sub-price">{{ $data['price'] }}د.ج‏</span>

                    </div>
                    
                    <div class="inputBox w50">
                        <input type="hidden" name="payment_id" value="{{ $data['payment_id'] }}">
                        <input type="text" name="" value="{{ $data['payment_id'] }}"  disabled >
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
                        <span>{{__('Important Note')}} :</span>
                        <span class="important-note">{{__('When you choose to prove the image, it is necessary to write the payment ID on the proof receipt, or the transaction will be rejected')}}</span>
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