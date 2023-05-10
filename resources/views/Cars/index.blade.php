@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-center">
    @if($cars->count() > 0)
        @foreach ($cars as $car)
            <div class="card m-3 p-3">
                <div class="card-img">{{$car->brand}}</div>
                <div class="card-body">
                    <h3>{{$car->model}}</h3>
                    <h3>{{$car->price}}</h3>
                    <a href="{{route('Cars.show', $car->id)}}">
                        <button class="btn btn-success">show more</button>
                    </a>   
                </div>
            </div>
        @endforeach
    @else
        <p>No cars found</p>
    @endif
    
</div>
@endsection
