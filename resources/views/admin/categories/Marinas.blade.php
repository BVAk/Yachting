<?

$yacht = DB::table('yachts')->join('Booking', 'Yachts.Yachts_id', 'Booking.Yachts_Yachts_id')->join('users','users.id','=','Booking.Users_id')->join('Marinas','Marinas.Marinas_id','=','Yachts.Yacht_marina')->join('Countries','Countries.Countries_id','=','Marinas.Countries_Countries_id')->where('Countries_id','=',$Countries_id)->where('Marinas_id','=',$Marinas_id)->orderBy('Yachts.Yacht_name')->orderBy('Booking.Booking_date_otpr')->get();
$yachtNames = DB::table('yachts')->where('Yacht_marina','=',$Marinas_id)->get();
?>

<script src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
crossorigin="anonymous"></script>
<script src="https://unpkg.com/vue"></script>

<script src="http://code.jquery.com/jquery-latest.js"></script>
@extends('admin.layouts.apps_admin')



@section('content')

<div class="container">
    @foreach ($yacht as $oneall)

    @component('admin.components.breadcrumb')
    @slot('title')  Просмотр заказов @endslot
    @slot('parent') Главная @endslot
    @slot ('active'){{$oneall->Marinas_name}}@endslot
    @endcomponent
    @break
    @endforeach
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="links" align="center">
                    @foreach ($yachtNames as $oneall)
                    <a href="yachts/{{$oneall->Yachts_id}}"
                       style="padding:20px">{{$oneall->Yacht_name}} </a>
                       @endforeach

                   </div>
                   <div class="panel-body">

                    <table class="table">
                        <thead>
                            <th>Название яхты</th>
                            <th>Даты, когда яхта занята</th>
                            <th>Статус заказа</th>
                            <th>Заказчик</th>
                        </thead>
                        <tbody>
                            @foreach($yacht as $yachtname)
                            <tr>
                                <td>{{$yachtname->Yacht_name}}</td>
                                <td>{{$yachtname->Booking_date_otpr}} / {{$yachtname->Booking_date_prib}}</td>
                                <td>{{$yachtname->Booking_status}}</td>
                                <td>{{$yachtname->name}}<br>{{$yachtname->email}}<br>{{$yachtname->mobile}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
