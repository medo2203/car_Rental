@extends('layouts.dashboard')
@section('controlPanel')
    <a href="{{route('tomobilat.index')}}">
        <button class="btn btn-warning m-2" style="position: absolute;width:100px">Back</i></button>
    </a>
    <div class="d-flex  align-items-center flex-column pt-4 bg-white" style="height: 100%">
        <div class="titles m-4">
            <h1> Add a Car </h1>
        </div>
        <div style="width:80%" class="d-flex justify-content-center align-items-center">
            <div style="width:40%">
                <form action="{{ route('Cars.update', $car->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="input-group mb-2">
                        <input value="{{$car->brand}}" type="text" name="brand" placeholder="Car's Brand" class="form-control"
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-2">
                        <input value="{{$car->model}}" type="text" name="model" placeholder="Car' Model" class="form-control"
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-2">
                        <input value="{{$car->year}}" type="number" name="year" placeholder="Car's Year" class="form-control"
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <select class="form-select mb-2 color-select" title="Select a color" name="color">
                        <option value="" disabled>-- Pick a color --</option>
                        <option style="background-color:#000;color:white;height:60px;" {{$car->color === 'Black' ? 'selected' : ''}}>Black</option>
                        <option style="background-color:#fff;height:60px;" {{$car->color === 'White' ? 'selected' : ''}}>White</option>
                        <option style="background-color:#C0C0C0;color:white;height:10px;" {{$car->color === 'Silver' ? 'selected' : ''}}>Silver</option>
                        <option style="background-color:#808080;color:white;height:60px;" {{$car->color === 'Gray' ? 'selected' : ''}}>Gray</option>
                        <option style="background-color:#FF0000;color:white;height:60px;" {{$car->color === 'Red' ? 'selected' : ''}}>Red</option>
                        <option style="background-color:#0000FF;color:white;height:60px;" {{$car->color === 'Blue' ? 'selected' : ''}}>Blue</option>
                        <option style="background-color:#964B00;color:white;height:60px;" {{$car->color === 'Brown' ? 'selected' : ''}}>Brown</option>
                        <option style="background-color:#008000;color:white;height:60px;" {{$car->color === 'Green' ? 'selected' : ''}}>Green</option>
                        <option style="background-color:#FFFF00;height:60px;" {{$car->color === 'Yellow' ? 'selected' : ''}}>Yellow</option>
                    </select>
                    <select class="form-select mb-2" data-style="btn-primary" name="body_type" title="Select a car type">
                        <option value="" disabled>-- Car's type --</option>
                        <option value="sedan" {{$car->body_type === 'sedan' ? 'selected' : ''}}>Sedan</option>
                        <option value="suv" {{$car->body_type === 'suv' ? 'selected' : ''}}>SUV</option>
                        <option value="pickup" {{$car->body_type === 'pickup' ? 'selected' : ''}}>Pickup Truck</option>
                        <option value="van" {{$car->body_type === 'van' ? 'selected' : ''}}>Van</option>
                        <option value="coupe" {{$car->body_type === 'coupe' ? 'selected' : ''}}>Coupe</option>
                        <option value="hatchback" {{$car->body_type === 'hatchback' ? 'selected' : ''}}>Hatchback</option>
                        <option value="convertible" {{$car->body_type === 'convertible' ? 'selected' : ''}}>Convertible</option>
                        <option value="minivan" {{$car->body_type === 'minivan' ? 'selected' : ''}}>Minivan</option>
                    </select>
                    
                    <select class="form-select mb-2" aria-label="Default select example" name="fuel_type">
                        <option value="" disabled>-- Car's Fuel type --</option>
                        <option value="Gasoline" {{$car->fuel_type === 'Gasoline' ? 'selected' : ''}}>Gasoline</option>
                        <option value="Diesel Fuel" {{$car->fuel_type === 'Diesel Fuel' ? 'selected' : ''}}>Diesel Fuel</option>
                    </select>
                    
                    <select class="form-select mb-2" name="transmission_type" aria-label="Default select example">
                        <option value="" disabled selected>-- Car's Transmission Type --</option>
                        <option value="Manual transmissions" {{$car->transmission_type === 'Manual transmissions' ? 'selected' : ''}}>Manual transmissions</option>
                        <option value="Automatic transmissions" {{$car->transmission_type === 'Automatic transmissions' ? 'selected' : ''}}>Automatic transmissions</option>
                    </select>
                    <div class="input-group mb-2">
                        <input value="{{$car->mileage}}" type="text" placeholder="Car's Mileage" name="mileage" class="form-control"
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-2">
                        <input value="{{$car->price}}" type="text" placeholder="Daily renting price" name="price" class="form-control"
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-2">
                        <label for="photo" class="btn btn-outline-dark col" id="custom-file-input">
                            Upload car Image
                            <input id="photo" class="@error('photo') is-invalid @enderror" type="file"
                                name="photo" class="form-control-file" style="display: none"
                                onchange="checkImageUpload(this)">
                        </label>
                        @error('photo')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-warning col" type="submit">Edit car</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function updateLabelText(input) {
            const label = document.getElementById('custom-file-input');
            if (input.files.length > 0) {
                label.textContent = input.files[0].name;
            } else {
                label.textContent = 'Choose a file';
            }
        }
    </script>
@endsection
