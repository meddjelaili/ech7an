@extends('layouts.app')
    @section('style')

        <link rel="stylesheet" href="{{asset('css/profile.css')}}">
        <link rel="stylesheet" href="{{asset('css/model.css')}}">
        
        @if (LaravelLocalization::getCurrentLocale() == 'ar')
          
        @endif
    @endsection

  
@section('content')
  


    {{-- Profile --}}

    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 pt-5" style="margin: 120px 0 100px 0;">
                <div class="row z-depth-3"> 
                    <div class="col-sm-4 bg-info rounded-left" style="box-shadow: 0 2px 50px rgba(0, 0, 0, 0.5);">
                        <div class="card-block text-center text-white">
                            <i class="fas fa-user-tie fa-7x mt-5"></i>
                            <h2 class="font-weight-bold mt-4">{{$user->name}}</h2>
                            @if ($user->isMerchant())
                                <p class="text-muted badge bg-warning">{{__('Merchant')}}</p>
                            @else 
                                <p class="text-muted ">{{__('Normal Customer')}}</p>
                                <a  class="btn btn-warning  bg-warning" href="{{ route('merchant.index') }}" style="margin: 0 0 15px;">
                                    {{__('Merchant')}}
                                </a>
                            @endif
                            

                        </div>
                    </div>
                    <div class="col-sm-8 bg-white rounded-right" style="box-shadow: 0 2px 50px 0 rgba(0, 0, 0, 0.5);">
                        <h3 class="mt-3 text-center">{{__('Information')}}</h3>
                        <hr class="badge-primary mt-0 w-25">
                        <div class="row text-center">
                            <div class="col-sm-6 ">
                                <p class="font-weight-bold">
                                    {{__('E-mail')}}:
                                </p>
                                <h6 class="text-muted">{{$user->email}}</h6>
                            </div>
                            <div class="col-sm-6">
                                <p class="font-weight-bold">
                                    {{__('Name')}}:
                                </p>
                                <h6 class="text-muted">{{$user->name}}</h6>
                            </div>
                        </div>
                        <h4 class="mt-3 text-center">{{__('Wallet')}}</h4>
                        <hr class="bg-primary mt-0 w-25">
                        <div class="row text-center">
                            <div class="col-sm-6">
                                <p class="font-weight-bold">
                                    {{__('Your wallet balance')}}:
                                </p>
                                <h6 class="text-muted">{{$user->balanceFloat}}$</h6>
                            </div>
                            <div class="col-sm-6 text-center">
                                <a  class="btw topup" style="cursor: pointer" onclick="popupToggle();event.preventDefault()">
                                    {{__('Top Up')}}
                                </a>
                            </div>
                        </div>
                        <hr class="bg-primary mt-0 w-25">
                       
                    </div>
                </div>
            </div>
        </div>
    </div>



     @include('partials.model_wallet')

@endsection

