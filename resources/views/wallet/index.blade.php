@extends('layouts.app')
    @section('style')

        <link rel="stylesheet" href="{{ asset('css/wallet.css')}}">
        <link rel="stylesheet" href="{{asset('css/model.css')}}">

    @endsection

  
@section('content')
  


        <!-- wallet -->


            
        <div id="wallet">
            <div class="content">
                <div class="inner">
                    <div class="Credit_History_wrp">
                        <div id="user_overview">
                            
                            <div class="balance">
                                <h3>{{__('Your Wallet')}} </h3>
                                <div class="balance_body">
                                    <b class="credits">{{ $user->balanceFloat }}$</b>
                                   {{__('Your wallet balance')}} 
                                    <a  class="btw topup" style="cursor: pointer" onclick="popupToggle();event.preventDefault()">
                                        {{__('Top Up')}}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div id="sub_acc_intro">
                            <article>
                                <h3>{{__('About Account Balance')}}</h3>
                                @if (LaravelLocalization::getCurrentLocale() == 'en')
                                    <p>{{$settings['about_wallet_en']}}</p>
                                @else 
                                    <p>{{$settings['about_wallet_ar']}}</p>
                                @endif
                            </article>
                        </div>
                        <div id="user_acc_filter">
                            <h3>{{__('Transaction History')}}</h3>
                        </div>
                        <div id="user_acc_info">
                            <ul>
                                <li class="title">
                                    <div class="dtime">{{__('Time')}}</div>
                                    <div class="text-center">{{__('Payment Method')}}</div>
                                    <div class="text-center">{{__('Credit in/out')}}</div>
                                    <div class="text-center">{{__('status')}}</div>
                                    <div class="note text-center">{{__('Transaction ID')}}</div>
                                </li>
                                @forelse ($transactions as $transaction)                  
                           
                                    <li>
                                        <div class="dtime">{{ $transaction->created_at }}</div>
                                        <div class="text-center">{{$transaction->meta['payment_method']}}</div>
                                        <div class="text-center">
                                            @if ($transaction->type == 'deposit')
                                                <span class="price out" style="color: green">{{ number_format((float)$transaction->amountFloat, 2, '.', '') }}$</span>
                                            @else 
                                                <span class="price out" style="color: red">{{ number_format((float)$transaction->amountFloat, 2, '.', '') }}$</span>                                                
                                            @endif
                                        </div>
                                        <div class="text-center-centerce">
                                        
                                         @switch($transaction->meta['status'])
                                             @case(1)
                                                <span class="price badge bg-success" >confirmed</span>
                                                 
                                                 @break
                                             @case(2)
                                                <span class="price badge bg-danger" >rejected</span>    
                                                 
                                                 @break
                                             @default
                                                <span class="price badge bg-warning" >Processing</span>    
                                                 
                                         @endswitch
                                           
                                        </div>
                                        <div class="note text-center-centerce">
                                            <p class="text-center mb-0">E#{{ $transaction->id }}</p>
                                        </div>
                                    </li>

                                    @if ($loop->index == 6)
                                        @break
                                    @endif

                                @empty
                                    <p class="text-center ">{{__('Nothing')}}</p>
                                @endforelse
                                
                            </ul>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>


        <!-- End wallet -->

     @include('partials.model_wallet')
      
@endsection

