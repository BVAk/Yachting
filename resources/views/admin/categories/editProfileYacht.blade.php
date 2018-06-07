<?$yachts = DB::table('yachts')->where('Yachts_id','=',$Yachts_id)->get();
$marinas=DB::table('marinas')->get();?>

@include('admin.layouts.apps_admin')
<div class="container">
<div class="col-md-9 col-md-offset-2">

    <div class="panel panel-default" style="margin-top: 20px;">
        <div class="panel-body">
            <h3 align="center">Изменение яхты</h3>
            @foreach ($yachts as $yachts)
            <form role="form" class="col-md-12 go-right" action="{{ url('/admin/edityacht') }}" method="post"
            enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="Yachts_id" value="{{$yachts->Yachts_id}}">
            <div class="form-group">
                <label for="trip">Название</label>
                <input id="Yacht_name" name="Yacht_name" type="text" class="form-control" value="{{$yachts->Yacht_name}}" required>

            </div>


            <div class="form-group">
                <label for="Yacht_builtin">Год постройки</label>
                <input id="Yacht_builtin" name="Yacht_builtin" type="text" class="form-control" value="{{$yachts->Yacht_builtin}}" required>

            </div>

            <div class="form-group">
                <label for="Yacht_cabins_count">Кол-во кают</label>
                <input id="Yacht_cabins_count" name="Yacht_cabins_count" type="text" class="form-control" value="{{$yachts->Yacht_cabins_count}}"
                required>

            </div>

            <div class="form-group">
                <label for="Yacht_toilets_count">Кол-во гальюнов</label>
                <input id="Yacht_toilets_count" name="Yacht_toilets_count" type="text" class="form-control" value="{{$yachts->Yacht_toilets_count}}"
                required>

            </div>


            <div class="form-group">
                <label for="Yacht_guests_count">Кол-во людей</label>
                <input id="Yacht_guests_count" name="Yacht_guests_count" type="text" class="form-control" value="{{$yachts->Yacht_guests_count}}"
                required>

            </div>


            <div class="form-group">
                <label for="Yacht_length">Длина яхты</label>
                <input id="Yacht_length" name="Yacht_length" type="text" class="form-control" value="{{$yachts->Yacht_length}}" required>

            </div>

            <div class="form-group">
                <label for="Yacht_price">Цена аренды яхты на неделю (цена в евро)</label>
                <input id="Yacht_price" name="Yacht_price" type="text" class="form-control" value="{{$yachts->Yacht_price}}" required>

            </div>

            <div class="form-group">
                <label for="Yacht_owner_name">Владелец яхты</label>
                <input id="Yacht_owner_name" name="Yacht_owner_name" type="text" class="form-control" value="{{$yachts->Yacht_owner_name}}"
                required>

            </div>

            <div class="form-group">
                <label for="Yacht_date_contract">Контракт с яхтой действет до</label>
                <input id="Yacht_date_contract" name="Yacht_date_contract" type="date" class="form-control" value="{{$yachts->Yacht_date_contract}}"
                required>

            </div>


            <div class="form-group">
                <label for="Yacht_type">Выбрать тип яхты</label>
                <input id="Yacht_type" name="Yacht_type" type="text" class="form-control" value="{{$yachts->Yacht_type}}"
                required>


            </div>


            <div class="form-group">
                <label for="Yacht_about">Описание</label>
                <input id="Yacht_about" name="Yacht_about" type="text" class="form-control" value="{{$yachts->Yacht_about}}" required>

            </div>

            <div class="form-group">
                <input class="btn btn-success center-block btn-lg" type="submit" value="Сохранить">
            </div>


        </form>
        @endforeach


    </div>
</div>


</div></div>