@extends('layouts.header_menu')

@section('content')
<div class="student-dashboard">
    <div class="sidebar_student sidebar_student_color sidebar_student_main sidebar-expand-md">
        <div class="mobile_sidebar d-md-none">
            <div class="header_logo">
                <a href="{{ route('homepage', $roles) }}">
                    <img src="{{ asset('image/logo.png') }}">
                </a>
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
                    <a href="{{ url('/student') }}">Home</a>
                </li>
                <li>Лекции</li>
            </ul>
        </div>
        <div class="row">
            <div class="col-12-xxl col-12">
               <div class="card height-auto">
                   <div class="card-body">
                       <div class="heading_1">
                           <h3>Ваш результат</h3>
                        </div>
                        <div class="result">
                            <ul class="list-group text-center">
                                  @if(isset($message))
                                  <li class="list-group-item text-warning">{{$message}}</li>
                                  @endif
                                  @foreach($info as $a)
                                  <li class="list-group-item">ФИО экзаменуемого: <span class="text-info">{{$a->firstname}} {{$a->lastname}}</span></li>
                                  @endforeach
                                  @foreach($lecture as $l)
                                  <li class="list-group-item">Лекция: <span class="text-info">{{$l->name_lectures}}</span></li>
                                  @endforeach
                                  @if(isset($correct_answer))
                                  <li class="list-group-item">Правильные ответы: <span class="text-success">{{ count($correct_answer) }}</span></li>
                                  @endif
                                  @if(isset($uncorrect))
                                  <li class="list-group-item">Неправильные ответы: <span class="text-danger">{{ count($uncorrect) }}</span></li>
                                  @endif
                                  @if(isset($percentage))
                                  <li class="list-group-item">Успеваемость: <span class="text-info">{{$percentage}}%</span></li>
                                  @endif
                            </ul>
                            @foreach ($lectureInform as $v)
                            <a class="btn-test btn-yellow btn-hover float-center" href="{{route('testView', $v->id)}}">Пройти снова</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection