@extends('layouts.header_menu')

@section('content')

<div class="student-dashboard">
    <div class="sidebar_student sidebar_student_color sidebar_student_main sidebar-expand-md">
        <div class="mobile_sidebar d-md-none">
            <div class="header_logo">
                @foreach ($roles as $role)
                <a href="{{ route('/homepage', $role->user_roles) }}">
                    <img src="{{ asset('image/logo.png') }}">
                </a>
                @endforeach
            </div>
        </div>
        <div class="sidebar_menu">
            <ul class="nav nav_sidebar_menu sidebar-toggle-view">
                <li class="nav-item sidebar_nav_item">
                    <a class="nav-link" href="{{ route('student', Auth::user()->id) }}">
                        <i class="flaticon-dashboard"></i>
                        <span>Главная страница</span>
                    </a>
                </li>
                <li class="nav-item sidebar_nav_item">
                    <a class="nav-link" href="{{ route('lecture') }}">
                        <i class="flaticon-open-book"></i>
                        <span>Лекции</span>
                    </a>
                </li>
                <li class="nav-item sidebar_nav_item">
                    <a class="nav-link" href="{{ route('account') }}">
                        <i class="flaticon-settings"></i>
                        <span>Аккаунт</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>    
    <div class="dashboard_content">
        <div class="breadcumbs-area">
            <h3>Панель управления</h3>
            <ul>
                <li>
                    <a href="{{ route('admin') }}">Home</a>
                </li>
                <li>Тестирование</li>
            </ul>
        </div>
        <div class="row">
            <div class="col-12-xxl col-12">
               <div class="card height-auto">
                   <div class="card-body">
                       <div class="heading_1">
                           <h3>Тестирование</h3>
                           <ul class="dropdown">
                           	<li><span id="timer" class="timer"></span></li>
                           </ul>
                        </div>
                        <form class="test_page" action="{{ route('checkAnswer', $lectures->id) }}" method="post">
                            {{csrf_field()}}
                            @foreach($testing as $test)
                            <input type="hidden" name="test_id[]" value="{{$test->id}}">
                        	<div class="questions col-12">
                                <?php
                                   	$value = $test->question;
                                    $substr = mb_substr($value, 0, 5000);
                                    print($substr);
                                ?>
                        	</div>
                        	<div class="answers col-12">
                                <div class="form-radio">
                        			<input type="radio" class="form-radio-input" name="options[{{$test->id}}]" value="{{$test->optionA}}">
                        			<label>{{$test->optionA}}</label>
                        		</div>
                        		<div class="form-radio">
                        			<input type="radio" class="form-radio-input" name="options[{{$test->id}}]" value="{{$test->optionB}}">
                        			<label>{{$test->optionB}}</label>
                        		</div>
                        		<div class="form-radio">
                        			<input type="radio" class="form-radio-input" name="options[{{$test->id}}]" value="{{$test->optionC}}">
                        			<label>{{$test->optionC}}</label>
                        		</div>
                        		<div class="form-radio">
                        			<input type="radio" class="form-radio-input" name="options[{{$test->id}}]" value="{{$test->optionD}}">
                        			<label>{{$test->optionD}}</label>
                        		</div>
                        	</div>
                            @endforeach
                        	<div class="col-12 form-group mgt-8">
                                <button type="submit" class="btn-fill-lg btn-yellow btn-hover">Закончить тест</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection