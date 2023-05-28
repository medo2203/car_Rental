@extends('layouts.app')

@section('content')

    <head>
        <link rel="stylesheet" href="css/hero.css">
    </head>
    <div class="left-container">
        <div class="text">
            <h1 class="title">
                Welcom to 
                <span class="site" style="">AUTO MAROC</span> 
            </h1>
            <h5 style="font-family: lato">
                <span class="marg"></span>Discover the convenience and flexibility of renting a car with us. Whether you're planning a business trip,
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
        <img src="images/front.png" id="car2" alt="">
    </div>
@endsection
