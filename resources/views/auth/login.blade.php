@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('style/verification.css') }}">
@section('content')
    <form method="POST" action="{{ route('login') }}" style="margin-bottom: 30px">
        @csrf
        <h1>
            Login
        </h1>
        <div class="form-group required">
            <label for="email" class="control-label">{{ __('E-Mail Address') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert" style="color: red">
                    <strong>Estas credenciales no concuerdan con nuestros registros</strong>
                </span>
            @enderror
        </div>
        <div class="form-group required">
            <label for="password" class="control-label">{{ __('Password') }}</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                name="password" required autocomplete="current-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group row">
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-lg btn-primary btn-block">
            {{ __('Login') }}
        </button>
    </form>
@endsection
