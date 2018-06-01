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

    .btton {
        display: inline-block;
        vertical-align: center;
        alignment-baseline: central;
        height: 48px;
        line-height: 46px;
        padding: 0 23px;
        font-family: inherit;
        font-size: 15px;
        color: #bbb;
        text-align: center;
        text-decoration: none;
        text-shadow: 0 0 2px rgba(0, 0, 0, 0.7);
        background-color: #303030;
        background-clip: padding-box;
        border: 1px solid;
        border-color: #202020 #1a1a1a #111;
        border-radius: 20px;
        background-image: -webkit-linear-gradient(top, #3d3d3d, #272727);
        background-image: -moz-linear-gradient(top, #3d3d3d, #272727);
        background-image: -o-linear-gradient(top, #3d3d3d, #272727);
        background-image: linear-gradient(to bottom, #3d3d3d, #272727);
        -webkit-box-shadow: inset 0 1px rgba(255, 255, 255, 0.09), 0 1px 3px rgba(0, 0, 0, 0.3);
        box-shadow: inset 0 1px rgba(255, 255, 255, 0.09), 0 1px 3px rgba(0, 0, 0, 0.3);

    }

    .btton-danger {
        display: inline-block;
        vertical-align: center;
        alignment-baseline: central;
        height: 48px;
        line-height: 46px;
        padding: 0 23px;
        font-family: inherit;
        font-size: 15px;
        color: #bbb;
        text-align: center;
        text-decoration: none;
        text-shadow: 0 0 2px rgba(0, 0, 0, 0.7);
        background-color: red;
        background-clip: padding-box;
        border: 1px solid;
        border-color: #202020 #1a1a1a #111;
        border-radius: 20px;


        -webkit-box-shadow: inset 0 1px rgba(255, 255, 255, 0.09), 0 1px 3px rgba(0, 0, 0, 0.3);
        box-shadow: inset 0 1px rgba(255, 255, 255, 0.09), 0 1px 3px rgba(0, 0, 0, 0.3);

    }
</style>

<script language="javascript">
    function delet(state) {

        document.getElementById('window').style.display = state;
        document.getElementById('wrap').style.display = state;
    }

</script>

<body>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> {{ Auth::user()->name }}</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Ваши заказы:
                </div>

                <div class="table-responsive">
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
                                        Стоимость: {{$oneall->Booking_cost}} €
                                    </td>
                                    <td>
                        </div>

                        <a href="/yachts/{{$oneall->Yachts_id}}">
                            <button align="center" class="btton">Подробнее</button>
                        </a><br>

                        <div id="oplata">
                            <p :onload="oplatit()">@{{oplata}}</p>

                        </div>


                        <a href="/{{$oneall->Booking_id}}/oplata/">
                            <button align="center" class="btton">Оплатить</button>
                        </a><br><br>

                        <button class=" btton-danger" onclick="delet('block')">Отменить</button>
                        <div id="wrap">></div>
                        <div id="window">

                            <!-- Картинка крестика-->
                            <img class="close" onclick="delet('none')"
                                 src="http://sergey-oganesyan.ru/wp-content/uploads/2014/01/close.png">

                            <!-- Картинка ipad'a-->

                            <center>
                                Вы уверены, что хотите удалить заказ?<br><br><br>

                                <a href="/home" class="myButton">&nbsp&nbsp&nbsp Нет &nbsp&nbsp&nbsp </a>
                                <a style="padding-left: 40% class=" myButton"
                                href="{{url('/'.$oneall->Booking_id.'/edit/отменено')}}"> &nbsp&nbsp&nbsp Да
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
</body>