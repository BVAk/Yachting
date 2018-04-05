<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Yachting</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="icon" href="{{asset('image/icon.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Styles -->

    <link href="bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">
    <style>

    /* style snippet */
    #thumbnail-preview-indicators {
        position: relative;
        overflow: hidden;
    }
    #thumbnail-preview-indicators .slides .slide-1, 
    #thumbnail-preview-indicators .slides .slide-2,
    #thumbnail-preview-indicators .slides .slide-3 {
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
    }
    #thumbnail-preview-indicators,
    #thumbnail-preview-indicators .slides,
    #thumbnail-preview-indicators .slides .slide-1, 
    #thumbnail-preview-indicators .slides .slide-2,
    #thumbnail-preview-indicators .slides .slide-3 {
        height: 480px;
    }
    #thumbnail-preview-indicators .slides .slide-1 {
        background-image: url('{{asset('photo/croatia.png')}}'); 
    }
    #thumbnail-preview-indicators .slides .slide-2 {
        background-image: url({{asset('photo/france.png')}});
    }
    #thumbnail-preview-indicators .slides .slide-3 {
        background-image: url(http://bootstraptema.ru/snippets/slider/2017/thumbslider/thumbslider-3.jpg);
    }
    #thumbnail-preview-indicators .carousel-inner .item .carousel-caption {
        top: 20%;
        bottom: inherit;
    }
    #thumbnail-preview-indicators .carousel-indicators li,
    #thumbnail-preview-indicators .carousel-indicators li.active {
        position: relative;
        width: 100px;
        height: 8px; 
    }
    #thumbnail-preview-indicators .carousel-indicators li > .thumbnail {
        position: absolute;
        top: 0;
        width: 100px;
        display: none;
        opacity: 0;
        left: 50%;
        margin-top: -80px;
        margin-left: -50px;
    }
    #thumbnail-preview-indicators .carousel-indicators li:hover > .thumbnail,
    #thumbnail-preview-indicators .carousel-indicators li.active > .thumbnail {
        display: block;
        opacity: .8;
    }
    #thumbnail-preview-indicators .carousel-indicators li.active > .thumbnail:hover{
        opacity: 1;
    }
    @media screen and (max-width : 480px) { 
        #thumbnail-preview-indicators .carousel-indicators li,
        #thumbnail-preview-indicators .carousel-indicators li.active {
            width: 50px;
            height: 8px;
            position: relative;
        }
        #thumbnail-preview-indicators .carousel-indicators li > .thumbnail {
            width: 50px;
            left: 50%;
            margin-top: -50px;
            margin-left: -25px;
        }
    }





    html, body {


        /*color: #888f99;*/
        color: #ffffff;
        font-family: 'OCR A Std',monospace, sans-serif;
        font-weight: 100;
        margin: 0;
        background: linear-gradient(to bottom, #2bc0e4,#eaecc6);
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .links > a {
        /*color: #636b6f;*/
        color: #ffffff;
        padding: 0 25px;
        font-size: 14px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
        margin-bottom: 50px;
    }

    .m-b-md {
        margin-bottom: 10px;
    }
</style>
</head>
<body>


    <?php
           // echo "The time is ".date("h:i:sa");
    date_default_timezone_set('Europe/Kiev');
     // echo date('l \t\h\e jS <br>');
    $today = date("H:i:s");  
    $time = date("H");
    //  echo $today;
    $countries=DB::table('Countries')->get();
    $countries_photo=DB::table('countries_photos')->get();
    ?>
    <div class="start_image" style="height: 300px;
    <?php if (($time >=11 and $time <=15)): ?>
    background-image:url({{asset('image/main.jpg')}});
<?php elseif (($time >=16 and $time <=18)):?>
background-image: url({{asset('image/main2.jpg')}});
<?php elseif ($time>4 and $time<11):?>      
background-image: url({{asset('image/morning1.jpg')}});
<?php else:?>      
background-image: url({{asset('image/night1.jpg')}});   
<?php endif ?> "> 
<div class="flex-center position-ref">
    @if (Route::has('login'))
    <div class="top-right links">
        @auth
        <a href="{{ url('/home') }}">Home</a>
        @else
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
        @endauth
    </div>
    @endif

    <div class="content">
        <div class="title m-b-md ">
            <br>
            Yachting
        </div>

        <div class="links">
            <a href="/countries">Страны</a>
            <a href="/yachts">Яхты</a>
            <a href="/skippers">Шкиперы</a>
            
        </div>
    </div>
</div>
</div>

@extends('layouts.apps')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="padding:10px">
            <div class="panel panel-default">
                <div class="panel-heading"> Выбор яхты:</div>

                <form role="form" class="form-inline" style="margin: 10px; padding: 10px; text-align: center;">
                   <div class="form-group">
                    <label for="directive">Направление</label>
                    <select class="form-control">
                      @foreach ($countries as $key => $data)
                      <option>{{$data->Countries_name}}</option>
                      @endforeach

                  </select>
              </div>
              <div class="form-group " style="margin-left: 50px;">
                <label for="date">Дата</label>
                <input type="date" class="form-control" id="date" placeholder="Укажите дату">
            </div>
            <button type="submit" class="btn btn-success" style="margin-left: 50px;">Поиск яхт</button>
        </form>

    </div>
</div>
</div>


</div>




<div id="thumbnail-preview-indicators" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#thumbnail-preview-indicators" data-slide-to="0" class="active">
            <div class="thumbnail">
                <img class="img-responsive" src="{{asset('photo/croatia.png')}}">
            </div>
        </li>
        <li data-target="#thumbnail-preview-indicators" data-slide-to="1">
            <div class="thumbnail">
                <img class="img-responsive" src="{{asset('photo/france.png')}}">
            </div>
        </li>
        <li data-target="#thumbnail-preview-indicators" data-slide-to="2">
            <div class="thumbnail">
                <img class="img-responsive" src="http://bootstraptema.ru/snippets/slider/2017/thumbslider/thumbslider-3.jpg">
            </div>
        </li>
    </ol>
    <div class="carousel-inner">
        <div class="item slides active">
            <div class="slide-1"></div>
            <div class="container">
                <div class="carousel-caption">
                    <h1>Хорватия</h1>
                    <p>Кратко о Хорватии</p>
                    <p class="lead"><a class="btn btn-lg btn-link" href="yachts" role="button">Просмотр яхт в Хорватии</a></p>
                </div>
            </div>
        </div>
        <div class="item slides">
            <div class="slide-2"></div>
            <div class="container">
                <div class="carousel-caption">
                    <h1>Франция</h1>
                    <p>Кратко о Франции</p>
                    <p><a class="btn btn-lg btn-link" href="#" role="button">Просмотр яхт во Франции</a></p>
                </div>
            </div>
        </div>
        <div class="item slides">
            <div class="slide-3"></div>
            <div class="container">
                <div class="carousel-caption">
                    <h1>One more for good measure.</h1>
                    <p>Nullam id dolor id nibh ultricies vehicula ut id elit</p>
                    <p><a class="btn btn-lg btn-link" href="#" role="button">THUMBSLIDER</a></p>
                </div>
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#thumbnail-preview-indicators" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
    <a class="right carousel-control" href="#thumbnail-preview-indicators" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
</div>

</body>

@endsection

</html>
