@extends('layouts.app')
@section ('page_title')
    Movie | Login
@endsection

@section ('page_heading')
@endsection
@section('content')
    <div class="card" style="height: auto">
        <div class="card-content">
            <header class="card-header">
                <div class="field is-horizontal">
                    <div class="field-label is-large">
                        <label class="label " style="float: left">{{ __('Login') }}</label>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
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

            {{--Verification code--}}
            <div class="field">
                <label class="label">
                    Verification Code
                </label>
                <div class="control">
                    <input class="input" name="code" type="text" placeholder="Verification Code" style="width: 65%;">
                    {{--once click this picture, it will change a verification code(onclick)--}}
                    <img src="{{url('auth/code')}}" alt="click to refresh" title="click to refresh"
                         onclick="this.src='{{url('auth/code')}}?'+Math.random()">
                </div>
            </div>
            {{--Check box--}}
            <div class="field">
                <div class="control">
                    <label class="checkbox">
                        <input type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>

            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-link" type="submit">{{ __('Login') }}</button>
                </div>
                <div class="control">
                    @if (Route::has('password.request'))
                        <a class="button is-text is-outlined"
                           href="{{ route('password.request') }}"> {{ __('Forgot Your Password?') }}</a>
                    @endif
                </div>
            </div>
            @include ('auth.thridParty-login')
        </div>
    </div>
@endsection
