@extends('layouts.app')
    @section('style')

        <link rel="stylesheet" href="{{ asset('css/payment.css')}}">
        @if (LaravelLocalization::getCurrentLocale() == 'ar')
            <link rel="stylesheet" href="{{ asset('css/payment_ar.css') }}">
        @endif
        <style>
          section .container .contactinfo .info li {
            width: 100% !important;
        }
        </style>
    @endsection

  
@section('content')
  





    <section>
        <div class="container">
          <div class="contactinfo">
            <div>
              <h2>{{__('Upgrade to a merchant account')}}</h2>
              <ul class="info">
                <li>
                  <span></span>
                  @if (LaravelLocalization::getCurrentLocale() == 'ar')
                      <a href="{{ route('page','merchant-account-terms') }}" style="color: #fff">
                        <span>{{$settings['merchant_ar']}}</span>
                      </a>
                  @else 
                    <a href="{{ route('page','merchant-account-terms') }}" style="color: #fff">
                      <span>{{$settings['merchant_en']}}</span>
                    </a>
                  @endif
  
                </li>

              </ul> 
            </div>
          </div>
          <form action="{{ route('merchant.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
              <div class="contactForm">
                <h2>{{__('Your Info')}}</h2>
                <div class="formBox">
                  <div class="inputBox w50">
                    <input type="text" name="full_name" required  id="full_name">
                    <span>{{__('full name')}}</span>
                  </div>
                  <div class="inputBox w50">
                    <input type="text" name="phone" required id="phone">
                    <span>{{__('Phone Number')}}</span>
                  </div>
                  <div class="inputBox w50">
                    <input type="text" name="nationality" required id="nationality">
                    <span>{{__('Nationality')}}</span>
                  </div>
                  <div class="inputBox w50">
                    <input type="text" name="country" required   id="country">
                    <span>{{__('Country')}}</span>
                  </div>
                  <div class="inputBox w50">
                    <input type="text" name="city" required id="city">
                    <span>{{__('City')}}</span>
                  </div>
                  <div class="inputBox w50">
                    <input type="text" name="adress" required id="adress">
                    <span>{{__('Adress')}}</span>
                  </div>
                  <div class="inputBox w50">
                    <input type="text" name="website"  id="website" >
                    <span>{{__('Website')}}</span>
                  </div>
                  <div class="inputBox w50">
                    <input type="email" name="email"  id="email" value="{{ Auth::user()->email }}" disabled>
                    <span class="payment-ID">{{__('E-mail')}}</span>
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
    
  
  
  

@endsection

