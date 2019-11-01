<h1>Invoice</h1>

{{-- Section for Charges --}}
@if (!$Payment->order && !$Payment->productVariant)
<table>
    <tr>
        <th>Description</th>
        <th>Amount</th>
    </tr>
    <tr>
        <td>{{ $Payment->description }}</td>
        <td>{{ $Payment->currency->sign }} {{ $Payment->amount/100 }}</td>
    </tr>
</table>
@endif

{{-- Section for OrderItems --}}
@if ($Payment->order)

    <table>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Amount</th>
        </tr>
    @foreach ($Payment->order->orderItems as $OrderItem)
        <tr>
            <td>{{ $OrderItem->productVariant->name }}</td>
            <td>{{ $OrderItem->quantity }}</td>
            <td>{{ $Payment->currency->sign }} {{ $OrderItem->price_gross }}</td>
        </tr>
    @endforeach
    </table>
@endif