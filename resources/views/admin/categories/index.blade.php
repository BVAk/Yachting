<?
$yachtName=DB::table('yachts')->get();?>
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
            @foreach ($yachtName as $key => $data)
                <option value="{{$data->Yacht_name}}">{{$data->Yacht_name}}</option>

            @endforeach

        </select>
    </div>
    </div>

@endsection
<script>

    Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('content');

    new Vue({
        el: '#inform',
        data: {
            inf: []
        },
        mounted: function () {
            this.fetchInf();
        },

        methods: {
            fetchInf: function () {
                this.$http.get('http://jsonplaceholder.typicode.com/posts').then(function (response) {
                    this.inf = response.body;
                    console.log(this.inf);
                })
            }
        }
    });

</script>

<script type="text/javascript">
    Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('content');
        var app = new Vue({
            el: '#select',
            data: {

                yacht:
                [document.getElementById('yacht-select').value]


    },
        methods: {

            setYacht:function(){
                console.log(this.yacht);
            }

        }})

</script>