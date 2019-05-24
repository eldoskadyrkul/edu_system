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
                    <ul class="nav sub-group-menu sub-group-active">
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
                    <ul class="nav sub-group-menu sub-group-active">                                                
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
                    <a class="nav-link" href="{{ url('/account') }}">
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
                <li>Дисциплины</li>
            </ul>
        </div>
        <div class="row">
            <div class="col-12-xxl col-12">
               <div class="card height-auto">
                   <div class="card-body">
                       <div class="heading_1">
                           <h3>Добавление дисциплины</h3>
                        </div>
                        {{$subjectForm->prop}}
                        <form class="lecture_form" action="{{route('updateSubject', $subjectForm->id)}}" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-4-xxl col-lg-6 col-12 form-group">
                                    <label>Название дисциплины *</label>
                                    <input type="text" name="subject_name" class="form-control" autocomplete="off" value="{{$subjectForm->subject_name}}">
                                </div>
                                <div class="col-4-xxl col-lg-6 col-12 form-group">
                                    <label>Лекции *</label>
                                    <select name="lecture_id" class="form-control">
                                        @foreach($lectures as $lecture)
                                            <option value="{{$lecture->id}}">{{ $lecture->name_lectures }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 form-group mgt-8">
                                    <button class="btn-fill-lg btn-yellow btn-hover">Изменить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>     
            <div class="col-12-xxl col-12">
               <div class="card height-auto">
                   <div class="card-body">
                       <div class="heading_1">
                           <h3>Все дисциплины</h3>
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
                                            @foreach($subject as $sub)
                                        <tr role="row" class="odd">
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" name="select_id"></input>
                                                    <label class="form-check-label"># {{$sub->id}}</label>
                                                </div>
                                            </td>
                                            <td class="sorting_1">{{$sub->subject_name}}</td>
                                            <td>
                                                <div class="panel">
                                                    <a class="dropdown-item" href="{{route('updateSubjects', $sub->id)}}">
                                                        <i class="fas fa-cogs text-green"></i>
                                                        Изменить
                                                    </a>
                                                    <a class="dropdown-item" href="javascript:delSubject('{{$sub->id}}', '{{$sub->subject_name}}');">
                                                        <i class="fas fa-trash-alt text-green"></i>
                                                        Удалить
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
<script type="text/javascript">
    function delSubject(id, title) {
        if(confirm("Вы точно хотите удалить '" + title + "'")) {
            window.location.href = 'adminLecture/' + id;
        }
    }
</script>

@endsection