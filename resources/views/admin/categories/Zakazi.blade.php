
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
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <h5><div class="links" align="center">
                    @foreach ($countries as $oneall)
                    <a href="Zakazi/{{$oneall->Countries_id}}"
                       style="padding:20px">{{$oneall->Countries_name}} </a>
                       @endforeach
                   </div></h5>


               <div class="panel-body">
                    <table class="table">
                        <thead>
                            <th>Название яхты</th>
                            <th>Даты, когда яхта занята</th>
                            <th>Статус заказа</th>
                            <th>Заказчик</th>
                        </thead>
                        <tbody>
                            @foreach($yachtName as $yachtname)
                            <tr>
                                <td>{{$yachtname->Yacht_name}}</td>
                                <td>{{$yachtname->Booking_date_otpr}} / {{$yachtname->Booking_date_prib}}</td>
                                <td>{{$yachtname->Booking_status}}</td>
                                <td>{{$yachtname->name}}<br>{{$yachtname->email}}<br>{{$yachtname->mobile}}</td>
                            </tr>


                            @endforeach
                        </tbody>

                    </table>
                    <div style="margin-left: 40%">
                        {!!$yachtName->links()!!}
                    </div>
                </div>



            </div>
        </div>
    </div>

</div>

@endsection
