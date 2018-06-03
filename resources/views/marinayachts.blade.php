 @include('header')
 <?
 $marina=DB::table('countries')->join('marinas','Countries_id','=','marinas.countries_countries_id')->where('Countries_Countries_id', $Countries_id)->where('Marinas.Marinas_id', $Marinas_id)->paginate(15);
 $yacht=DB::table('yachts')->join('marinas','Yacht_marina','=','marinas.marinas_id')->where('Marinas.Marinas_id', $Marinas_id)->paginate(15);
 ?>
 <title>Yachting</title>

 <style>

</style>

<body>



  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">


          <div>
            @foreach ($marina as $onemarina)
          <h1> <a href="/countries/{{$onemarina->Countries_id}}"> {{$onemarina->Countries_name}}</a> - {{$onemarina->Marinas_name}}</h1>
            @break
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
                 <td> <a href="{{url('/yachts/'.$oneyacht->Yachts_id)}}"><button typr="submit" class="btton">Просмотр</button></a></td>

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
