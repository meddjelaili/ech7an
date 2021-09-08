@extends('layouts.app')
    @section('style')

        <link rel="stylesheet" href="{{asset('css/product.css')}}">

        @if (LaravelLocalization::getCurrentLocale() == 'ar')
            <style>
                .payments img
                {
                    right: -25px;
                }
            </style>
            
    
        @endif
        
    @endsection

  
@section('content')
        <div class="container">
            <div id="pdt_info" data-item-theme="1077">
                <div class="ItemList card">
                    <div class="img">
                        <img class="CardPic" src="{{ asset('images/'.$card->cover_image) }}" alt="{{ $card->title }}" width="120" height="160">
                    </div>
                </div>
                <div class="info">
                    <h1>{{ $card->title }}</h1>
                    <ul class="feature">

                      
                        <li>
                            <b>
                                <i class="fas fa-globe"></i>
                                {{ $card->region }}
                            </b>
                        </li>
                        <li>
                            <b>
                                <i class="fas fa-user-lock"></i>
                                @guest
                                    {{__('Guest')}}
                                @else
                                    {{ auth()->user()->name }}                                    
                                @endguest
                            </b>
                        </li>

                    </ul>
                </div>
              
               
            </div>

            <div id="pdt_note">

                <div class="inner" >
                    <i class="fas fa-info-circle"></i>

                    <div>     {{__('Important Note:')}} <span style="color:red">{{ $card->note  }}</span></div>

                </div>
            </div>



            <form method="POST" action="{{ route('buy.card', $card->slug) }}" >
                @csrf

                <input type="hidden" name="card_id" value="{{ $card->id }}">


                <div class="container">
                    <div class="row">
                        <div class="col-md-8 wrapper">
                            <h3 class="title">{{__('Select Card Type')}}</h3>
                          
                            <div class="box">

                                @foreach ($card->CardTypes->where('status', 0) as  $key => $row)

                                    @auth
                                        @if (Auth::user()->isMerchant())
                                            @php
                                                $original_price = $row->merchant_price;
                                            @endphp
                                        @else 
                                            @php
                                                $original_price = $row->price;
                                            @endphp
                                        @endif
                                    @else 
                                        @php
                                            $original_price = $row->price;
                                        @endphp
                                    @endauth

                                    {{-- !Price Merchant --}}

                                        <input type="radio" 
                                            id="{{$key}}" 
                                            name="cardType_id" 
                                            value="{{ $row->id }}" 
                      
                                            @php
                                                $price = currency($original_price, currency()->config('default'), currency()->getUserCurrency());
                                            @endphp
                                            onchange="handleChange('{{$price}}', '{{$row->codes->count()}}');" 
                                            >
                                
                                    {{-- End !Price Merchant --}}
                                    
                                           
                                           
                                    <label for="{{$key}}" class="option-1 " style="{{ $lang == 'ar' ? 'padding-right: 20px;' : '' }}">
                                        <div class="dot"></div>
                                        <div class="text" style="{{ $lang == 'ar' ? 'padding-right: 10px;padding-left: 0px' : '' }}">
                                            {{ Str::limit($row->type , 70) }}
                              
                                        </div>
                                        
                                    </label>
                                @endforeach

                            </div>
                        </div>
                        <div class="col-md-4 item_function">
                            <div class="calculate">
                                <div class="inner">
                                    <ul class="details">
                                        <li class="total">
                                            <div class="T">{{__('Price')}}</div>
                                                <div class="C">
                                                    <div class="price">
                                                        <span id="totalPrice">0.00</span>
                                                     </div>
                                                </div>
                                        </li>
                                    </ul>
                                    {{-- Quantity --}}

                                        <ul class="details">
                                            <li class="total">
                                                <div class="TQue">{{__('Purchase Quantity')}}</div>
                                                <div id="quantity">
                                                    <input type="number" min="1" name="quantity" class="form-control" value="1" required="" id="input-quantity">
                                                </div>
                                                
                                            </li>
                                        </ul>

                                    {{--End Quantity --}}


                                    {{-- Payment Method --}}
                                    <div class="title">{{__('Payment Method')}}</div>
                                    <ul class="details">
                                        <li class="payments">
                                            @if ($settings['paysera_status'] == 1)
                                                <input type="radio" name="payment_method" id="paysera" value="paysera" required>
                                                <label for="paysera">
                                                    <img src="{{ asset('images/paysera.svg')}}">
                                                </label>
                                            @endif
                                            
                                            @if ($settings['paysera_wallet_status'] == 1)
                                                <input type="radio" name="payment_method" id="paysera_wallet" value="paysera_wallet" required>
                                                <label for="paysera_wallet">
                                                    <img src="{{ asset('paysera_bank2.jpg')}}" style="height: 50px;">
                                                </label>
                                            @endif
                                            
                                        </li>
                                        <li class="payments">
                                            @if ($settings['ccp_status'] == 1)
                                                <input type="radio" name="payment_method" id="ccpbaridimob" value="ccpbaridimob" required>
                                                <label for="ccpbaridimob">
                                                    <img src="{{ asset('images/AlgeriePoste.svg')}}" style="height:50px !important;">
                                                </label>
                                            @endif
                                            
                                            @auth
                                                <input type="radio" name="payment_method" id="wallet" value="wallet" required>
                                                <label for="wallet" style="margin: 10px;">
                                                    <img src="{{ asset('images/wallet.svg')}}">
                                                    <span>{{__('Wallet')}}</span>
                                                </label>
                                            @endauth
                                            
                                        </li>
                                       
                                        
                                        
                                    </ul>
                                    {{-- End Payment Method --}}

                                    <div class="btc">    
                                        <label class="d-grid gap-2" >
                                            <input type="submit" class="btn btn-lg" style="opacity: 1" value="{{__('Buy Now')}}" id="buy" disabled>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>

                    
                
                </div>
            </form>

            <div class="row instruction">
               <div class="container">
                <div class="card card-desc text-center">
                    <div class="card-header">
                      <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item" style="width: auto !important">
                          <a class="nav-link active" aria-current="true" href="#">{{__('Instruction')}}</a>
                        </li>
                  
                      </ul>
                    </div>
                    <div class="card-body" style="text-align: {{ $lang == 'ar' ? 'right' : 'left' }}" >
                            {!! $card->instruction !!}
                    </div>
                  </div>
               </div>
            </div>

            <div class="row">
                <div class="container">
                    <div id="item_instruction">
                        <div id="related_card">
                            <div class="inner">
                            <h3>{!!__('Popular<b> Cards')!!}</b></h3>
                                <ul class="ItemList lazy_container">
                                    @foreach ($popular as $row)
                                        <li>
                                            <a href="{{ route('buy.card',$row->slug) }}" title="{{ $row->title }}">
                                                <div class="img">
                                                    <img class="IconPic" src="{{ asset('images/'.$row->cover_image) }}" alt="{{ $row->title }}" width="60" height="60">
                                                </div>
                                                <div class="T" style="{{ $lang == 'ar' ? 'text-align:right;margin: 0 1em 0 0;' : '' }}">
                                                    <div class="name">
                                                        {{$row->title }}
                                                    </div>
                                                    <div class="info">
                                                        <span>{{ $row->region }}</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                   
                                
                                </ul>
                            </div>
                        </div>
                    </div>
                 
                </div>
            </div>
        </div>
    



    
   
@endsection

@section('script')
    <script>

        function handleChange(price, max) {
            document.getElementById('buy').disabled = false;
            document.getElementById('totalPrice').innerHTML = price;
        }

    </script>
@endsection