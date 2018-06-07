<?
date_default_timezone_set('UTC');
$date = date('Y-m-d', time());
$users = DB::table('users')->count();
$yachts=DB::table('yachts')->count();
$yachtName=DB::table('yachts')->get();
$yacht = DB::table('booking')->join('yachts','booking.yachts_yachts_id','=','yachts.yachts_id')->get();

$booking = DB::table('booking')->select(DB::raw('count(*) as booking_count, booking_date'))->groupBy('booking_date')->get();
$bookingnow = DB::table('booking')->select(DB::raw('count(*) as booking_count, booking_date'))->groupBy('booking_date')->where('booking_date','=',$date)->get();
$bookings= DB::table('booking')->where('booking.booking_status','=','оплачено')->get();
?>

@extends('admin.layouts.app_admin')

@section('content')

<div class="container">
    <div class="row" id="select">
        
            <div class="content">
                <div align="center"> <h1><img  src="{{asset('/image/icon.png')}}"> Добро пожаловать, администратор!</h1> 
         
         <br><br>

         <div class="col-sm-4">
            <div class="jumbotron text-center">
                <p><span class="label label-primary">Яхт {{$yachts}}</span></p>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="jumbotron text-center">
                <p><span class="label label-primary">Пользователей {{$users}}</span></p>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="jumbotron text-center">
                <p><span class="label label-primary">Сегодня заказов @foreach ($bookingnow as $booking_count) {{$booking_count->booking_count}} @endforeach </span></p>
            </div>
        </div>
 </div></div>
    </div>


</div>


@endsection
