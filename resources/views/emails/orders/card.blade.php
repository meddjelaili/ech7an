
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
 {{$order->cardType->type}} 
@endcomponent
@component('mail::panel')

@component('mail::table')
| #       | CODE         | SERIAL NUMBER  |
| ------------- |:-------------:| --------:|
@foreach ($order->codes as $key => $code)
| {{$key}}      | {{$code->code}}      | {{$code->serial_number ?? '#'}}      |
@endforeach
## Quantity: {{$order->quantity}}
# TOTAL: {{$order->price.$order->currency}}
@endcomponent
@endcomponent







Thanks,<br>
{{ config('app.name') }}
@endcomponent



{{-- Footer --}}
@slot ('footer')

@endslot
@endcomponent