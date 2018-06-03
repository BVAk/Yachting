<? $routes = DB::table('Routes')->join('Countries', 'Routes.Countries_id', '=', 'Countries.Countries_id')->get()
?>
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
                    @foreach ($routes as $oneroute)
                        <a href="/routes/{{$oneroute->Countries_id}}" style="padding:20px">{{$oneroute->Countries_name}} </a>
@break

                    @endforeach
                </div>

                <div class="panel-body">


                    <div class="content row" width="100%" text-align="center">
                        @foreach ($routes as $oneroute)
                            <div class="column">
                                <tr class="category-list clearfix">
                                    <td><a href="/routes/{{$oneroute->Routes_id}}"> {{$oneroute->Routes_name}}</a></td>
                                    <br>

                                </tr>

                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

@INCLUDE ('footer')
</body>