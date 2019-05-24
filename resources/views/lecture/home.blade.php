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
                           <h3>Все Лекции</h3>
                        </div>
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
                                                Название
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_0" rowspan="1" colspan="1" aria-label="">
                                                Панель
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($lecture as $a)
                                        <tr role="row" class="odd">
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" name="select_id"></input>
                                                    <label class="form-check-label"># {{$a->id}}</label>
                                                </div>
                                            </td>
                                            <td class="sorting_1">{{$a->name_lectures}}</td>
                                            <td>
                                                <div class="panel">
                                                    <a class="dropdown-item" href="{{route('lectureView', $a->id)}}">
                                                        <i class="fas fa-cogs text-green"></i>
                                                        Открыть
                                                    </a>
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
</div>

@endsection