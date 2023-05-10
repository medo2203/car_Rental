<!-- resources/views/profile.blade.php -->

@extends('layouts.app')

@section('content')
    <style>
        .gradient-custom {
            /* fallback for old browsers */
            background: #f6d365;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right bottom, #275fb4, #0082c4, #00a1c7, #55bdc6, #95d6c9);

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right bottom, #275fb4, #0082c4, #00a1c7, #55bdc6, #95d6c9)
        }

        #edit_button {
            text-decoration: none;
            color: white;
        }

        #edit_button :hover {
            text-shadow: 0px 0px 10px white;
        }

        #edit {
            font-family: :sans-serif;
        }

        input {
            border: none;
            border-bottom: 2px solid #55bdc6;
            outline: none;
            background-color: transparent;
            color: black;
            width: 100%;
        }

        input:focus {
            border-bottom: 2px solid #6FFACB;
        }

        #save {
            background-color: #cce7e1;
            width: 150px;
            height: 40px;
            margin: 10px;
            border: 2px solid white;
            color: #00a1c7;
            border-radius: 10px;
            font: medium sans-serif;
            letter-spacing: 2px;
        }
        #save:hover{
            background-color: #f4f5f7;
            border: 2px solid #cce7e1;
            color: #00a1c7;
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
                            <form method="POST" action="{{ route('User.update',Auth::user()->id ) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <img src="{{ asset(Auth::user()->photo)}}" alt="{{ Auth::user()->fullName }}" class="img-fluid mb-2" style="width: 100%;" >
                                    {{-- <img src="/images/no_image54564_09fkf.png"
                                        alt="Avatar" class="img-fluid mb-2" style="width: 200px;" /> --}}
                                        <div>
                                            <label for="photo" class="btn btn-primary">
                                                Edit profile Image
                                                <input id="photo" type="file" name="photo" class="form-control-file" style="display: none">
                                            </label>
                                            @error('photo')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    <div>
                                        <input type="text" class="@error('username') is-invalid @enderror"
                                        value="{{ old('name') ?? auth()->user()->name }}" required autocomplete="name"
                                        name="username" class="mb-2" autofocus
                                            style="color:white;text-align:center; width:80%;">
                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                        <button id="save" type="submit">Save</button>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body p-4">
                                        <h6>Information</h6>
                                        <hr class="mt-0 mb-4">
                                        <div class="col-12 mb-3">
                                            <h6>Full name</h6>
                                            <input type="text" class="@error('fullName') is-invalid @enderror" name="fullName" value="{{ Auth::user()->fullName ?? 'Not set' }}">
                                            @error('fullName')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="row pt-1">
                                            <div class="col-12 mb-2">
                                                <h6>Email</h6>
                                                <input type="text"class="@error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row pt-1">
                                            <div class="col-6 mb-2">
                                                <h6>Age</h6>
                                                <input type="number" class="@error('age') is-invalid @enderror" name="age" value="{{ Auth::user()->age }}"
                                                    placeholder="Age" style="width:100%">
                                                @error('age')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-6 mb-2">
                                                <h6>CIN</h6>
                                                <input type="text" class="@error('CIN') is-invalid @enderror" name="CIN" value="{{ Auth::user()->CIN ?? 'Not set' }}" style="width:100%">
                                                @error('CIN')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>