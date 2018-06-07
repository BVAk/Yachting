
@include('header')
<style>

    #wrap {
        display: none;
        opacity: 0.8;
        position: fixed;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        padding: 16px;
        background-color: rgba(1, 1, 1, 0.725);
        z-index: 100;
        overflow: auto;
    }

    #window {
        width: 400px;
        height: 250px;
        margin: 50px auto;
        display: none;
        background: #fff;
        z-index: 200;
        position: fixed;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        padding: 16px;
    }

    .close {
        margin-left: 364px;
        margin-top: 4px;
        cursor: pointer;
    }

</style>

<script language="javascript">
    function delet(state) {

        document.getElementById('window').style.display = state;
        document.getElementById('wrap').style.display = state;
    }

</script>

<script type="text/javascript">
    function printContent(el) {
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcontent;
        window.show();
        document.body.innerHTML = restorepage;
    }
</script>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-9 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" align="center"><h3> {{ Auth::user()->name }},     @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Ваши заказы: </h3></div>


                <div class="table">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Дата тура</th>
                            <th>Выбор яхты</th>
                            <th>Выбор путешествия</th>
                            <th>Состояние заказа</th>
                        </tr>
                        </thead>
                        <tbody>
                        <div id="1">
                            @foreach ($all as $oneall)
                                <tr>
                                    <td>{{$oneall->Booking_date_otpr}} - {{$oneall->Booking_date_prib}} </td>
                                    <td>{{$oneall->Yacht_name}} <br>
                                        <img width="300px" src="{{asset($oneall->Yacht_main_photo)}}"></td>
                                    <td>Страна: {{$oneall->Countries_name}} <br>Марина: {{$oneall->Marinas_name}}
                                    </td>
                                    <td>Статус заказа: {{$oneall->Booking_status}}<br>
                                        Стоимость: <br>{{$oneall->Booking_cost}} €
                                    </td>
                                    <td>
                        </div>

                        <a href="/yachts/{{$oneall->Yachts_id}}">
                            <button align="center" class="btton-click">Подробнее</button>
                        </a><br>
                        {!!$oneall->Podtver!!}

                        <div id="oplata">
                            <p :onload="oplatit()"></p>

                        </div>


                        <a href="/{{$oneall->Booking_id}}/oplata/">
                            <button align="center" class="btton">Оплатить</button>
                        </a><br><br>

                        <button class=" btton-danger" name="booking_id" onclick="delet('block')" value="{{$oneall->Booking_id}}">Отменить</button>

                        <div id="wrap">></div>

                        <div id="window">

                            <!-- Картинка крестика-->
                            <img class="close" onclick="delet('none')"
                                 src="http://sergey-oganesyan.ru/wp-content/uploads/2014/01/close.png">

                            <!-- Картинка ipad'a-->

                            <center>
                                Вы уверены, что хотите удалить заказ?<br><br><br>

                                <a href="/home" class="myButton">&nbsp&nbsp&nbsp Нет &nbsp&nbsp&nbsp </a>
                                <a style="padding-left: 40%" class="myButton"
                                href="/{{$oneall->Booking_id}}/edit/отменено"> &nbsp&nbsp&nbsp Да
                                &nbsp&nbsp&nbsp</a>

                            </center>

                        </div>


                        </td>

                        </tr>


                        @endforeach

                        </tbody>
                    </table>
                </div>
                <div style="margin-left: 40%">
                    {!!$all->links()!!}
                </div>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">
    var app = new Vue({
        el: '#oplata',
        data: {

            oplata:[
            @foreach($all as $isset)
            {{$isset->Booking_status}} @endforeach
],
            url:[
    @foreach($all as $isset){{$isset->Booking_id}} @endforeach
]
        },
        methods: {
             oplatit:function()
    {
        if (this.oplata != "не оплачено") {

            @foreach($all as $isset)

                this.oplata = "/"+this.url+"/oplata/";
                @endforeach
        } else {
            this.oplata="OPlacheno";
        } // noinspection JSAnnotator

    }
    }
    })
</script>

@INCLUDE ('footer')
</body>