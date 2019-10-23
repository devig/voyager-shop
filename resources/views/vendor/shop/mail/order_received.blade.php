@component('mail::message')
We received your payment and order.

@component('mail::table')
| Attribute | Value |
|:---------:|:-----:|
| Amount | {{ $Payment->currency->sign }} {{ $Payment->amount }} |
| Payment Method | {{ $Payment->payment_method }} |
@endcomponent

@component('mail::table')
@if ($OrderItem ?? null)
    | ID | Title | Price |
    |:--:|:-----:|:-----:|
@endif

@foreach ($OrderItems ?? [] as $OrderItem)
    | $OrderItem->productVariant->id | $OrderItem->productVariant->title | $OrderItem->price_gross |
@endforeach
@endcomponent

@endcomponent