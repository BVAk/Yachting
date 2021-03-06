
<?php

use Carbon\Carbon;
use Carbon\CarbonInterval;
$date = Carbon::now();
$users=DB::table('Users')->join('booking','booking.users_id','=','Users.id')->where('booking.booking_status','=','отменено')->where('booking.booking_date_otpr','>=',$date)->get();
$booking=DB::table('Booking')->where('booking.booking_status','=','отменено')->count();
?>
@extends('admin.layouts.app_admin')

@section('content')

<div class="container">

  @component('admin.components.breadcrumb')
    @slot('title') Заказы @endslot
    @slot('parent') Главная @endslot
    @slot('active') Отмененные заказы @endslot
  @endcomponent

@if($booking==0)
 <div class="col-sm-11"> <div class="jumbotron text-center"> Список пуст</div></div>
                        @else
    @foreach ($users as $status)
      <div class="col-sm-3">
        <div class="jumbotron text-center">
          <form action="/delete" method="POST" role="form" enctype="multipart/form-data">
            {{csrf_field()}}
            <span>Оплачено: {{$status->Booking_money_oplacheno}}евро
              <br> {!!$status->Podtver!!}<br>
              <br>{!!$status->URL_oplata!!}</span>
            <br>{{$status->mobile}}
            <br>{{$status->email}}
            <input type="hidden" name="booking_id" value="{{$status->Booking_id}}">
            <p ><button type="submit"> Подтвердить отмену</button></p></form>
          <form action="/return" method="POST" role="form" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="booking_id" value="{{$status->Booking_id}}">
            <p><button type="submit">Возобновить заказ</button> </p>

          </form>
        </div>
      </div>
    @endforeach
@endif
  </div>

@endsection