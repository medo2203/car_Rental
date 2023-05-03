@extends('layouts.app')

@section('content')
<head>
    <link rel="stylesheet" href="css/forms.css">
</head>
    <div class="form-container">
        <div class="form-card">
            <form action="{{route('login')}}" method="post">
                @csrf
                <div class="form-title">
                    <h1>Account Login</h1>
                </div>
                <div class="form-npts">
                    <input type="email" name="email" placeholder="Email" class="input @error('email') is-invalid @enderror" autocomplete="email" value="{{ old('email') }}" autofocus required>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input type="password" name="password" placeholder="Password"  class="input @error('password') is-invalid @enderror" data-type="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-button">
                    <button type="submit">SIGN IN</button>
                </div>
                <div class="form-options" style="margin-top: 45px">
                    <p>Forgot Pssword<span><a href="{{ route('password.request') }}">Recover it</a></span>?</p>
                    <p>Don't have account ?<span><a href="{{route("register")}}">Create Account</a></span>?</p>
                </div>
            </form>
        </div>
    </div>
@endsection
