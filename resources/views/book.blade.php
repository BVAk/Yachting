@include('header')
<?$all=DB::table('yachts')->join('marinas','Yacht_marina','=','marinas.marinas_id')->join('countries','Countries.Countries_id','=','marinas.countries_countries_id')->join('Yachts_photo','Yachts.Yachts_id','=','Yachts_photo.Yachts_id')->where('Yachts.Yachts_id', $yachts_id)->paginate(15); ?>
<title>Yachting</title>
<style>
.btton {
  display: inline-block;
  vertical-align: top;
  height: 48px;
  line-height: 46px;
  padding: 0 25px;
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
  border-radius: 25px;
  background-image: -webkit-linear-gradient(top, #3d3d3d, #272727);
  background-image: -moz-linear-gradient(top, #3d3d3d, #272727);
  background-image: -o-linear-gradient(top, #3d3d3d, #272727);
  background-image: linear-gradient(to bottom, #3d3d3d, #272727);
  -webkit-box-shadow: inset 0 1px rgba(255, 255, 255, 0.09), 0 1px 3px rgba(0, 0, 0, 0.3);
  box-shadow: inset 0 1px rgba(255, 255, 255, 0.09), 0 1px 3px rgba(0, 0, 0, 0.3);

}


</style>
<script language="javascript">
  function book(){
    alert('Ваш заказ принят. Просим Вас внести предоплату в течении 2 дней ');
  }
function input() {
  var x = document.createElement("INPUT");


  var e = document.getElementById("select");
  var skipper = e.options[e.selectedIndex].text;
  document.getElementById('skipper').value = skipper;

  if (skipper == "Да") {  @foreach($all as $marina)
    {{$marina->Yacht_price}}+10;
    @endforeach
    }

  
}
</script>

<body>

  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading"> Оформление заказа</div>

          <div class="panel-body">


            @if (session('status'))
            <div class="alert alert-success">
              {{ session('status') }}
            </div>
            @endif


            <div class="form-group " style="margin-left: 50px;">

              <form action="/book" method="post">
                {{csrf_field()}}
                <label for="date">Дата отправления</label>
                <input type="date" class="form-control" id="date" name="Booking_date_otpr" placeholder="Укажите дату" onchange="     
                var dateElement = document.getElementById('date').value;
                var dateStart = new Date(dateElement); 

                if(dateElement.length > 0){
                  var dateEnd = new Date(dateStart.getFullYear(), dateStart.getMonth()+1, dateStart.getDate() + 7);
                  document.getElementById('date-end').value = dateEnd.getDate() + '.' + dateEnd.getMonth() + '.' + dateEnd.getFullYear()
                } else document.getElementById('date-end').value = 'дд.мм.гггг'
                ">

                <label for="date">Дата прибытия</label>                            
                <input type="text" class="form-control" id="date-end" name="Booking_date_prib" disabled>     

                <label for="text">Стоимость заказа</label> <br>
                @foreach($all as $marina)
                <label for="text"> {{$marina->Yacht_price}} €/за неделю
                </label>        @endforeach <br>
                <fieldset  onchange="input()" id="select" class="selectpicker">
                  <legend>Нужен ли Вам шкипер?</legend>
                  
                    <input type="radio" id="skipper" name="interest" value="withskipper">
                    <label for="withskipper">Да</label>
                    <input type="radio" id="skipper" name="interest" value="noskipper">
                    <label for="noskipper">Нет</label>

                  
                </fieldset>
                <script>
window.onclick = function onclickRadio() {
  var interest = document.getElementsByName('interest');
  for (var i = 0; i < interest.length; i++) {
    if (interest[i].type === 'radio' && interest[i].checked) {
        skipper = interest[i].value;       
    }
  }
  document.getElementById('skipper').value;
}
</script>

                <input type="text" name="Users_id" value="{{Auth::user()->id}}" style="display:none">
                <input type="text" name="Booking_status" value="не оплачено" style="display:none">
                <input type="text" name="Yachts_Yachts_id" value="{{$marina->Yachts_id}}" style="display:none">
                <input type="text" name="Booking_cost" value="{{$marina->Yacht_price}}" style="display:none">
                <a href="/book"><button class="btton" onclick="book()">Заказать </button></a>
              </form>
            </div>
          </div>




        </div>
      </div>
    </div>
  </div>


</body>