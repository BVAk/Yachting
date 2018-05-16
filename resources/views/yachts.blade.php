 @include('header')
 <?
 $marina=DB::table('countries')->join('marinas','Countries_id','=','marinas.countries_countries_id')->where('Countries_Countries_id', $Countries_id)->paginate(15);
 $yacht=DB::table('yachts')->join('marinas','Yacht_marina','=','marinas.marinas_id')->join('Yachts_photo','Yachts.Yachts_id','=','Yachts_photo.Yachts_id')->where('Marinas.Countries_Countries_id', $Countries_id)->paginate(15);
 ?>
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

<body>



  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">


          <div><h1> @foreach($marina as $name)
            {{$name->Countries_name}}
            @break

          @endforeach </h1></div>

          <div class="links" align="center">
            @foreach ($marina as $onemarina)
            <a href="{{url($onemarina->Marinas_name)}}" style="padding:20px">{{$onemarina->Marinas_name}}</a>

            @endforeach
          </div>
          <div class="panel-body">
            <table class="table">
              <thead>

                <th scope="col">Название яхты</th>
                <th scope="col">О яхте</th>

              </thead>

              @foreach ($yacht as $oneyacht)
              <tr> <td>{{$oneyacht->Yacht_name}} <br>
                <img width="300px" src="{{asset($oneyacht->Yachts_photo_url)}}"> </td> 
                <td><br>{!!$oneyacht->Yacht_about!!} <br>
                 <div  @click="tutorialDemo"> <a href="{{url('/yachts/'.$oneyacht->Yachts_id)}}"> <button padding="1000px" class="btton">Просмотр </button> </a> 
                  <form action="/yachts" method="post">
                    <input type="text" name="countView" value=4 disabled="true">
                    <input type="text" name="id" value={{$oneyacht->Yachts_id}} disabled="true">     
                  </form>
                </div></td>

                </tr>



                @endforeach
              </table>
            </div>




          </div>
        </div>
      </div>
    </div>


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