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
                            <a href="{{route('editAdminAccount', Auth::user()->id)}}" class="nav-link">
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
                    <a href="{{ route('admin') }}">Home</a>
                </li>
                <li>Результаты</li>
            </ul>
        </div>
        <div class="row">
            <div class="col-12-xxl col-12">
               <div class="card height-auto">
                   <div class="card-body">
                       <div class="heading_1">
                           <h3>Результаты пользователей</h3>
                        </div>
                        <div class="table-responsive result-table-box">
                            <div id="DataTables" class="datatable no-footer">
                                <table class="table display data-table text-nowrap dataTable no-footer" id="DataTables_0" role="grid">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_0" rowspan="1" colspan="1" aria-label="">
                                                ФИО
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_0" rowspan="1" colspan="1" aria-label="">
                                                Лекция
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_0" rowspan="1" colspan="1" aria-label="">
                                                Результат
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_0" rowspan="1" colspan="1" aria-label="">
                                                Отвечено
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($result as $res)
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">{{ $res->firstname }} {{ $res->lastname }}</td>
                                            <td>{{$res->name_lectures}}</td>
                                            <td>{{ $res->results }}</td>
                                            <td>{{ $res->attempts }} / 10</td>
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