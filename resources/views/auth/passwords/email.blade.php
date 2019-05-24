@extends('layouts.app')

@section('content')
<div class="login_block">
    <div class="container_logins login_bg">
        <div class="login_content">
            <form class="login_form" method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}
                <span class="form_logo">
                    <img src="{{ asset('image/logo-2.png') }}">
                </span>
                <span class="login_title"></span>
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
                <div class="form_btn">
                    <button type="submit" class="button">Восстановить пароль</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
