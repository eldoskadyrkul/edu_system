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
        <div class="row">
            <div class="col-12-xxl col-12">
               <div class="card height-auto">
                   <div class="card-body">
                       <div class="heading_1">
                           <h3>Добавление тестовых вопросов</h3>
                        </div>
                        <form class="lecture_form" action="{{route('addTest')}}" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-12-xxl col-lg-12 col-12 form-group">
                                    <label>Вопросы теста </label>
                                    <textarea type="text" name="question" class="form-control"></textarea>
                                </div>   
                                <div class="col-4-xxl col-lg-6 col-12 form-group">
                                    <label>Вариант A </label>
                                    <input type="text" name="optionA" class="form-control" autocomplete="off">
                                </div>   
                                <div class="col-4-xxl col-lg-6 col-12 form-group">
                                    <label>Вариант B </label>
                                    <input type="text" name="optionB" class="form-control" autocomplete="off">
                                </div>   
                                <div class="col-4-xxl col-lg-6 col-12 form-group">
                                    <label>Вариант C </label>
                                    <input type="text" name="optionC" class="form-control" autocomplete="off">
                                </div>   
                                <div class="col-4-xxl col-lg-6 col-12 form-group">
                                    <label>Вариант D </label>
                                    <input type="text" name="optionD" class="form-control" autocomplete="off">
                                </div>   
                                <div class="col-4-xxl col-lg-6 col-12 form-group">
                                    <label>Правильный ответ</label>
                                    <input type="text" name="correct_answer" class="form-control" autocomplete="off">
                                </div>  
                                <div class="col-4-xxl col-lg-6 col-12 form-group">
                                    <label>Выберите лекцию</label>
                                    <select name="lecture_id" class="form-control">
                                        @foreach($lectures as $lecture)
                                            <option value="{{$lecture->id}}">{{ $lecture->name_lectures }}</option>
                                        @endforeach
                                    </select>
                                </div>                             
                                <div class="col-12 form-group mgt-8">
                                    <button class="btn-fill-lg btn-yellow btn-hover">Сохранить</button>
                                </div>
                            </div>
                        </form> 
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
    function deletes(id, title) {
        if(confirm("Вы точно хотите удалить '" + title + "'")) {
            window.location.href = 'deleteTest/' + id;
        }
    }
</script>

@endsection