<h1>Test</h1>

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