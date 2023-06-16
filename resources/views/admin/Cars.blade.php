@extends('layouts.dashboard')
@section('ordersNotification')
    {{ $orders->count() }}
@endsection
@section('controlPanel')
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
                    <th scope="col" class="text-center">Actions</th>
                </tr>
                @foreach ($cars as $car)
                    <tr>
                        <td>{{ $car->created_at }}</td>
                        <td>{{ $car->brand }}</td>
                        <td>{{ $car->model }}</td>
                        <td>{{ $car->year }}</td>
                        <td class="d-flex justify-content-center">
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
