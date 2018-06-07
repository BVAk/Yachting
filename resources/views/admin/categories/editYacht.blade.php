@include('admin.layouts.app_admin')
<div class="container">
    <div class="col-md-9 col-md-offset-2">

        <div class="panel panel-default" style="margin-top: 20px;">
            <div class="panel-body">
                <h3 align="center">Изменить информацию о яхте</h3>

                <div class="panel-body">
                    <table class="table">
                        <thead>

                            <th scope="col">Название яхты</th>
                            <th scope="col">О яхте</th>

                        </thead>

                        @foreach ($yachts as $oneyacht)
                        <form action="/insert" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{$oneyacht->Yachts_id}}">

                            <tr><td> {{$oneyacht->Yacht_name}} <br>

                                <img width="70%" src="{{asset($oneyacht->Yacht_main_photo)}}">  </td>

                                <td>Год постройки: {{$oneyacht->Yacht_builtin}} <br>
                                    Вместимость: {{$oneyacht->Yacht_guests_count}} человек<br>
                                    Стоимость: {{$oneyacht->Yacht_price}}€/за неделю<br></td>
                                    <td> <a href="{{url('/admin/yachts/'.$oneyacht->Yachts_id)}}"><button type="submit" class="btton">Изменить</button></a><br>
                                    <br>    <a href="{{url('/admin/yachts/delete/'.$oneyacht->Yachts_id)}}"><button type="submit" class="btton-danger">Удалить</button></a></td>

                                </tr>

                            </form>

                            @endforeach
                        </table>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>