@include('header')
<style>
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
</style>

<script language="javascript">


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
          @foreach ($all as $oneall)
          <tr> 
            <td>{{$oneall->Booking_date_otpr}} - {{$oneall->Booking_date_prib}} </td>
            <td>{{$oneall->Yacht_name}} <br>
              <img width="300px" src="{{asset($oneall->Yachts_photo_url)}}"> </td> 
              <td>Страна: {{$oneall->Countries_name}} <br>Марина: {{$oneall->Marinas_name}}
              </td>
              <td>Статус заказа: {{$oneall->Booking_status}}<br> 
                Стоимость: {{$oneall->Booking_cost}} €
              <td>  <button align="center"  onclick="/yachts/{yachts_id}" class="btton">Подробнее </button><br> <button align="center"  class="btton">Оплатить </button><br><br>
               <button align="center" class="btton" name="Booking_id"  onclick="" value='{{$oneall->Booking_id}}'>Отменить</button></td></td>
              </tr>

              @endforeach
              <tbody>
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


</body>