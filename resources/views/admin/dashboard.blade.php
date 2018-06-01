<?
date_default_timezone_set('UTC');
$date = date('Y-m-d', time());
$users = DB::table('users')->count();
$yachts=DB::table('yachts')->count();
$yachtName=DB::table('yachts')->get();
$yacht = DB::table('booking')->join('yachts','booking.yachts_yachts_id','=','yachts.yachts_id')->get();

$booking = DB::table('booking')->select(DB::raw('count(*) as booking_count, booking_date'))->groupBy('booking_date')->get();
$bookingnow = DB::table('booking')->select(DB::raw('count(*) as booking_count, booking_date'))->groupBy('booking_date')->where('booking_date','=',$date)->get();
$bookings= DB::table('booking')->where('booking.booking_status','=','оплачено')->get();
?>

@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        <div class="row" id="select">
             <select  name="country" id="yacht-select" onchange="setYacht()" class="selectpicker" >
                      @foreach ($yachtName as $key => $data)
                      <option value="{{$data->Yacht_name}}">{{$data->Yacht_name}}</option>
                      
                      @endforeach

                  </select>
              

            <div class="col-sm-3">
                <div class="jumbotron text-center">
                    <p><span class="label label-primary">Яхт {{$yachts}}</span></p>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="jumbotron text-center">
                    <p><span class="label label-primary">Пользователей {{$users}}</span></p>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="jumbotron text-center">
                    <p><span class="label label-primary">Сегодня  @foreach ($bookingnow as $booking_count) {{$booking_count->booking_count}} @endforeach </span></p>
                </div>
            </div>
        </div>

       
        <div id="inform"></div>
        

        

        @foreach($booking as $booking)
            Заказов в этот день:  {{$booking->booking_date}} - {{$booking->booking_count}} <br>
        @endforeach
    </div>


@endsection
@section('scripts')
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
  function setYacht() {
     var app = new Vue({
    el: '#select',
    data: {

      yacht: 
       document.getElementById('yacht-select').value;
    

    },
    methods: {

     setYacht(){
       
       
console.log(this.yacht);
    }

  }})
  }
</script>
@endsection