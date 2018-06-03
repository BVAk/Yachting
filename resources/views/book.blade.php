@include('header')
<?$all=DB::table('yachts')->join('marinas','Yacht_marina','=','marinas.marinas_id')->join('countries','Countries.Countries_id','=','marinas.countries_countries_id')->where('Yachts.Yachts_id', $yachts_id)->paginate(15);
  $Booking_date =new \DateTime('now'); ?>
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

</script>

<body>

  <div class="container">
    <div class="row">

      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading"> Оформление заказа</div>

          <div class="panel-body">


            @if (session('status'))
            <div class="alert alert-danger">
              {{ session('status') }}
            </div>
            @endif


            <div class="form-group " style="margin-left: 50px;">

              <form action="/book" method="post">
                {{csrf_field()}}
                <div id="dka">
                  @foreach($all as $marina)                <label for="date">Дата отправления</label>
                  <input type="date" min="2018-05-30" class="form-control" id="date" name="Booking_date_otpr" placeholder="Укажите дату" onchange="     
                  var dateElement = document.getElementById('date').value;
                  var dateStart = new Date(dateElement); 

                  if(dateElement.length > 0){
                    var dateEnd = new Date(dateStart.getFullYear(), dateStart.getMonth()+1, dateStart.getDate() + 7);
                    document.getElementById('date-end').value = dateEnd.getDate() + '.' + dateEnd.getMonth() + '.' + dateEnd.getFullYear()
                  } else document.getElementById('date-end').value = 'дд.мм.гггг'
                  "> 

                  <label for="date">Дата прибытия</label>                            
                  <input type="text" class="form-control" id="date-end" name="Booking_date_prib" disabled>     

                  <fieldset  onchange="input()" id="select" class="selectpicker">
                    <label>Нужен ли Вам шкипер?</label>

                    <input type="radio" id="skipper" @change="setCost(1)" name="interest" value="withskipper">
                    <label for="withskipper">Да</label>
                    <input type="radio" id="skipper" @change="setCost(0)" name="interest" value="noskipper">
                    <label for="noskipper">Нет</label> <br>
                    <label for="text">Стоимость заказа</label> <br>
                   @{{cost}}

                  </fieldset>
                 

                  <input type="text" name="Users_id" value="{{Auth::user()->id}}" style="display:none">
                  <input type="text" name="Booking_status" value="не оплачено" style="display:none">
                  <input type="text" name="Yachts_Yachts_id" value="{{$marina->Yachts_id}}" style="display:none">
                  <input type="text" style="display: none" name="cost" v-model="cost" >
                  <a href="/book"><button class="btton" onclick="book()">Заказать </button></a>
                  
                  @endforeach
                </div>
              </form>
            </div>
          </div>




        </div>
      </div>
    </div>
  </div>

  @INCLUDE ('footer')
</body>

<script type="text/javascript">
  var app = new Vue({
    el: '#dka',
    data: {

      cost: 
      @foreach($all as $marina)
      {{$marina->Yacht_price}} @endforeach


    },
    methods: {

     setCost(status){
       if(status) this.cost = parseInt(1.15 * this.cost);
       else this.cost =   @foreach($all as $marina)
        {{$marina->Yacht_price}} @endforeach;

    }

  }})
</script>