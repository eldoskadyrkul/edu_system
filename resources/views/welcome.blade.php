@extends('layouts.app')

@section('content')

<section class="main_section">
    <div class="container">
        <div class="edu_text text-white">
            <h2>Добро пожаловать в электронную систему "KazEDU"</h2>
            <p>"KazEDU" - единая платформа, обеспечивающая данный вид безвозмездных услуг при составлении курсов для будущих студентов. А также ознакомит слушателя расписанием и обучающие видео для легкого и наглядного способов запоминания.</p>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="top-right links">
                    <div class="col-lg-6 offset-lg text-center float-left">
                        <a href="{{ route('login') }}" class="site_btn">Вход</a>    
                    </div>
                    <div class="col-lg-4 offset-lg text-center float-left">
                        <a href="{{ route('register') }}" class="site_btn">Регистрация</a>    
                    </div>
                </div>
            </div>            
        </div>
    </div>
</section>

@endsection