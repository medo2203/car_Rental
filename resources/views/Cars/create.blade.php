@extends('layouts.app')
@section('cdns')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
@endsection
@section('content')
    <div class="d-flex justify-content-center">
        <div class="col-4 card" style="width:500px">
            <div class="card-header d-flex justify-content-center">
                    <h1> Add a CAR </h1>
            </div>
            <div class="card-body">
                <form action="{{route('Cars.store')}}" method="post">
                    @csrf
                    <div class="input-group mb-2">
                        <input type="text" name="brand" placeholder="Car's Brand" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-2">
                        <input type="text" name="model" placeholder="Car' Model" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-2">
                        <input type="number" name="year" placeholder="Car's Year" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <label for="color" style="display: inline-block;width:100px" class="mb-2">Car's color</label>
                    <select class="mb-2" title="Select a color" name="color" style="text-align: center">
                        <option value="">--pick a color--</option>
                        <option style='background-color:#000;color:white'>Black</option>
                        <option style='background-color:#fff'>White</option>
                        <option style='background-color:#C0C0C0;color:white' value="Silver">Silver</option>
                        <option style='background-color:#808080;color:white' value="Gray">Gray</option>
                        <option style='background-color:#FF0000;color:white' value="Red">Red</option>
                        <option style='background-color:#0000FF;color:white' value="Blue">Blue</option>
                        <option style='background-color:#964B00;color:white' value="Brown">Brown</option>
                        <option style='background-color:#008000;color:white' value="Green">Green</option>
                        <option style='background-color:#FFFF00'>Yellow</option>
                    </select>      
                    {{-- <input type="color" name="" id=""> --}}
                    <select class="form-select mb-2" data-style="btn-primary" name="body_type" title="Select a car type">
                        <option value="sedan"><img src="/path/to/sedan.png"> Sedan</option>
                        <option value="suv"><img src="/path/to/suv.png"> SUV</option>
                        <option value="pickup"><img src="/path/to/pickup.png"> Pickup Truck</option>
                        <option value="van"><img src="/path/to/van.png"> Van</option>
                        <option value="coupe"><img src="/path/to/coupe.png"> Coupe</option>
                        <option value="hatchback"><img src="/path/to/hatchback.png"> Hatchback</option>
                        <option value="convertible"><img src="/path/to/convertible.png"> Convertible</option>
                        <option value="minivan"><img src="/path/to/minivan.png"> Minivan</option>
                        <option value="crossover"><img src="/path/to/crossover.png"> Crossover</option>
                    </select>                                         
                    <select class="form-select mb-2" aria-label="Default select example" name="fuel_type">
                        <option value="">--Car's Fuel type--</option>
                        <option value="Gasoline">Gasoline</option>
                        <option value="Diesel Fuel">Diesel Fuel</option>
                    </select>
                    <select class="form-select mb-2" name="transmission_type" aria-label="Default select example" >
                        <option value="">--Car's Transmission Type--</option>
                        <option value="Manual transmissions">Manual transmissions</option>
                        <option value="Automatic transmissions">Automatic transmissions</option>
                    </select>
                    <div class="input-group mb-2">
                        <input type="text" placeholder="Car's Mileage" name="mileage" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-2">
                        <input type="text" placeholder="Car's Price" name="price" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <input type="file" name="" id="">
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-primary" type="submit">Add car</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    @endpush
@endsection