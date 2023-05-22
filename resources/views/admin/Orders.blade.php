@extends('layouts.dashboard')
@section('ordersNotification')
@section('ordersNotification')
    {{$orders->count()}}
@endsection
@endsection
@section('controlPanel')
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Full Name</th>
            <th scope="col">Car brand</th>
            <th scope="col">Car model</th>
            <th scope="col">Pick up location</th>
            <th scope="col">Pick up date and time</th>
            <th scope="col">Drop off location</th>
            <th scope="col">Drop off date and time</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
            <tr>
                <td>{{ $order->fullName}}</td>
                <td>{{ $order->brand }}</td>
                <td>{{ $order->model }}</td>
                <td>{{ $order->pick_up_location }}</td>
                <td>{{ $order->pick_up_date }} {{ $order->pick_up_time }}</td>
                <td>{{ $order->drop_off_location }}</td>
                <td>{{ $order->drop_off_date }} {{ $order->drop_off_time }}</td>
                <td>
                    <a href="/approve/{{ $order->id }}">
                        <button class="btn btn-outline-success">Approve</button>
                    </a>
                </td>
            </tr>
        @endforeach

</table>
@endsection
