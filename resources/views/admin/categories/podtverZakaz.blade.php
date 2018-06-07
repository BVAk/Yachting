<?php
$booking = DB::table('booking')->where('booking.booking_status', '=', 'оплачено')->join('users','id','=','booking.Users_id')->join('yachts','Yachts_id','=','booking.Yachts_Yachts_id')
    ->join('Marinas','Marinas_id','=','Yachts.Yacht_marina')->join('Countries','Countries_id','Marinas.Countries_Countries_id')->join('Skippers','Skippers_id','=','Yachts.Yacht_skipper')->get();
$bookings =DB::table('booking')->where('booking.booking_status', '=', 'оплачено')->count();
?>

@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">

        @component('admin.components.breadcrumb')
            @slot('title') Заказы @endslot
            @slot('parent') Главная @endslot
            @slot('active') Подтверждение заказов @endslot
        @endcomponent
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-2">
                <div class="panel panel-default">
                   <table class="table"> <th> <a href="{{asset('pdf/Primer.docx')}}">Пример подтверждения оплаты</a> </th><th>
                        <a href="{{asset('pdf/Primer otkaza.docx')}}">Пример отказа подтверждения аренды яхты</a> </th></table> <br>
                        @if ($bookings==0)
                        <div class="col-sm-11"> <div class="jumbotron text-center"> Список пуст</div></div>
                        @else
                    @foreach ($booking as $status)
                        <div class="col-sm-5">
                            <div class="jumbotron text-center">
                                <form action="/agree" method="POST" role="form" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    Информация о туре:
                                    {{$status->Yacht_name}}<br>
                                    Период тура:
                                    {{$status->Booking_date_otpr}} — {{$status->Booking_date_prib}}<br>
                                    Марина (страна):
                                    {{$status->Marinas_name}} ({{$status->Countries_name}})<br>
                                   <br>
                                    Шкиппер: {{$status->Skipper}}<br>
                                    {{$status->Skippers_name}}<br>
                                    {{$status->Skippers_email}}<br>
                                    {{$status->Skippers_phone}}<br>
                                <br>    <span>{!!$status->URL_oplata!!}</span><br>
                                    {{$status->Booking_cost/2}}/{{$status->Booking_cost}} евро<br>

                                    <input type="text" name="current_cost">
                                    <input type="hidden" name="booking_id" value="{{$status->Booking_id}}">
                                    <input type="file" name="podtver"><br>
                                    <p>
                                        <button type="submit"> Подтвердить оплату</button>
                                    </p>
                                </form>
                                <form action="/cancel" method="POST" role="form" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <input type="hidden" name="booking_id" value="{{$status->Booking_id}}">
                                    <input type="file" name="podtver"><br>
                                    <p>
                                        <button type="submit">Не подтверждать</button>
                                    </p>

                                </form>
                            </div>
                        </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection