<?
date_default_timezone_set('UTC');
$date = date('Y-m-d', time());
$users = DB::table('users')->count();
$yachts=DB::table('yachts')->count();
$booking = DB::table('booking')->select(DB::raw('count(*) as booking_count, booking_date'))->groupBy('booking_date')->get();
$bookingnow = DB::table('booking')->select(DB::raw('count(*) as booking_count, booking_date'))->groupBy('booking_date')->where('booking_date','=',$date)->get();
?>

@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        <div class="row">
            
            <div class="col-sm-3">
                <div class="jumbotron text-center">
                    <p><span class="label label-primary">Яхт {{$yachts}}</span></p>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="jumbotron text-center">
                    <p><span class="label label-primary">Пользователей {{$users}}</span></p>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="jumbotron text-center">
                    <p><span class="label label-primary">Сегодня  @foreach ($bookingnow as $booking_count) {{$booking_count->booking_count}} @endforeach </span></p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <a class="btn btn-block btn-default" href="#">Создать категорию</a>
                <a href="#" class="list-group-item">
                    <h4 class="list-group-item-heading">Категория первая</h4>
                    <p class="list-group-item-text">Кол-во материалов</p>
                </a>
            </div>
            <div class="col-sm-6">
                <a class="btn btn-block btn-default" href="#">Создать Материал</a>
                <a href="#" class="list-group-item">
                    <h4 class="list-group-item-heading">Материал первый</h4>
                    <p class="list-group-item-text">Категория</p>
                </a>
            </div>
        </div>
        <div id="inform"></div>
        

        

        @foreach($booking as $booking)
            Заказов в этот день:  {{$booking->booking_date}} - {{$booking->booking_count}} <br>
        @endforeach
    </div>

@endsection
@section('scripts')
    <script>

        Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('content');

        new Vue({
            el: '#inform',
            data: {
                inf: []
            },
            mounted: function () {
                this.fetchInf();
            },

            methods: {
                fetchInf: function () {
                    this.$http.get('http://jsonplaceholder.typicode.com/posts').then(function (response) {
                        this.inf = response.body;
                        console.log(this.inf);
                    })
                }
            }
        });

    </script>
@endsection