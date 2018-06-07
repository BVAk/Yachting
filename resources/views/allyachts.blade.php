
 <title>Yachting</title>

 <style>

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
                    <form action="/insert" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$oneyacht->Yachts_id}}">

                        <tr><td> {{$oneyacht->Yacht_name}} <br>

                <img width="70%" src="{{asset($oneyacht->Yacht_main_photo)}}">  </td>   
                 
                <td>Год постройки: {{$oneyacht->Yacht_builtin}} <br>
               Вместимость: {{$oneyacht->Yacht_guests_count}} человек<br>
                  Стоимость: {{$oneyacht->Yacht_price}}€/за неделю<br></td>            
                 <td> <a href="{{url('/yachts/'.$oneyacht->Yachts_id)}}"><button type="submit" class="btton">Просмотр</button></a></td>

                </tr>

                    </form>

                @endforeach
              </table>
            </div>
          
        </div>

          <div style="margin-left: 40%">
                            {!!$all->links()!!}
                        </div>
      </div>
    </div>
  </div>
  @INCLUDE ('footer')
</body>