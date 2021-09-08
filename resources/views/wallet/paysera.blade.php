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
              <h2>{{__('Paysera Wallet Info')}}</h2>
              <ul class="info">
                <li>
                  <span><img src="{{asset('images/paysera.svg')}}" alt=""></span>
                  <span>AVENUE lOUIS 54,Room S52 <br>
                         Brussels<br>
                         1050 <br>
                        Belgium
                  </span>
  
                </li>
                <li>
                  <span style="color:#cac5c5">SWIF:</span>
                  <span>TRWIBEB1XXX</span>
                </li>
                <li>
                    <span style="color:#cac5c5">IBAN:</span>
                    <span>BE30 9671 9649 7411</span>
                </li>
               
               
              </ul> 
            </div>
          </div>
          <form action="{{ route('wallet.charge') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="payment_method" value="paysera">
            <input type="hidden" name="payment_id" value="{{ $payment_id }}">


              <div class="contactForm">
                <h2>{{__('Payment Info')}}</h2>
                <div class="formBox">

                <div class="inputBox w50">
                    <input type="hidden" name="currency" value="EUR">
                    <input type="number" name="amount" required step="0.0001"  min="1" id="will-send">
                    <span>{{__('you will send Euro')}}</span>
                </div>

                <div class="inputBox w50" style="margin-bottom: 60px !important;">
                    <span>{{__('Tax')}}:</span>
                    <span  class="will-get processing-fees" style="color: red !important" id="tax">00€</span>

                </div>

                  <div class="inputBox w50" style="margin-bottom: 60px !important;">
                    
                    <span>{{__('You will get')}}:</span>
                    <span id="will-get" class="will-get">00$</span>

                  </div>

                
                 
              
               
             
                  <div class="inputBox w100">
                    <input type="submit" value="{{__('Buy Now')}}" id="btn">
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
        let willSend = $(this).val() ;
        let tax;
        if (willSend < 10) {

            tax = willSend / 100 + 0.1;

        } else if (willSend >= 10 && willSend < 50) {

            tax = willSend * 2.2 / 100;

        } else {
            tax = 1;
        }

        price_send = willSend - tax;

        let willGet = price_send / "{{currency()->getCurrency('eur')['exchange_rate']}}";
        

 
    if (willGet >= '1'){
            document.getElementById('tax').innerText = tax.toFixed(2) + '€'; 
            document.getElementById('will-get').innerText = willGet.toFixed(2) + '$'; 
        } else {
         document.getElementById('will-get').innerText = '00' + '$'; 
        }
      });
    </script>
@endsection