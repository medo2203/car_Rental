@extends('layouts.dashboard')
@section('ordersNotification')
@endsection
@section('controlPanel')
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">brand</th>
            <th scope="col">model</th>
            <th scope="col">Car model</th>
            <th scope="col">Pick up location</th>
            <th scope="col">Pick up date and time</th>
            <th scope="col">Drop off location</th>
            <th scope="col">Drop off date and time</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cars as $car)
            <tr>
                <td>{{ $car->brand}}</td>
                <td>{{ $car->model }}</td>
                <td>{{ $car->carId->count() }}</td>
                {{-- <td>{{ $car->model }}</td>
                <td>{{ $car->pick_up_location }}</td>
                <td>{{ $car->pick_up_date }} {{ $car->pick_up_time }}</td>
                <td>{{ $car->drop_off_location }}</td>
                <td>{{ $car->drop_off_date }} {{ $order->drop_off_time }}</td> --}}
                {{-- <td>
                    <a href="/approve/{{ $order->id }}">
                        <button class="btn btn-outline-success">Approve</button>
                    </a>
                </td> --}}
            </tr>
        @endforeach

</table>
@endsection
