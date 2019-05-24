@extends('layouts.app')

@section('content')
<div class="login_block">
    <div class="container_logins login_bg">
        <div class="login_content">
            <form class="login_form" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                <span class="form_logo">
                    <img src="{{ asset('image/logo-2.png') }}">
                </span>
                <span class="login_title">Регистрация</span>
                <div class="input-form{{ $errors->has('username') ? ' has-error' : '' }}">
                    <input id="username" class="input_control" type="text" name="username" value="{{ old('username') }}" placeholder="Введите свой логин" required autocomplete="off">
                    @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="input-form{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="email" class="input_control" type="text" name="email" value="{{ old('email') }}" placeholder="Введите свой почтовый ящик" required autocomplete="off">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="input-form{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="password" class="input_control" type="password" name="password" placeholder="Введите свой пароль" required="required" autocomplete="off">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="input-form">
                    <input id="password-confirm" class="input_control" type="password" name="password_confirmation" placeholder="Введите свой пароль" required="required" autocomplete="off">
                </div>
                <div class="form_btn">
                    <button type="submit" class="button">Регистрация</button>
                </div>  
                <div class="text-center forgot_me">
                    <a class="forgot" href="{{ route('login') }}">У меня есть логин</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
