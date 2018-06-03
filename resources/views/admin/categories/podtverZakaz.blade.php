<?php
$bookings= DB::table('booking')->where('booking.booking_status','=','оплачено')->get();
?>
@extends('admin.layouts.app_admin')

@section('content')

<div class="container">

  @component('admin.components.breadcrumb')
    @slot('title') Заказы @endslot
    @slot('parent') Главная @endslot
    @slot('active') Подтверждение заказов @endslot
  @endcomponent

    @foreach ($bookings as $status)
      <div class="col-sm-3">
        <div class="jumbotron text-center">
          <form action="/agree" method="POST" role="form" enctype="multipart/form-data">
            {{csrf_field()}}
            <span>{!!$status->URL_oplata!!}</span>
            <input type="text" name="current_cost">
            <input type="hidden" name="booking_id" value="{{$status->Booking_id}}">
            <p ><button type="submit"> Подтвердить оплату</button></p></form>
          <form action="/cancel" method="POST" role="form" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="booking_id" value="{{$status->Booking_id}}">
            <p><button type="submit">Не подтверждать</button> </p>

          </form>
        </div>
      </div>
    @endforeach
</div>

@endsection