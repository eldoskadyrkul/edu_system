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
                    <a class="nav-link" href="{{ route('adminAccount') }}">
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
                           <h3>Добавление лекции</h3>
                        </div>
                        {{$lecture->prop}}
                        <form class="lecture_form" action="{{route('updateLecture', $lecture->id)}}" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-4-xxl col-lg-6 col-12 form-group">
                                    <label>Название лекции *</label>
                                    <input type="text" name="name_lectures" class="form-control" value="{{$lecture->name_lectures}}" autocomplete="off" placeholder>
                                </div>
                                <div class="col-4-xxl col-lg-6 col-12 form-group">
                                    <label>Коротко о лекции *</label>
                                    <input type="text" name="short_desc" class="form-control" value="{{$lecture->short_desc}}" autocomplete="off" placeholder="не более 50 слов">
                                </div>
                                <div class="col-4-xxl col-lg-6 col-12 form-group">
                                    <label>Ссылка лекции в Youtube *</label>
                                    <input type="text" name="url_lectures" class="form-control" value="{{$lecture->url_lectures}}" autocomplete="off" placeholder>
                                </div>
                                <div class="col-12-xxl col-lg-6 col-12 form-group">
                                    <label>Описание лекции *</label>
                                    <textarea class="textarea form-control" type="text" name="description_lectures" cols="10" rows="4">{{$lecture->description_lectures}}</textarea>
                                </div>
                                <div class="col-12 form-group mgt-8">
                                    <button class="btn-fill-lg btn-yellow btn-hover">Сохранить</button>
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
                                                Описание
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_0" rowspan="1" colspan="1" aria-label="">
                                                Ссылка
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_0" rowspan="1" colspan="1" aria-label="">
                                                Панель
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($adminLecture as $a)
                                        <tr role="row" class="odd">
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" name="select_id"></input>
                                                    <label class="form-check-label"># {{$a->id}}</label>
                                                </div>
                                            </td>
                                            <td class="sorting_1">{{$a->name_lectures}}</td>
                                            <td>
                                                <?php
                                                    $value = $a->short_desc;
                                                    $substr = mb_substr($value, 0, 50);
                                                    print($substr);
                                                ?>                                                
                                            </td>
                                            <td>{{$a->url_lectures}}</td>
                                            <td>
                                                <div class="panel">
                                                    <a class="dropdown-item" href="{{route('lectureInform', $a->id)}}">
                                                        <i class="fas fa-cogs text-green"></i>
                                                        Открыть
                                                    </a>
                                                    <a class="dropdown-item" href="{{route('editLecture', $a->id)}}">
                                                        <i class="fas fa-cogs text-green"></i>
                                                        Изменить
                                                    </a>
                                                    <a class="dropdown-item" href="javascript:delLecture('{{$a->id}}', '{{$a->name_lectures}}');">
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

<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
<script>
          tinymce.init({
              selector: "textarea",
              plugins: [
                  "advlist autolink lists link image charmap print preview anchor",
                  "searchreplace visualblocks code fullscreen",
                  "insertdatetime media table contextmenu paste"
              ],
              toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
          });
</script>
<script type="text/javascript">
    function delLecture(id, title) {
        if(confirm("Вы точно хотите удалить '" + title + "'")) {
            window.location.href = 'adminLecture/' + id;
        }
    }
</script>

@endsection