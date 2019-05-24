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
                            <a href="{{url('/')}}" class="nav-link">
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
                    <a href="{{ route('admin') }}">Главная страница</a>
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
                        <form class="new_form" action="{{ route('adminInfo')}}" method="post">
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
                                    <label>Пол *</label>
                                    <input class="form-control" type="text" name="gender" placeholder="" required="required" autocomplete="off">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Дата рождения *</label>
                                    <input class="form-control air-datepicker" type="text" data-position="bottom right" name="admin_birthday" placeholder="YYYY-mm-dd" required="required" autocomplete="off">
                                    <i class="far fa-calendar-alt"></i>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Мобильный телефон *</label>
                                    <input class="form-control" type="text" name="mobile_phone" placeholder="" required="required" autocomplete="off">
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
            <div class="col-6-xxl col-xl-6">
                <div class="card account-setting-box">
                    <div class="card-body">
                        <div class="heading_1 mgb-20">
                            <div class="item-title">
                                <h3>Обо мне</h3>
                            </div>
                        </div>
                        <div class="user_details">
                            <div class="item-img">
                                <img src="{{ asset('image/admin/user.jpg') }}">
                            </div>
                            <div class="item-content">
                                <div class="info-table table-responsive">
                                    <table class="table text-nowrap" data-info="admins">
                                        <tbody>
                                            @foreach($adminAccount as $b)
                                            <tr>
                                                <td>Фамилия:</td>
                                                <td class="font-medium text-dark-medium">{{$b->firstname}}</td>
                                            </tr>
                                            <tr>
                                                <td>Имя:</td>
                                                <td class="font-medium text-dark-medium">{{$b->lastname}}</td>
                                            </tr>
                                            <tr>
                                                <td>Пол:</td>
                                                <td class="font-medium text-dark-medium">{{$b->gender}}</td>
                                            </tr>
                                            <tr>
                                                <td>Дата рождения:</td>
                                                <td class="font-medium text-dark-medium">{{$b->admin_birthday}}</td>
                                            </tr>
                                            <tr>
                                                <td>Мобильный телефон:</td>
                                                <td class="font-medium text-dark-medium">{{$b->mobile_phone}}</td>
                                            </tr>
                                            <tr>
                                                <td>Электронная почта:</td>
                                                <td class="font-medium text-dark-medium">{{Auth::user()->email}}</td>
                                            </tr>
                                            <tr>
                                                <td>Адресс:</td>
                                                <td class="font-medium text-dark-medium">{{$b->address}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="col-12 form-group mgt-8">
                                        <a href="javascript:deletes('{{Auth::user()->id}}')" class="btn-fill-lg btn-yellow btn-hover">Удалить информацию</a>
                                        <a href="javascript:deleteAccount('{{Auth::user()->id}}')" class="btn-fill-lg btn-yellow btn-hover">Удалить аккаунт</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6-xxl col-xl-6">
                <div class="card account-setting-box">
                    <div class="card-body">
                        <div class="heading_1 mgb-20">
                            <div class="item-title">
                                <h3>О программе</h3>
                            </div>
                        </div>
                        <div class="user_details">
                            <div class="item-img">
                                <img src="{{ asset('image/admin/user.jpg') }}">
                            </div>
                            <div class="item-content">
                                <div class="info-table table-responsive">
                                    <p>Уникальное веб-приложение не оставит вас равнодушными и поможет Вам подготовиться к занятиям с помощью тестовой практики. Многие годы я изучал программирования и изучаю все тонкости и нововедении в мир цифровой технологии.</p>
                                    <p>Мир стремительно движется за ним и данный сервис будет совершенствовать свои функции и возможности, а также станет отличным помощником в образовательной деятельности. Наш с тобой шаг будет закономерен лишь с тобой, как очередное творение.</p>
                                    <p>"KazEDU" - твой путь к новым знаниям и приключениям!</p>
                                    <br><br><br><br><br>
                                    <p class="text-right"><strong>С уважением, разработчик</strong></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function deletes(id) {
        if(confirm("Вы точно хотите удалить информацию")) {
            window.location.href = 'deleteInfo/' + id;
        }
    }
    function deleteAccount(id) {
        if(confirm("Вы точно хотите удалить аккаунт")) {
            window.location.href = 'deleteAccount/' + id;
        }
    }
</script>

@endsection