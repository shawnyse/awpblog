@extends('layouts.app')
@section ('page_title')
    Movie | Reset
@endsection

@section ('page_heading')
@endsection

@section('content')
    <div class="card" style=" height: 500px; width: 460px;">
        <div class="card-content">
            <header class="card-header ">
                <div class="card-header-title">
                    <label class="label" style="float: left;">{{ __('Reset Password') }}</label>
                    <div class="card-content">
                        <form method="POST" action="{{ route('password.update') }}">
                    </div>
                </div>
            </header>
            <br>
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="field">
                <label class="label">{{ __('E-Mail Address') }}</label>
                <div class="control has-icons-left">
                    <input type="email" placeholder="@iLoveAwp.com"
                           class="input form-control @error('email') is-invalid @enderror" name="email"
                           value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                    <span class="icon is-small is-left">
                    <i class="fa fa-envelope"></i>
                </span>
                </div>
                @error('email')
                <span class="invalid-feedback" role="alert">
            <p class="help is-danger">{{ $message }}</p>
            </span>
                @enderror
            </div>
            <div class="field">
                <label class="label is large">{{ __('Password') }}</label>
                <div class="control has-icons-left">
                    <input type="password" placeholder="Password"
                           class="input form-control @error('password') is-invalid @enderror" name="password" required
                           autocomplete="new-password">
                    <span class="icon is-small is-left">
                    <i class="fa fa-key"></i>
                </span>
                </div>
                @error('password')
                <span class="invalid-feedback" role="alert">
                <p class="help is-danger">{{ $message }}</p>
            </span>
                @enderror
            </div>
            <div class="field">
                <label class="label is large">{{ __('Confirm Password') }}</label>
                <div class="control has-icons-left">
                    <input type="password" placeholder="Confirm Password" class="input form-control"
                           name="password_confirmation" required autocomplete="new-password">
                    <span class="icon is-small is-left">
                    <i class="fa fa-key"></i>
                </span>
                </div>
            </div>
            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-link" type="submit">{{ __('Reset Password') }}</button>
                </div>
            </div>
        </div>
    </div>
@endsection
