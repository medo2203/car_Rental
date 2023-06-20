@extends('layouts.dashboard')
@section('ordersNotification')
    {{ $orders->count() }}
@endsection
@section('controlPanel')
<style>
    .statusDot {
            display: inline-block;
            width: 15px;
            height: 15px;
            border-radius: 50%;
            -webkit-transform: translateY(4px);
            -moz-transform: translateY(4px);
            -ms-transform: translateY(4px);
            -o-transform: translateY(4px);
            transform: translateY(4px);
        }
</style>
    <div class="d-flex align-items-center flex-column bg-white" style="height: 100%">
        <div class="m-4">
            <h1>Cars Controle Panel</h1>
        </div>
        <div class="m-4 text-center">
            <a href="{{ route('Cars.create') }}">
                <button class="btn btn-outline-primary">Add Car</button>
            </a>
        </div>
        <div class="col-8">
            <h4><strong>Cars List</strong></h4>
            <table class="table table-hover col-6">
                <tr>
                    <th scope="col">Added Date & Time</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Model</th>
                    <th scope="col">Year</th>
                    <th scope="col">Status</th>
                    <th scope="col" class="text-center">Actions</th>
                </tr>
                @foreach ($cars as $car)
                    <tr>
                        <td>{{ $car->created_at }}</td>
                        <td>{{ $car->brand }}</td>
                        <td>{{ $car->model }}</td>
                        <td>{{ $car->year }}</td>
                        <td>
                            @if ($car->available)
                                <span class="statusDot" style="background-color: #3ddb3d"></span>
                                Available
                                @else
                                <span class="statusDot" style="background-color: #f82c2c"></span>
                                Unavailable
                            @endif
                        </td>
                        <td class="d-flex justify-content-center">
                            <a href="{{route('availability',$car->id)}}">
                                <button class="btn btn-outline-secondary me-2">Change availability</button>
                            </a>
                            <a href="{{ route('Cars.edit', $car->id) }}" class="me-2">
                                <button class="btn btn-outline-warning">Edit Car</button>
                            </a>
                            <form action="{{ route('Cars.destroy', $car->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">Delete Car</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
