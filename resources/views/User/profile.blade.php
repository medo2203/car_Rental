<!-- resources/views/profile.blade.php -->
@extends('layouts.app')

@section('content')
    <style>
        .gradient-custom {
            /* fallback for old browsers */
            background: #f6d365;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right bottom,#275fb4, #0082c4, #00a1c7, #55bdc6, #95d6c9);

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right bottom, #275fb4, #0082c4, #00a1c7, #55bdc6, #95d6c9)
        }
        #edit_button{
            text-decoration: none;
            color: white;
        }
        #edit_button :hover{
            text-shadow: 0px 0px 10px white;
        }
        #edit{
            font-family::sans-serif;
        }
    </style>
    <section style="background-color: #f4f5f7;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-6 mb-4 mb-lg-0">
                    <div class="card mb-3" style="border-radius: .5rem;">
                        <div class="row g-0">
                            <div class="col-md-4 gradient-custom text-center text-white"
                                style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                <img src="{{ asset(Auth::user()->photo)}}" alt="{{ Auth::user()->fullName }}" class="img-fluid mb-2" style="width: 100%;" >
                                <h5>{{Auth::user()->name}}</h5>
                                <a id="edit_button" href="{{route('User.edit', Auth::user()->id)}}">
                                    <span id="edit"><i class="far fa-edit mb-5"></i> Edit your profile</span>
                                </a>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-4">
                                    <h6>Information</h6>
                                    <hr class="mt-0 mb-4">
                                    <div class="col-6 mb-3">
                                        <h6>Full name</h6>
                                        <p class="text-muted">{{ Auth::user()->fullName ?? 'Not set' }}</p>
                                    </div>
                                    <div class="row pt-1">
                                        <div class="col-8 mb-2">
                                            <h6>Email</h6>
                                            <p class="text-muted">{{Auth::user()->email}}</p>
                                        </div>
                                    </div>  
                                    <div class="row pt-1">
                                        <div class="col-6 mb-2">
                                            <h6>Age</h6>
                                            <p class="text-muted">{{ Auth::user()->age ?? 'Not set' }}</p>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <h6>CIN</h6>
                                            <p class="text-muted">{{ Auth::user()->CIN ?? 'Not set' }}</p>
                                        </div>
                                    </div>
                                    <a href="{{ route('Orders.show', Auth::user()->id ) }}">
                                        <button class="btn btn-outline-primary">
                                            View Orders
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
