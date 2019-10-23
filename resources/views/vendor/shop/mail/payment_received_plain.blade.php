# Payment {{ $Payment->id }} received

@if ($OrderItem ?? null)
    ID, Title, Price
@endif

@foreach ($OrderItems ?? [] as $OrderItem)
   $OrderItem->productVariant->id, $OrderItem->productVariant->title, $OrderItem->price_gross
@endforeach