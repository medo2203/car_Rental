@foreach ($orders as $order)
    <div>
        <h3>Order ID: {{ $order->id }}</h3>
        <p>Pick-up Location: {{ $order->pick_up_location }}</p>
        <p>Pick-up Date: {{ $order->pick_up_date }}</p>
        <p>Pick-up Time: {{ $order->pick_up_time }}</p>
        <p>Drop-off Location: {{ $order->drop_off_location }}</p>
        <p>Drop-off Date: {{ $order->drop_off_date }}</p>
        <p>Drop-off Time: {{ $order->drop_off_time }}</p>
    </div>
@endforeach
