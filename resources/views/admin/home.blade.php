@extends('layouts.header_menu')

@section('content')

<div class="student_dashboard">
    <div class="sidebar_student sidebar-expand-md sidebar_student_color sidebar_student_main">
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
                    <a class="nav-link" href="{{ route('admin') }}">
                        <i class="flaticon-dashboard"></i>
                        <span>Главная страница</span>
                    </a>
                </li>
                <li class="nav-item sidebar_nav_item">
                    <a class="nav-link" href="#">
                        <i class="flaticon-classmates"></i>
                        <span>Лекции</span>
                    </a>
                    <ul class="nav sub-group-menu">
                        <li class="nav-item">
                            <a href="{{route('adminLecture')}}" class="nav-link">
                                <i class="fas fa-angle-right"></i> Главная
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/subjects')}}" class="nav-link">
                                <i class="fas fa-angle-right"></i> Дисциплины
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item sidebar_nav_item">
                    <a class="nav-link" href="#">
                        <i class="flaticon-shopping-list"></i>
                        <span>Тестирование</span>
                    </a>
                    <ul class="nav sub-group-menu">
                        <li class="nav-item">
                            <a href="{{route('testing')}}" class="nav-link">
                                <i class="fas fa-angle-right"></i> Главная
                            </a>
                        </li>                        
                        <li class="nav-item">
                            <a href="{{route('allTest')}}" class="nav-link">
                                <i class="fas fa-angle-right"></i> Тестовые вопросы
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('studentResults')}}" class="nav-link">
                                <i class="fas fa-angle-right"></i> Результаты абитуриентов
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item sidebar_nav_item">
                    <a class="nav-link" href="#">
                        <i class="flaticon-settings"></i>
                        <span>Аккаунт</span>
                    </a>
                    <ul class="nav sub-group-menu">
                        <li class="nav-item">
                            <a href="{{route('adminAccount')}}" class="nav-link">
                                <i class="fas fa-angle-right"></i> Главная
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('openEdit', Auth::user()->id)}}" class="nav-link">
                                <i class="fas fa-angle-right"></i> Изменение аккаунта
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="dashboard_content">
        <div class="breadcumbs-area">
            <h3>Панель управления</h3>
            <ul>
                <li>
                    <a href="{{ route('admin') }}">Главная страница</a>
                </li>
                <li>Админ</li>
            </ul>
        </div>
        <div class="row gutters-20">
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="dashboar-summery mgb-20">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <div class="item_icon bg-green">
                                <i class="flaticon-classmates text-green"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="item-content">
                                <div class="item-title">Студенты</div>
                                <div class="item-number">
                                    <span class="counter" data-num="{{$students->count()}}">{{$students->count()}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="dashboar-summery mgb-20">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <div class="item_icon bg-blue">
                                <i class="flaticon-open-book text-blue"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="item-content">
                                <div class="item-title">Лекции</div>
                                <div class="item-number">
                                    <span class="counter" data-num="{{$lectia->count()}}">{{$lectia->count()}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="dashboar-summery mgb-20">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <div class="item_icon bg-yellow">
                                <i class="flaticon-checklist text-orange"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="item-content">
                                <div class="item-title">Тестовые вопросы</div>
                                <div class="item-number">
                                    <span class="counter" data-num="{{$testing->count()}}">{{$testing->count()}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="dashboar-summery mgb-20">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <div class="item_icon bg-green">
                                <i class="flaticon-percentage-discount text-red"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="item-content">
                                <div class="item-title">Результаты</div>
                                <div class="item-number">
                                    <span class="counter" data-num="{{$results->count()}}">{{$results->count()}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-12">
            <div class="card dashboard_admins">
                <div class="card-body">
                    <div class="heading_1">
                        <div class="item-title">
                            <h3>Все студенты</h3>
                        </div>
                    </div>
                    <div class="table-box-wrap">
                        <div class="table-responsive result-table-box">
                            <div id="DataTables" class="datatable no-footer">
                                <table class="table display data-table text-nowrap dataTable no-footer" id="DataTables_0" role="grid">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="ID">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input checkAll">
                                                    <label class="form-check-label">ID</label>
                                                </div>
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_0" rowspan="1" colspan="1" aria-label="">
                                                ФИО
                                            </th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($students as $student)
                                        <tr role="row" class="odd">
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input"></input>
                                                    <label class="form-check-label"># {{$student->user_id}}</label>
                                                </div>
                                            </td>
                                            <td>{{ $student->firstname }} {{$student->lastname}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection