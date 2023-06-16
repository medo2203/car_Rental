@extends('layouts.app')
@section('content')

    <head>
        <link rel="stylesheet" href="css/cars.css">
    </head>
    {{-- <div class="container"> --}}
    <div class="left">
        <div class="top">
            <div class="types">
                <h5 style="font: lato;font-weight:bold;margin:5px">Car type</h5>
                <div class="types-top">
                    <div class="type"><img src="{{ asset('images/body_type/sedan.png') }}" alt="" width="80px"
                            height="30px"></div>
                    <div class="type"><img src="{{ asset('images/body_type/suv.png') }}" alt=""></div>
                    <div class="type"><img src="{{ asset('images/body_type/hatchback.png') }}" alt=""></div>
                    <div class="type"><img src="{{ asset('images/body_type/coupe.png') }}" alt=""></div>
                </div>
                <div class="types-bottom">
                    <div class="type"><img src="{{ asset('images/body_type/pick-up.png') }}" alt=""></div>
                    <div class="type"><img src="{{ asset('images/body_type/van.png') }}" alt=""></div>
                    <div class="type"><img src="{{ asset('images/body_type/minivan.png') }}" alt=""></div>
                    <div class="type"><img src="{{ asset('images/body_type/convertible.png') }}" alt=""></div>
                </div>
            </div>
        </div>
        <div class="bottom">
            <form action="{{ route('Cars.filter') }}" method="POST">
                @csrf
                <div class="trans d-flex align-items-center flex-column ">
                    <a href="{{ route('Cars.clearFilters') }}" class="btn btn-dark m-2">Clear Filters</a>
                    <h5>Fuel type</h5>
                    <div class="form-check d-flex col-5 justify-content-between">
                        <label class="form-check-label" for="Gasoline">
                            Gasoline
                        </label>
                        <input class="form-check-input" type="checkbox" value="Gasoline" id="Gasoline" name="fuel_type[]">
                    </div>
                    <div class="form-check d-flex col-5 justify-content-between">
                        <label class="form-check-label" for="Diesel">
                            Diesel
                        </label>
                        <input class="form-check-input" type="checkbox" value="Diesel" id="Diesel" name="fuel_type[]">
                    </div>
                </div>
                <div class="transmission">
                    <div class="d-flex flex-column align-items-center mt-4 mb-2 justify-content-center">
                        <div class="form-check col-9 d-flex justify-content-between">
                            <label class="form-check-label" for="Manual">
                                Manual Transmission
                            </label>
                            <input class="form-check-input" value="Manual transmissions" type="radio"
                                name="transmission_type" id="Manual">
                        </div>
                        <div class="form-check col-9 d-flex justify-content-between mb-2">
                            <label class="form-check-label" for="Automatic">
                                Automatic Transmission
                            </label>
                            <input class="form-check-input" value="Automatic transmissions" type="radio"
                                name="transmission_type" id="Automatic">
                        </div>
                        <div class="sbmt d-flex justify-content-center">
                            <button class="btn btn-secondary">Search</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
    </div>
    <div class="right">
        @if ($cars->count() > 0)
            <div class="cars-container">
                @foreach ($cars as $car)
                    <div class="car-card">
                        <div class="img">
                            <img src="{{ asset('storage/' . $car->photo ?? '') }}">
                        </div>
                        <div class="info">
                            <div class="title">
                                <h3>{{ $car->brand }} <strong>{{ $car->model }}</strong></h3>
                            </div>
                            <div class="options-1 d-flex justify-content-between">
                                <div class="tp">{{ $car->year }}</div>
                                <div class="tp">{{ $car->price }}</div>
                            </div>
                            <div class="options-2 d-flex justify-content-between">
                                <div class="tran">{{ $car->transmission_type }}</div>
                                <div class="gas">{{ $car->fuel_type }}</div>
                                <div class="mil">{{ $car->mileage }}</div>
                            </div>
                            <div class="button d-flex justify-content-end">
                                <a href="{{ route('Cars.show', $car->id) }}">
                                    <button class="btn btn-dark">Show more</button>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>No cars found</p>
        @endif
    </div>
@endsection
