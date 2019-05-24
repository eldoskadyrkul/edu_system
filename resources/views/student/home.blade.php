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
                    <a href="{{ route('student', Auth::user()->id) }}">Главная страница</a>
                </li>
                <li>Пользователь</li>
            </ul>
        </div>
        <div class="row">
            <div class="col-4-xxl col-12">
                <div class="card dashboard-card-info">
                    <div class="card-body">
                        <div class="heading_1">
                            <div class="item_title">
                                <h3>Обо мне</h3>
                            </div>
                        </div>
                        @foreach($info as $person)
                        <div class="student-info">
                            <div class="media media-none-xs">
                                <div class="item-img">
                                    <img src="{{ asset('image/admin/student.png') }}" class="media-img-auto">
                                </div>
                                <div class="media-body">
                                    <h3 class="item-title">{{$person->firstname}} {{$person->lastname}}</h3>
                                    <p></p>
                                </div>
                            </div>
                            <div class="table-responsive info-table">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Фамилия:</td>
                                            <td class="font-medium text-dark-medium">{{$person->firstname}}</td>
                                        </tr>
                                        <tr>
                                            <td>Имя:</td>
                                            <td class="font-medium text-dark-medium">{{$person->lastname}}</td>
                                        </tr>
                                        <tr>
                                            <td>Дата:</td>
                                            <td class="font-medium text-dark-medium">{{$person->date_birth}}</td>
                                        </tr>
                                        <tr>
                                            <td>Специальность:</td>
                                            <td class="font-medium text-dark-medium">{{$person->speciality}}</td>
                                        </tr>
                                        <tr>
                                            <td>Адресс:</td>
                                            <td class="font-medium text-dark-medium">{{$person->address}}</td>
                                        </tr>
                                        <tr>
                                            <td>Телефон:</td>
                                            <td class="font-medium text-dark-medium">{{$person->mobile_phone}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-8-xxl col-12">
                    <div class="col-lg-12">
                        <div class="card card_dashboard">
                            <div class="card-body">
                                <div class="heading_1">
                                    <div class="item_title">
                                        <h3>Результаты тестов</h3>
                                    </div>
                                </div>
                                <div class="table-box-wrap">
                                    <div class="table-responsive result-table-box">
                                        <div id="DataTables" class="datatable no-footer">
                                            <table class="table display data-table text-nowrap dataTable no-footer" id="DataTables_0" role="grid">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting_disabled" tabindex="0" aria-controls="DataTables_0" rowspan="1" colspan="1" aria-label="">
                                                            Лекция
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_0" rowspan="1" colspan="1" aria-label="">
                                                            Процент
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_0" rowspan="1" colspan="1" aria-label="">
                                                            Правильные ответы
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_0" rowspan="1" colspan="1" aria-label="" aria-sort="ascending">
                                                            Всего вопросов
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($result as $res)
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">{{ $res->name_lectures }}</td>
                                                        <td>{{ $res->percentage}} %</td>
                                                        <td>{{ $res->results }}</td>
                                                        <td>{{ $res->attempts }}</td>
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
        </div>
    </div>
</div>

@endsection