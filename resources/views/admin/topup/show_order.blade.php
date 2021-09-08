@extends('theme.default')
@section('title', $title)
    
@section('content')

</div>

<div class="container-fluid">



    <div class="row">

        <div class="col-lg-6">

            <!-- Top Up Details -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Top Up Details</h6>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-4">Name:</dt>
                        <dd class="col-sm-8">{{$order->topUpAmount->topUp->title_en}}</dd>
                      
                        <dt class="col-sm-4">Amount:</dt>
                        <dd class="col-sm-8">{{$order->topUpAmount->amount}}</dd>

                        <dt class="col-sm-4">Price:</dt>
                        <dd class="col-sm-8">{{$order->topUpAmount->price}}$</dd>

                        <dt class="col-sm-4">Merchant Price:</dt>
                        <dd class="col-sm-8">{{$order->topUpAmount->merchant_price}}$</dd>
                      </dl>

                </div>
            </div>

            {{-- Top Up Information --}}
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Top Up Information</h6>
                </div>
                <div class="card-body">
         
                        <dl class="row">
                            @foreach ($order->orderDetails as $row)
                                <dt class="col-sm-4">{{$row->name}}:</dt>
                                <dd class="col-sm-8">{{$row->value}}</dd>
                            @endforeach
                        </dl>
               
                </div>
            </div>


            <!-- User Details -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">User Details</h6>
                </div>
                <div class="card-body">
                    @isset($user)
                        <dl class="row">
                            <dt class="col-sm-4">Name:</dt>
                            <dd class="col-sm-8">{{$user->name}}</dd>
                        
                            

                            <dt class="col-sm-4">E-mail:</dt>
                            <dd class="col-sm-8">{{$user->email}}</dd>

                            <dt class="col-sm-4">Status:</dt>
                            <dd class="col-sm-8">
                                <a class="btn btn-info btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-info-circle"></i>
                                    </span>
                                    
                                    <span class="text">{{$user->isMerchant() ? 'Merchant' : 'Normal Customer'}}</span>
                                </a>
                            </dd>


                        </dl>
                    @else 
                        <a class="btn btn-info btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-info-circle"></i>
                            </span>
                            
                            <span class="text">Guest</span>
                        </a>
                    @endisset
                    
                </div>
            </div>

        </div>

        <div class="col-lg-6">

            {{-- Order Details --}}
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Order Details</h6>
                </div>
                <div class="card-body">
                    <dl class="row">

                        <dt class="col-sm-5">Date:</dt>
                        <dd class="col-sm-7">{{$order->created_at}}</dd>

                        <dt class="col-sm-5">Email:</dt>
                        <dd class="col-sm-7">{{$order->email}}</dd>
                      
                        <dt class="col-sm-5">Payment Method:</dt>
                        <dd class="col-sm-7">{{$order->payment_method}}</dd>

                        <dt class="col-sm-5">Quantity:</dt>
                        <dd class="col-sm-7">{{$order->quantity}}</dd>

                        @if ($order->coupon != null)
                            <dt class="col-sm-5">Coupon:</dt>
                            <dd class="col-sm-7 " style="color:blue">{{$order->coupon}}</dd>
                        @endif

                        <dt class="col-sm-5">Total Price:</dt>
                        <dd class="col-sm-7 " style="color:green">{{$order->price}}{{$order->currency}}</dd>
                        @isset ($order->img)
                            <dt class="col-sm-5">Image:</dt>
                            <dd class="col-sm-7">
                                <a href="{{ route('admin.order.img', $order->img) }}" class="btn btn-info btn-sm mb-2" title="Download Img" >
                                    <i class="fas fa-download"></i>
                                </a>
                            </dd>
                        @endif
                        
                        @isset ($order->pdf)
                            <dt class="col-sm-5">Pdf:</dt>
                            <dd class="col-sm-7">
                                <a href="{{ route('admin.order.pdf', $order->pdf ) }}" class="btn btn-info btn-sm mb-2" title="Download Pdf" >
                                    <i class="fas fa-download"></i>
                                </a>    
                            </dd>
                        @endif
                        

                        

                        <dt class="col-sm-5">Payment ID:</dt>
                        <dd class="col-sm-7">{{$order->payment_id }}</dd>
                        
                        <dt class="col-sm-5">Payment Status:</dt>
                        
                            @switch($order->payment_status)
    
                                @case(1)
                                    <dd class="col-sm-6 badge bg-success text-white">
                                        paid
                                    </dd>
                                    @break
                                @case(2)
                                    <dd class="col-sm-6 badge bg-warning text-white">
                                        Awaiting your approval
                                        <a href="{{ route('admin.order.paymentConfirem', $order->id ) }}" class="btn btn-success btn-sm mb-2" title="Download Pdf" >
                                            <i class="fas fa-check-circle"></i>
                                        </a> 
                                        <a href="{{ route('admin.order.paymentUnConfirem', $order->id ) }}" class="btn btn-danger btn-sm mb-2" title="Download Pdf" >
                                            <i class="fas fa-check-circle"></i>
                                        </a> 
                                    </dd>
                                      
                                    @break
                                @case(3)
                                    <dd class="col-sm-6 badge bg-danger text-white">
                                        failed
                                        <a href="{{ route('admin.order.paymentConfirem', $order->id ) }}" class="btn btn-success btn-sm mb-2" title="Download Pdf" >
                                            <i class="fas fa-check-circle"></i>
                                        </a> 
                                     
                                    </dd>
                                      
                                    @break
                                    
                            @endswitch
                        

                            @if ($order->status != 0)
                                @switch($order->status)
                                    @case(1)
                                    <dt class="col-sm-5">Status:</dt>
                                    <dd class="col-sm-6 badge bg-success text-white">confiremed</dd>
                                        @break
                                    @case(2)
                                    <dt class="col-sm-5">Status:</dt>
                                    <dd class="col-sm-6 badge bg-danger text-white">failed</dd>
                                        @break
                                        
                                @endswitch
                            @endif
                            
                      </dl>
                </div>
            </div>

            {{-- Actions --}}
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Action</h6>
                </div>
                <div class="card-body">
                    @if ($order->status != 2)
                        <a href="{{ route('admin.order.unconfirem', $order->id) }}" class="btn btn-danger btn-block">
                            <i class="fab fa-check-circlefa-fw"></i>
                            Charging failed
                        </a>
                    @endif
                    
                    @if ($order->status != 1)
                        <a href="{{ route('admin.order.confirem', $order->id) }}" class="btn btn-success btn-block">
                            <i class="fab fa-check-circlefa-fw"></i>
                            Charged 
                        </a>
                    @endif
                   

                </div>
            </div>
        </div>

    </div>

</div>


@endsection

@section('script')


<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>    
<script>
    $(document).ready(function() {
        $('.summernote').summernote();
    });
</script>


@endsection