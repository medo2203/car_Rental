@extends('layouts.app')
@section('title')
    Register page
@endsection
@section('content')
<head>
    <link rel="stylesheet" href="css/forms.css">
</head>
<div class="form-container">
    <div class="form-card">
        <form method="POST" action="{{ route('register') }}">
            @csrf   
            <div class="form-title">
                <h1>Account Register</h1>
            </div>
            <div class="form-npts">
                <input id="name" type="text" @error('name') is-invalid @enderror name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter your name">
                <input id="email" type="email" @error('email') is-invalid @enderror name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your e-mail">    
                <input id="password" type="password" @error('password') is-invalid @enderror name="password" required autocomplete="new-password" placeholder="Enter a password">    
                <input id="password-confirm" type="password"  name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your password">
            </div>
            <div class="form-button">
                <button type="submit">Create Account</button>
            </div>  
            <div class="form-options" style="margin-top: 45px">
                <p>You already have an account ?<span><a href="{{ route('login') }}"><strong> Log in</strong></a></span></p>
            </div>
        </form>
    </div>
</div>           
@endsection




{{-- @error('name')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror --}}
{{-- @error('email')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror --}}
{{-- @error('password')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror --}}