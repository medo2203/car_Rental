<table>
    <thead>
        <tr>
            <th>Car Brand</th>
            <th>pick_up_location</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
            <tr>
                <td>{{ $order->brand }}</td>
                <td>{{ $order->pick_up_location }}</td>
                <td>
                    @if ($order->validated = false)
                        <a href="{{ route('Orders.edit', $order->id) }}">
                            <button class="btn btn-outline-warning">Edit Order</button>
                        </a>
                        <a href="/validate/{{$order->id}}">
                            <button class="btn btn-outline-warning">valider</button>
                        </a>
                    @else
                        this order hase been validated
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
