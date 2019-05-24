@extends('layouts.app')

@section('content')

<section class="main_section">
    <div class="container">
        <div class="edu_text text-white">
            <h2>Добро пожаловать в электронную систему "KazEDU"</h2>
            <p>"KazEDU" - единая платформа, обеспечивающая данный вид безвозмездных услуг при составлении курсов для будущих студентов. А также ознакомит слушателя расписанием и обучающие видео для легкого и наглядного способов запоминания.</p>
        </div>
        <div class="row">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                    <div class="col-lg-2 offset-lg-4">
                        <?php
                        if (($roles) == 'Student') {
                        ?>
                        <a class="btn site_btn" href="{{ route('student', $roles) }}">Панелю управлению</a>
                        <?php
                            } else {
                        ?>
                        <a class="btn site_btn" href="{{ url('admin') }}">Панелю управлению</a>
                        <?php 
                            }
                        ?>                        
                    </div>
                    @endif
                </div>
            @endif            
        </div>
    </div>
</section>

@endsection