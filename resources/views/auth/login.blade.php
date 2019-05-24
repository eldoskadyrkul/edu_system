@extends('layouts.app')

@section('content')
<div class="login_block">
    <div class="container_logins login_bg">
        <div class="login_content">
            <form class="login_form" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <span class="form_logo">
                    <img src="{{ asset('image/logo-2.png') }}">
                </span>
                <span class="login_title">Вход</span>
                <div class="input-form{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="email" class="input_control" type="text" name="email" value="{{ old('email') }}" placeholder="Введите свой почтовый ящик" autocomplete="off">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    <span class="focus_input">
                        <i class="fas fa-at"></i>
                    </span>
                </div>
                <div class="input-form{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="password" class="input_control" type="password" name="password" placeholder="Введите свой пароль" autocomplete="off">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    <span class="focus_input">
                        <i class="fas fa-key"></i>
                    </span>
                </div>
                <div class="form_btn">
                    <button type="submit" class="button">Войти</button>
                </div>
                <div class="text-center forgot_me">
                    <a class="forgot" href="{{ route('password.request') }}">Забыли пароль?</a>
                </div>
                <div class="text-center forgot_me">
                    <a class="forgot" href="{{ route('register') }}">Нет логина?</a><br>
                    <a class="forgot" href="{{ url('/') }}">На главную страницу</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection