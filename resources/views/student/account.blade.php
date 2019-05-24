@extends('layouts.header_menu')

@section('content')

<div class="student-dashboard">
    <div class="sidebar_student sidebar_student_color sidebar_student_main sidebar-expand-md">
        <div class="mobile_sidebar d-md-none">
            <div class="header_logo">
                <a href="{{ url('/') }}">
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
                    <a href="{{ url('/admin') }}">Главная страница</a>
                </li>
                <li>Аккаунт</li>
            </ul>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="heading_1">
                            <div class="item-title">
                                <h3>Добавление информации</h3>
                            </div>
                        </div>
                        <form class="new_form" action="{{ route('info')}}" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Фамилия *</label>
                                    <input class="form-control" type="text" name="firstname" placeholder="" required="required" autocomplete="off">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Имя *</label>
                                    <input class="form-control" type="text" name="lastname" placeholder="" required="required" autocomplete="off">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Дата рождения *</label>
                                    <input class="form-control air-datepicker" type="text" data-position="bottom right" name="birthday" placeholder="YYYY-mm-dd" required="required" autocomplete="off">
                                    <i class="far fa-calendar-alt"></i>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Специальность *</label>
                                    <input class="form-control" type="text" name="speciality" placeholder="" required="required" autocomplete="off">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Мобильный телефон *</label>
                                    <input class="form-control" type="text" name="phone" placeholder="" required="required" autocomplete="off">
                                </div>
                                <div class="col-lg-6 col-12 form-group">
                                    <label>Адресс *</label>
                                    <textarea class="textarea form-control" type="text" name="address" cols="10" rows="4"></textarea>
                                </div>
                                <div class="col-12 form-group mgt-8">
                                    <button class="btn-fill-lg btn-yellow btn-hover">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection