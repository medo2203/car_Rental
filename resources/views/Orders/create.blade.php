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
                        <input type="date" name="brand" placeholder="name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-2">
                        <input type="text" name="model" placeholder="Car' Model" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
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