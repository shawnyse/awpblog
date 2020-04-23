@extends('layouts.app')
@section ('page_title')
    Movie | Register
@endsection

@section ('page_heading')
@endsection
@section('content')
    <div class="card" style=" height: 500px; width: 460px;">
        <div class="card-content">
            <header class="card-header ">
                <div class="card-header-title">
                    <label class="label" style="float: left;">{{ __('Register') }}</label>
                    <div class="card-content">
                        <form method="POST" action="{{ route('register') }}">
                    </div>
                </div>
            </header>
            <br>
            @csrf
            <div class="field">
                <label class="label">{{ __('Name') }}</label>
                <div class="control has-icons-left">
                    <input type="text" placeholder="Name" class="input form-control @error('name') is-invalid @enderror"
                           name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    <span class="icon is-small is-left">
                    <i class="fa fa-user-circle-o"></i>
                </span>
                </div>
                @error('name')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="field">
                <label class="label">{{ __('E-Mail Address') }}</label>
                <div class="control has-icons-left">
                    <input type="email" placeholder="@iLoveAwp.com"
                           class="input form-control @error('email') is-invalid @enderror" name="email"
                           value="{{ old('email') }}" required autocomplete="email">
                    <span class="icon is-small is-left">
                    <i class="fa fa-envelope"></i>
                </span>
                </div>
                @error('email')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="field">
                <label class="label is large">{{ __('Password') }}</label>
                <div class="control has-icons-left">
                    <input type="password" placeholder="Password"
                           class="input form-control @error('password') is-invalid @enderror" name="password" required
                           autocomplete="current-password">
                    <span class="icon is-small is-left">
                    <i class="fa fa-key"></i>
                </span>
                </div>
                @error('password')
                <p class="help is-danger">{{ $message }}</p>
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
                    <button class="button is-link" type="submit">{{ __('Register') }}</button>
                </div>
            </div>
        </div>
    </div>
@endsection
