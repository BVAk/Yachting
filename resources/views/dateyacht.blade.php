 <?
 $all=DB::table('yachts')->join('marinas','Yacht_marina','=','marinas.marinas_id')->join('countries','Countries.Countries_id','=','marinas.countries_countries_id')->paginate(5);
$countries=DB::table('countries')->paginate(14);
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

  @include('header')



  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">

         <div class="links" align="center">
          @foreach ($countries as $oneall)
          <a href="/countries/{{$oneall->Countries_id}}" style="padding:20px">{{$oneall->Countries_name}} </a>


          @endforeach
        </div>
          <div class="panel-body">
            <table class="table">
              <thead>

                <th scope="col">Название яхты</th>
                <th scope="col">О яхте</th>

              </thead>

              @foreach ($all as $oneyacht)
              <tr><td> {{$oneyacht->Yacht_name}} <br>

                <img width="70%" src="{{asset($oneyacht->Yacht_main_photo)}}">  </td>   
                 
                <td>Год постройки: {{$oneyacht->Yacht_builtin}} <br>
               Вместимость: {{$oneyacht->Yacht_guests_count}} человек<br>
                  Стоимость: {{$oneyacht->Yacht_price}}€/за неделю<br></td>            
                 <td> <a href="{{url('/yachts/'.$oneyacht->Yachts_id)}}"><button class="btton">Просмотр</button></a></td>

                </tr>



                @endforeach
              </table>
            </div>
          
          
        </div>
      </div>
    </div>
  </div>
  
</body>