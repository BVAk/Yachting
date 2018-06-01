<?
$yachtName = DB::table('yachts')->join('Booking', 'Yachts.Yachts_id', 'Booking.Yachts_Yachts_id')->where('Booking.Booking_status', '!=', "отменено")->select('Yachts.Yacht_name', 'Booking.Booking_date_otpr', 'Booking.Booking_date_prib')->orderBy('Yachts.Yacht_name')->get();
$yachtNames = DB::table('yachts')->get();
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

<!--suppress JSAnnotator -->
<script type="text/javascript">

    function setYacht() {

        var yacht = document.getElementById('yacht-select').value;

        console.log(yacht);


    }

</script>
@extends('admin.layouts.app_admin')



@section('content')

    <div class="container">

        @component('admin.components.breadcrumb')
            @slot('title') Заказы @endslot
            @slot('parent') Главная @endslot
            @slot('active') Просмотр заказов @endslot
        @endcomponent
    </div>

    <div class="container">
        <div class="row" id="select">
            <select name="country" id="yacht-select" onchange="setYacht()" class="selectpicker">
                @foreach ($yachtNames as $data)
                    <option value="{{$data->Yacht_name}}">{{$data->Yacht_name}}</option>

                @endforeach
            </select>
            <table>
                @if (isset($yacht))
                    {
                <thead>
                <th>Название яхты</th>
                <th></th>
                <th>Даты, когда яхта занята</th>
                </thead>
                <tbody>


                echo $_GET['setYacht()'];
                @foreach($yachtName ->where('Yacht_name','=',yacht) as $yachtname)
                    <tr>
                        <td>{{$yachtname->Yacht_name}}</td>
                        <td></td>
                        <td>{{$yachtname->Booking_date_otpr}} - {{$yachtname->Booking_date_prib}}</td>
                    </tr>

                @endforeach

                </tbody>
                    }
                @endif
            </table>

        </div>
    </div>
@endsection
