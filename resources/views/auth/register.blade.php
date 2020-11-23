@extends('layouts.app')
@push('styles')
    <link rel="stylesheet" href="{{ asset('style/verification.css') }}">
@endpush
@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <h1>
            Registro
        </h1>
        <div class="form-group required">
            <label for="name" class="control-label">{{ __('Name') }}</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                value="{{ old('name') }}" required autocomplete="name" autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group required">
            <label for="email" class="control-label">{{ __('E-Mail Address') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" required autocomplete="email">
            @error('email')
                <span class="invalid-feedback" role="alert" style="color: red">
                    <strong>El formato de correo electrónico no es válido</strong>
                </span>
            @enderror
        </div>
        <div class="form-group required">
            <label for="password" class="control-label">{{ __('Password') }}</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                name="password" required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert" style="color: red">
                    @if ($message == 'The password confirmation does not match.')
                        <strong>La confirmación de la contraseña no coincide</strong>
                    @else
                        <strong>La contraseña debe tener al menos 8 caracteres</strong>
                    @endif
                </span>
            @enderror
        </div>

        <div class="form-group required">
            <label for="password-confirm" class="control-label">{{ __('Confirm Password') }}</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                autocomplete="new-password">
        </div>
        <button type="submit" class="btn btn-lg btn-primary btn-block">
            {{ __('Register') }}
        </button>
    </form>
@endsection
