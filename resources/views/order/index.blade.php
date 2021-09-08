@extends('layouts.app')
    @section('style')

        <style>
            .active 
            { 
                display: block !important;
            }
        </style>

    @endsection

  
@section('content')
  


       
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 pt-5" style="margin: 120px 0 100px 0;">
                <h2 class="mt-3 text-center">{{__('Your Orders')}}</h2>

                @forelse ($orders as $order)
                    
                        <div class="row z-depth-3 justify-content-center bg-white border rounded my-4" > 
                            
                                <div class="row">
                                    <div class="col-md-8 pt-3">
                                        <b class="font-weight-bold">
                                            {{__('Order ID')}}
                                        </b>
                                        <span  style="color: green;font-weight:bold">E#{{ $order->id }}</span>
                                        <b class="font-weight-bold">
                                            | {{__('Payment ID')}}
                                        </b>
                                        <span  style="color: green;font-weight:bold">{{ $order->payment_id }}</span>
                                        <p class="text-muted">{{__('Created on')}} {{$order->created_at}}</p>
                                    </div>
                                    <div class="col-md-4 pt-3">
                                        <b class="font-weight-bold">
                                            {{__('Total')}}
                                        </b>
                                        <span  style="color: green;font-weight:bold">{{$order->price.$order->currency}}</span>
                                        <p class="text-muted mb-0">{{$order->payment_method}}</p>
                                        @if ($order->coupon != null)
                                            <b class="font-weight-bold">
                                                {{__('Coupon:')}}
                                            </b>
                                            <span  style="color: red;font-weight:bold">{{$order->coupon}}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row border-top py-2">

                                    <div class="col-3 col-md-1">
                                        @if ($order->topUpAmount_id != null)
                                            <img src="{{ asset('images/'. $order->topUp()->cover_image) }}" alt="" class="img-thumbnail" style="
                                                                                                                            width: 60px;
                                                                                                                            height: 50px;
                                                                                                                            border-radius:10px" >
                                         @elseif($order->cardType_id != null)    
                                            <img src="{{ asset('images/'. $order->card()->cover_image) }}" alt="" class="img-thumbnail" style="
                                                                                                                                                    width: 60px;
                                                                                                                                                    height: 50px;
                                                                                                                                                    border-radius:10px" >
                                        @endif
                                        
                                    </div>

                                    <div class="col-9 col-md-7 border-end px-2">
                                        <b class="font-weight-bold">
                                            @if ($order->topUpAmount_id != null)
                                                @if (LaravelLocalization::getCurrentLocale() == 'ar')
                                                    {{ $order->topUp()->title_ar }}
                                                @else 
                                                    {{ $order->topUp()->title_en }}
                                                @endif
                                                @elseif($order->cardType_id != null)       
                                                @if (LaravelLocalization::getCurrentLocale() == 'ar')
                                                    {{ $order->card()->title_ar }}
                                                @else 
                                                    {{ $order->card()->title_en }}
                                                @endif

                                            @endif
                                           
                                        </b>
                                        <p class="text-muted">
                                            @if ($order->topUpAmount_id != null)
                                                {{$order->topUpAmount->amount}}
                                            @else     
                                                {{$order->cardType->type}}
                                            @endif
                                        </p>
                                    </div>

                                    <div class="col-7 col-md-2 ">
                                        <b class="font-weight-bold text-center">
                                            {{__('Quantity')}}
                                        </b>
                                        <span class="text-muted">{{ $order->quantity }}</span>
                                        @switch($order->payment_status)
                                            @case(1)
                                                    <p class="text-muted">{{__('paid')}}</p>
                                                @break
                                            @case(2)
                                                    <p class="text-muted">{{__('Processing in progress!')}}</p>
                                            @break
                                                @default
                                                <p class="text-muted">{{__('rejected')}}</p>
                                        @endswitch
                                    </div>

                                    <div class="col-5 col-md-2">
                                        <b class="font-weight-bold" style="color: green">
                                                    @switch($order->status)
                                            @case(1)
                                                <b class="font-weight-bold" style="color: green">{{__('Confiremed')}}</b>
                                                @break
                                            @case(2)
                                                <b class="font-weight-bold" style="color: red">{{__('Failed')}}</b>
                                                @break
                                              @default
                                              @if ($order->payment_status == 1 || $order->payment_status == 2)
                                                    <b class="font-weight-bold" style="color: rgb(129, 128, 51)">{{__('Processing in progress!')}}</b>
                                              @else    
                                                    <b class="font-weight-bold" style="color: red">{{__('rejected')}}</b>
                                                @endif

                                        @endswitch
                                        </b>
                                        @if ($order->status == 1 && $order->cardType != null)
                                            <a class="btn btn-warning" onclick="showDetails('details{{$order->id}}');event.preventDefault()"><i class="fa fa-eye"></i></a>                                            
                                        @endif
                                        @if ($order->topUpAmount != null)
                                            <a class="btn btn-warning" onclick="showDetails('details{{$order->id}}');event.preventDefault()"><i class="fa fa-eye"></i></a>                                            
                                    
                                        @endif
                                    </div>
                                </div>

                                {{-- card or info topup --}}
                                @if ($order->status == 1  || $order->topUpAmount != null)
                                    <div class="row border-top py-2 bg-light" style="display: none;" id="details{{$order->id}}">

                                        @if ($order->cardType != null)
                                            <div class="table-responsive">
                                                <table class="table align-middle table-striped table-hover table-borderless">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col" class="text-muted">{{__('Card')}}</th>
                                                        <th scope="col" class="text-muted">{{__('Code')}}</th>
                                                        <th scope="col" class="text-muted">{{__('Serial Number')}}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($order->codes as $code)
                                                            <tr>
                                                                <td>{{$order->cardType->type}}</td>
                                                                <td>{{$code->code}}</td>
                                                                <td>{{$code->serial_number ?? '#'}}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @else 
                                            <div class="col-md-12 py-2 d-flex">
                                                @foreach ($order->orderDetails as $row)
                                                    <div class="col-md-5 pt-3">
                                                        <b class="font-weight-bold">
                                                            {{$row->name}}:
                                                        </b>
                                                        <span  style="color: green;font-weight:bold">{{$row->value}}</span>
                                                    </div>
                                                @endforeach
                                            </div>
                                            
                                            
                                        @endif
                                      
                                        
                                
                                            
                                

                                    </div>
                                @endif
                                
                        </div>

                @empty
                    <div class="row z-depth-3 justify-content-center bg-white border rounded my-4" > 
                        {{__('Nothing')}}
                    </div>
                        
                @endforelse

    

    

                {!! $orders->links() !!}
            </div>
                
            </div>
        </div>
    </div>

      
@endsection

@section('script')
    <script>
        function showDetails(id) {
            
            const details = document.getElementById(id);
            details.classList.toggle('active');
            
        }
    </script>
@endsection