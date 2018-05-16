 <?
 $all=DB::table('yachts')->join('marinas','Yacht_marina','=','marinas.marinas_id')->join('countries','Countries.Countries_id','=','marinas.countries_countries_id')->join('Yachts_photo','Yachts.Yachts_id','=','Yachts_photo.Yachts_id')->paginate(5);
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

            @foreach ($all as $oneall)
            <tr> <td>{{$oneall->Yacht_name}} <br>
              <img width="300px" src="{{asset($oneall->Yachts_photo_url)}}"> </td> 
              <td><br>{!!$oneall->Yacht_about!!} <br>
                <a href="{{url('/yachts/'.$oneall->Yachts_id)}}"> <button padding="100px" class="btton" >Просмотр </button> </a></td>

              </tr>
              @endforeach
            </table>
          </div>

          
          
        </div>
      </div>
    </div>
  </div>
  
</body>