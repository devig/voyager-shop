@component('mail::message')
Payment {{ $Payment->id }} received

@component('mail::table')
| Attribute | Value |
|:---------:|:-----:|
| Amount | {{ $Payment->currency->sign }} {{ $Payment->amount / 100 }} |
| Payment Method | {{ $Payment->payment_method }} |
| State | {{ $Payment->state }} |
| Project | {{ $Payment->project->name }} |
| User | {{ $Payment->user->email }} |
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