@extends('layouts.app')
@section('content')
<head>
    <link rel="stylesheet" href="css/cars.css">
</head>
{{-- <div class="container"> --}}
    <div class="left">
        <div class="top">
            <h4>Filter</h4>
            <div class="types">
                <div class="types-top">
                    <div class="type">1</div>
                    <div class="type">2</div>
                    <div class="type">3</div>
                    <div class="type">4</div>
                </div>
                <div class="types-bottom">
                    <div class="type">5</div>
                    <div class="type">6</div>
                    <div class="type">7</div>
                    <div class="type">8</div>
                </div>
            </div>
        </div>
        <div class="bottom">

        </div>
    </div>
    <div class="right">
        <div class="cars-container">

        </div>
    </div>
    {{-- @if($cars->count() > 0)
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
    @endif --}}
    
{{-- </div> --}}
@endsection
