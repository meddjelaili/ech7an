
@component('mail::layout')
{{-- Header --}}
@slot ('header')

@endslot

@component('mail::message')

@component('mail::panel')
# Hi dear customer!

Your order {{$order->payment_id}} has been created and paid via {{$order->payment_method}}.
@endcomponent

@component('mail::panel')
# Your Product :
 {{$order->topUpAmount->amount}} 
@endcomponent
@component('mail::panel')

@component('mail::table')
#your info
@component('mail::panel')
@foreach ($order->orderDetails as $row)
### {{$row->name.': '.$row->value}}
@endforeach
@endcomponent

## Quantity: {{$order->quantity}}
# TOTAL: {{$order->price.$order->currency}}
@if ($order->status == 1)
# STATUS: <span style="color:green">success</span>.
@else 
# STATUS: <span style="color:red">Failed</span>.
@endif
@endcomponent
@endcomponent








Thanks,<br>
{{ config('app.name') }}
@endcomponent



{{-- Footer --}}
@slot ('footer')

@endslot
@endcomponent
