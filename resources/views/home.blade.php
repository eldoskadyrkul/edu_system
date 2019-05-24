@extends('layouts.app')

@section('content')
<div class="login_block">
    <div class="container_logins login_bg">
        <div class="login_content">
            <form class="login_form" method="POST" action="{{ route('index') }}">
                {{ csrf_field() }}
                <span class="form_logo">
                    <img src="{{ asset('image/logo-2.png') }}">
                </span>
                <span class="login_title">Выберите тип пользователя</span>
                <ul>
                    <li>1. Admin</li>
                    <li>2. Student</li>
                </ul>
                <p class="text-danger">Напишите один из предложенных вариантов в специальной форме</p>
                <div class="input-form col-lg-6">
                    <input class="input_control" id="admin" type="text" name="admin">
                </div>
                <div class="form_btn">
                    <button type="submit" class="button">Отправить</button>
                </div>
                <div class="text-center forgot_me">
                    <?php
                        $id = Auth::user()->id;
                        $role = KazEDU\Roles::where('user_id', '=', $id)->value('roles_user');
                        if ($role === 'Student') {
                    ?>
                    <a class="forgotme" href="{{route('student', Auth::user()->id)}}">К панелю управления</a>
                    <?php
                        } else {
                    ?>
                    <a class="forgotme" href="{{route('admin')}}">Административная панель</a>
                    <?php 
                        }
                    ?>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
