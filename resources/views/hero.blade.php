@extends('layouts.app')

@section('content')

    <head>
        <link rel="stylesheet" href="css/hero.css">
    </head>
    <div class="left-container">
        <div class="text">
            <h1 class="title" style="margin: 20px">
                Welcom to <span class="d-" style="font:500 42px lato">AUTO MAROC</span> 
            </h1>
            <h5 style="font-family: lato">
                <span style="margin-left: 80px;"></span>Discover the convenience and flexibility of renting a car with us. Whether you're planning a business trip,
                a family vacation, or a weekend getaway, our reliable and affordable car rental services have got you
                covered.
                Explore your destination on your own terms and enjoy the freedom of having a car at your disposal. Whether
                you're traveling for business or pleasure, we're here to make your journey comfortable and enjoyable.
            </h5>
            <div class="d-flex justify-content-start">
                <button class="btn btn-outline-dark btn-lg m-3">Book now</button>
            </div>
        </div>
    </div>
    <div class="right-container">
        <img src="images/sideaNDLOGOS.png" id="car1" alt="">
    </div>
@endsection
