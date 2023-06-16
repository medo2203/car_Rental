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
                <form action="{{ route('Cars.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-2">
                        <input type="text" name="brand" placeholder="Car's Brand" class="form-control"
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-2">
                        <input type="text" name="model" placeholder="Car' Model" class="form-control"
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-2">
                        <input type="number" name="year" placeholder="Car's Year" class="form-control"
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <select class="form-select mb-2 color-select" title="Select a color" name="color">
                        <option value="" disabled selected>-- Pick a color --</option>
                        <option style="background-color:#000;color:white;height:60px;">Black</option>
                        <option style="background-color:#fff;height:60px;">White</option>
                        <option style="background-color:#C0C0C0;color:white;height:10px;">Silver</option>
                        <option style="background-color:#808080;color:white;height:60px;">Gray</option>
                        <option style="background-color:#FF0000;color:white;height:60px;">Red</option>
                        <option style="background-color:#0000FF;color:white;height:60px;">Blue</option>
                        <option style="background-color:#964B00;color:white;height:60px;">Brown</option>
                        <option style="background-color:#008000;color:white;height:60px;">Green</option>
                        <option style="background-color:#FFFF00;height:60px;">Yellow</option>
                    </select>
                    {{-- <input type="color" name="" id=""> --}}
                    <select class="form-select mb-2" data-style="btn-primary" name="body_type" title="Select a car type">
                        <option value="" disabled selected>-- Car's type --</option>
                        <option value="sedan">Sedan</option>
                        <option value="suv">SUV</option>
                        <option value="pickup">Pickup Truck</option>
                        <option value="van">Van</option>
                        <option value="coupe">Coupe</option>
                        <option value="hatchback">Hatchback</option>
                        <option value="convertible">Convertible</option>
                        <option value="minivan">Minivan</option>
                    </select>
                    <select class="form-select mb-2" aria-label="Default select example" name="fuel_type">
                        <option value="" disabled selected>-- Car's Fuel type --</option>
                        <option value="Gasoline">Gasoline</option>
                        <option value="Diesel Fuel">Diesel</option>
                    </select>
                    <select class="form-select mb-2" name="transmission_type" aria-label="Default select example">
                        <option value="" disabled selected>--Car's Transmission Type--</option>
                        <option value="Manual transmissions">Manual transmissions</option>
                        <option value="Automatic transmissions">Automatic transmissions</option>
                    </select>
                    <div class="input-group mb-2">
                        <input type="text" placeholder="Car's Mileage" name="mileage" class="form-control"
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-2">
                        <input type="text" placeholder="Daily renting price" name="price" class="form-control"
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
                        <button class="btn btn-primary col" type="submit">Add car</button>
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
