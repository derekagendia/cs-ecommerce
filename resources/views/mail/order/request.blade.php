@component('mail::message')
# Invoice Receive

Thank you for your order

Here is you receipt

<table class="table">
    <thead>
    <tr>
        <th>Product name</th>
        <th>quantity</th>
        <th>price</th>
    </tr>
    </thead>
    <tbody>
    @foreach($order->items as $item)
        <tr>
            <td scope="row">{{ $item->name }}</td>
            <td>{{ $item->pivot->quantity }}</td>
            <td>{{ $item->pivot->price }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

Total : {{$order->grand_total}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
