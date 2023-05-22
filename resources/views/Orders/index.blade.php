<table>
    <thead>
        <tr>
            <th>Car Brand</th>
            <th>pick_up_location</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
            <tr>
                <td>{{ $order->brand }}</td>
                <td>{{ $order->pick_up_location }}</td>
                <td>
                    <a href="{{ route('Orders.edit', $order->id) }}">
                        <button class="btn btn-outline-warning">Edit Order</button>
                    </a>
                </td>
                <td>
                    <a href="/validate/{{ $order->id }}">
                        <button class="btn btn-outline-warning">valider</button>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
