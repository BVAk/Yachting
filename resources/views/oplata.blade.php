
@include('header')
<?php $all=DB::table('yachts')->join('booking','yachts.yachts_id','=','booking.Yachts_Yachts_id')->join('marinas','yachts.yacht_marina','=','marinas.marinas_id')->join('countries','marinas.countries_countries_id','=','countries.countries_id')->where('booking.booking_id',$Booking_id)->paginate(5);  ?>

<style>


.close{
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
  background-image: #800000;

  -webkit-box-shadow: inset 0 1px rgba(255, 255, 255, 0.09), 0 1px 3px rgba(0, 0, 0, 0.3);
  box-shadow: inset 0 1px rgba(255, 255, 255, 0.09), 0 1px 3px rgba(0, 0, 0, 0.3);

}
</style>



<body>

  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">

          <div class="panel-body">
            @if (session('booking_id'))
            <div class="alert alert-success">
              {{ session('booking_id') }}
            </div>
            @endif
            @if (session('status'))
            <div class="alert alert-success">
              {{ session('status') }}
            </div>
            @endif

            <h1> Оплата</h1>
          </div>

          <div class="table-responsive" >
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
             @foreach ($all as $oneall)
             <tr> 
              <td>
               {{$oneall->Booking_date_otpr}} - {{$oneall->Booking_date_prib}} </td>
               <td>{{$oneall->Yacht_name}} <br>
                <img width="300px" src="{{asset($oneall->Yacht_main_photo)}}"> </td> 
                <td>Страна: {{$oneall->Countries_name}} <br>Марина: {{$oneall->Marinas_name}}
                </td>
                <td>Статус заказа: {{$oneall->Booking_status}}<br> 
                  Стоимость:<br> {{$oneall->Booking_cost}} €</td><td>



                  </td>

                </tr>



                @endforeach

              </tbody>
            </table>
            <form action="/url" role="form" method="POST" enctype="multipart/form-data">
              {{csrf_field()}}
              @foreach ($all as $oneall) <div align="center">
                Для подтверждении брони, просим оплатить половину стоимости Вашего заказа: <h3>{{($oneall->Booking_cost)/2}} €</h3>
                <h5>Реквизиты:</h5> карточка ПриватБанка: <br> <h3> #4731217104018815</h3><br>
                Получатель Карпин Владимир Йосипович. <br>

              <input type="file" name="image"<br><br>
                    <div class="panel-default">
              <input type="hidden" name="booking_id" value="{{$oneall->Booking_id}}">
                    </div>

               <button align="center" type="submit" class="btton">Оплатить </button></div>@endforeach 
             </form>
             <br><br>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>

  @INCLUDE ('footer')
</body>