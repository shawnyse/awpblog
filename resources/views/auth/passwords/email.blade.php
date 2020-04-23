@extends('layouts.app')
@section ('page_title')
    Movie | Email
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
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('password.email') }}">
                    </div>
                </div>
            </header>
            <br>
            @csrf
            <div class="field">
                <label class="label">{{ __('E-Mail Address') }}</label>
                <div class="control has-icons-left">
                    <input type="email" placeholder="@iLoveAwp.com"
                           class="input form-control @error('email') is-invalid @enderror" name="email"
                           value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <span class="icon is-small is-left">
                    <i class="fa fa-envelope"></i>
                </span>
                </div>
                <br>
                @error('email')
                <span class="invalid-feedback" role="alert">
            <p class="help is-danger">{{ $message }}</p>
            </span>
                @enderror
                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link" type="submit"> {{ __('Send Password Reset Link') }}</button>
                    </div>
                </div>
            </div>
        </div>
@endsection
