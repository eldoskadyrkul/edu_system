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
                <li>Тестирование</li>
            </ul>
        </div>
        <div class="card height-auto">
                <div class="card-body">
                   <div class="heading_1">
                       <h3>Все тесты</h3>
                    </div>
                    <div class="table-responsive">
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
                                            Вопросы
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_0" rowspan="1" colspan="1" aria-label="">
                                            Вариант А
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_0" rowspan="1" colspan="1" aria-label="">
                                            Вариант B
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_0" rowspan="1" colspan="1" aria-label="">
                                            Вариант C
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_0" rowspan="1" colspan="1" aria-label="">
                                            Вариант D
                                        </th>
                                        <th class="sorting_disabled" tabindex="0" aria-controls="DataTables_0" rowspan="1" colspan="1" aria-label=""></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($testing as $test)
                                    <tr role="row" class="odd">
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" name="select_id"></input>
                                                <label class="form-check-label"># {{ $test->id }}</label>
                                            </div>
                                        </td>
                                        <td class="sorting_1">
                                            <?php
                                                $value = $test->question;
                                                $substr = mb_substr($value, 0, 49);
                                                print($substr);
                                            ?> 
                                        </td>
                                        <td>{{ $test->optionA }}</td>
                                        <td>{{ $test->optionB }}</td>
                                        <td>{{ $test->optionC }}</td>
                                        <td>{{ $test->optionD }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    <span class="flaticon-more-button-of-three-dots"></span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-92px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                    <a class="dropdown-item" href="{{route('updateTests', $test->id)}}">
                                                        <i class="fas fa-cogs text-green"></i>
                                                        Изменить
                                                    </a>
                                                    <a class="dropdown-item" href="javascript:deletes('{{ $test->id }}', '{{ $test->question }}');">
                                                        <i class="fas fa-trash-alt text-green"></i>
                                                        Удалить
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
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
@endsection