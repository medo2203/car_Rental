@extends('layouts.dashboard')
@section('ordersNotification')
@section('ordersNotification')
    {{ $orders->count() }}
@endsection
@endsection
@section('controlPanel')
<div class="d-flex align-items-center flex-column bg-white" style="height: 100%">
    <div class="m-4">
        <h1>Cars Controle Panel</h1>
    </div>
    <div class="col-8">
        <h4><strong>Current Orders</strong></h4>
        <table class="table table-hover col-6">
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
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->fullName ?? $order->name}}</td>
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
                    <td>
                        <a href="/reject/{{ $order->id }}">
                            <button class="btn btn-outline-danger">Reject</button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
