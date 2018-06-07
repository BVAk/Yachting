<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Yachting-Dashboard</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Yachting') }}</title>
    <script src="{{ asset('js/vue.js') }}"></script>
    <script src="{{ asset('js/vue-resource.js') }}"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
</head>
<body>
<div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                   
                       <a class="navbar-brand" href="/">Yachting</a>
                      
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                       <li class="dropdown">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" style="font-size: 18px" aria-expaanded="false">Заказы</a>
                           <ul class="dropdown-menu" role="menu">

                           <li><a class="navbar-brand" href ="/admin/podtverZakaz">Подтвердить заказы</a></li>
                            <li><a class="navbar-brand" href ="/admin/Zakazi">Проcмотр заказов</a></li>
                        <li><a class="navbar-brand" href ="/admin/Delete">Отмененные заказы</a></li></ul>
                       </li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" style="font-size: 18px" aria-expaanded="false">Яхты</a>
                            <ul class="dropdown-menu" role="menu">

                                <li><a class="navbar-brand" href ="/admin/editYacht">Изменить</a></li>
                                
                                <li><a class="navbar-brand" href ="/admin/addYacht">Добавить</a></li></ul>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->

                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
