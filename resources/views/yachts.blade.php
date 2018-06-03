
 <?
 
use Carbon\Carbon;
use Carbon\CarbonInterval;
  $date = Carbon::now()->addDays(7);
    $yacht=DB::table('yachts')->join('marinas','Yacht_marina','=','marinas.marinas_id')->where('Marinas.Countries_Countries_id', $Countries_id)->where('yachts.yacht_date_contract','>=',$date)->paginate(15);
 $marina=DB::table('countries')->join('marinas','Countries_id','=','marinas.countries_countries_id')->where('Countries_Countries_id', $Countries_id)->paginate(15);

 ?>
 <title>Yachting</title>

 <style>
</style>

<body>
 @include('header')


  <div class="container">
    <div class="row">
      <div class="col-md-9 col-md-offset-2">
        <div class="panel panel-default">


          <div><h1> @foreach($marina as $name)
            {{$name->Countries_name}}
            @break

          @endforeach </h1></div>

          <div class="links" align="center">
            @foreach ($marina as $onemarina)
            <a href="{{url('/countries/'.$onemarina->Countries_id.'/'.$onemarina->Marinas_id)}}" style="padding:20px">{{$onemarina->Marinas_name}}</a>

            @endforeach
          </div>
          <div class="panel-body">
            <table class="table">
              <thead>

                <th scope="col">Название яхты</th>
                <th scope="col">О яхте</th>

              </thead>

              @foreach ($yacht as $oneyacht)

              <form action="/insert" method="POST">
                      {{ csrf_field() }}
               <input type="hidden" name="id" value="{{$oneyacht->Yachts_id}}">
          
              


              <tr><td> {{$oneyacht->Yacht_name}} <br>
                <img width="70%" src="{{asset($oneyacht->Yacht_main_photo)}}">  </td> 
                <td>Год постройки: {{$oneyacht->Yacht_builtin}} <br>
               Вместимость: {{$oneyacht->Yacht_guests_count}} человек<br>
                  Стоимость: {{$oneyacht->Yacht_price}}€/за неделю<br></td>            
                 <td> <button type="submit" class="btton">Просмотр</button></td>

                </tr>
</form>


                @endforeach
              </table>
            </div>




          </div>
        </div>
      </div>
    </div>
 @INCLUDE ('footer')

  </body>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/vue"></script>

  <script type="text/javascript">
    var app = new Vue({
      el: '#dka',
      data: {

        countView: 
        @foreach($yacht as $yacht_view)
        {{$yacht_view->Count_view}} @endforeach

      },
      methods: {
        tutorialDemo: function() {
          this.countView++


        }
      }})
    </script>