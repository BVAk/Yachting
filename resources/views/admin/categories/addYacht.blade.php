@include('admin.layouts.app_admin')
<div class="col-md-9 col-md-offset-2">

    <div class="panel panel-default" style="margin-top: 20px;">
        <div class="panel-body">
            <h3 align="center">Новая яхта</h3>

            <form role="form" class="col-md-12 go-right" action="{{ url('/admin/insertnewyacht') }}" method="post"
                  enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="trip">Название</label>
                    <input id="Yacht_name" name="Yacht_name" type="text" class="form-control" value="" required>

                </div>


                <div class="form-group">
                    <label for="Yacht_builtin">Год постройки</label>
                    <input id="Yacht_builtin" name="Yacht_builtin" type="text" class="form-control" value="" required>

                </div>

                <div class="form-group">
                    <label for="Yacht_cabins_count">Кол-во кают</label>
                    <input id="Yacht_cabins_count" name="Yacht_cabins_count" type="text" class="form-control" value=""
                           required>

                </div>

                <div class="form-group">
                    <label for="Yacht_toilets_count">Кол-во гальюнов</label>
                    <input id="Yacht_toilets_count" name="Yacht_toilets_count" type="text" class="form-control" value=""
                           required>

                </div>


                <div class="form-group">
                    <label for="Yacht_guests_count">Кол-во людей</label>
                    <input id="Yacht_guests_count" name="Yacht_guests_count" type="text" class="form-control" value=""
                           required>

                </div>


                <div class="form-group">
                    <label for="Yacht_length">Длина яхты</label>
                    <input id="Yacht_length" name="Yacht_length" type="text" class="form-control" value="" required>

                </div>

                <div class="form-group">
                    <label for="Yacht_price">Цена аренды яхты на неделю (цена в евро)</label>
                    <input id="Yacht_price" name="Yacht_price" type="text" class="form-control" value="" required>

                </div>

                <div class="form-group">
                    <label for="Yacht_owner_name">Владелец яхты</label>
                    <input id="Yacht_owner_name" name="Yacht_owner_name" type="text" class="form-control" value=""
                           required>

                </div>

                <div class="form-group">
                    <label for="Yacht_date_contract">Контракт с яхтой действет до</label>
                    <input id="Yacht_date_contract" name="Yacht_date_contract" type="date" class="form-control" value=""
                           required>

                </div>


                <div class="form-group">
                    <label for="Yacht_type">Выбрать тип яхты</label>
                    <input id="Yacht_type" name="Yacht_type" type="text" class="form-control" value="моторная яхта|парусная яхта|катамаран"
                           required>


                </div>

                <div class="panel panel-default">

                    <div class="panel-body">
                        <div class="col-md-6">


                            <p style="font-size: 20px;">Выбор марины</p>

                            <select id="select" name="Yacht_marina" class="selectpicker" style="font-size: 20px;"
                                    required>
                                <option value=""> ---</option>
                                @foreach($marinas as $marinas)
                                    <option value="{{$marinas->Marinas_id}}">{{$marinas->Marinas_name}}</option>
                                @endforeach
                            </select>

                        </div>

                    </div>
                </div>

                <div class="form-group">
                    <label for="Yacht_about">Описание</label>
                    <input id="Yacht_about" name="Yacht_about" type="text" class="form-control" value="" required>

                </div>
                <div class="form-group">
                    <label for="Yacht_main_photo">Выбрать главное фото</label>
                    <input type="file" name="Yacht_main_photo"><br>
                </div>

                <div class="form-group">
                    <label for="Yacht_structure">Выбрать фото со структурой яхты </label>
                    <input type="file" name="Yacht_structure"><br>
                </div>
                <div class="form-group">
                    <input class="btn btn-success center-block btn-lg" type="submit" value="Добавить">
                </div>


            </form>


        </div>
    </div>


</div>
</div>
</div>