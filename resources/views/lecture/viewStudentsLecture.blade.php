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
                    <a class="nav-link" href="{{ url('/student') }}">
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
        @foreach($lectureInform as $v)
        <div class="breadcumbs-area">
            <h3>Панель управления</h3>
            <ul>
                <li>
                    <a href="{{ route('admin') }}">Home</a>
                </li>
                <li>Лекции</li>
                <li>{{$v->name_lectures}}</li>
            </ul>
        </div>
        <div class="row">
            <div class="col-12-xxl col-12">
               <div class="card height-auto">
                   <div class="card-body">
                       <div class="heading_1">
                           <h3>{{$v->name_lectures}}</h3>
                       </div>
                       <div class="info_lecture">
                           <iframe class="text-center" width="100%" height="500" src="{{$v->url_lectures}}?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <?php
                                $value = $v->description_lectures;
                                $substr = mb_substr($value, 0, 10000000);
                                print($substr);
                            ?>
                       </div>
                       <div class="controls">
                           <a href="{{route('testView', $v->id)}}" class="btn-test btn-yellow btn-hover float-right">Перейти к тесту</a>
                       </div>
                   </div>
               </div>
           </div>           
        </div>
        @endforeach
    </div>
</div>

@endsection