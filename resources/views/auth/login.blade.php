@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/login.css')}} ">
@endsection

@section('content')

@php
    $lang = LaravelLocalization::getCurrentLocale();
@endphp

<div class="hero">
    <div class="form-box">
        <div class="button-box">
            <div id="btn"></div>
            <button type="button" class="toggle-btn" onclick="loginBtn()">{{ __('Login') }}</button>
            <button type="button" class="toggle-btn" onclick="registerBtn()">{{ __('Register') }}</button>
        </div>
        {{-- login --}}
        <form id="login" method="POST" action="{{ route('login') }}" class="input-group">
            @csrf
            <input type="email" name="email" id="email" class="input-field @error('email') is-invalid @enderror" placeholder="{{ __('E-Mail Address') }}" required autocomplete="email" style="text-align: {{$lang == 'ar' ? 'right' : 'left'}}">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <input type="password" name="password" id="password" class="input-field @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

   
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
         

            <button type="submit" class="submit-btn" style="margin-top: 40px !important;"> {{ __('Log in') }}</button>
        </form>


        {{-- register --}}

        <form id="register" method="POST" action="{{ route('register') }}" class="input-group">
            @csrf

            <input type="text"  id="name" class="input-field @error('name') is-invalid @enderror" placeholder="{{ __('Name') }}" name="name" value="{{ old('name') }}" required autocomplete="name">

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <input type="email" id="email" class="input-field @error('email') is-invalid @enderror" placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ old('email') }}" required autocomplete="email" style="text-align: {{$lang == 'ar' ? 'right' : 'left'}}">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror


            <input type="password" id="password" class="input-field @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}" name="password" required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror


            <input type="password" id="password-confirm" class="input-field" placeholder="{{ __('Confirm Password') }}" name="password_confirmation" required autocomplete="new-password">



            <button type="submit" class="submit-btn">{{ __('Register') }}</button>
        </form>


    </div>
</div>

@endsection
@section('script')
<script>
    var login = document.getElementById("login"); 
    var register = document.getElementById("register"); 
    var btn = document.getElementById("btn"); 

    function registerBtn() {
        login.style.left = "-400px";
        register.style.left = "50px";
        btn.style.left = "110px";
    }
    function loginBtn() {
        login.style.left = "50px";
        register.style.left = "450px";
        btn.style.left = "0";
    }

</script>
@endsection