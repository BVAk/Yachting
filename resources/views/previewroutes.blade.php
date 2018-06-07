<html>  @include('header')
<?
$route = DB::table('Routes')->join('Countries', 'Routes.Countries_id', '=', 'Countries.Countries_id')->where('Routes_id', $routes_id)->get();
?>
<title>Yachting</title>
<!-- Bootstrap CSS -->
<link href="bootstrap\css/bootstrap.min.css" rel="stylesheet">
<!-- fancyBox3 CSS -->
<link href="\fancybox-master\dist/jquery.fancybox.min.css" rel="stylesheet">

<!-- fancyBox JS -->
<script src="\fancybox-master\dist/jquery.fancybox.min.js"></script>
<style>

    .thumb img {
        -webkit-filter: grayscale(0);
        filter: none;
        border-radius: 5px;
        background-color: #fff;
        border: 1px solid #ddd;
        padding: 5px;
    }

    .thumb img:hover {
        -webkit-filter: grayscale(1);
        filter: grayscale(1);
    }

    .thumb {
        padding: 5px;
    }
</style>

<body>
<div class="container" id="dka" @load="tutorialDemo">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">



                            <div><h1> @foreach($route as $countryname)
                                        <a href="/countries/{{$countryname->Countries_id}}/">  {{$countryname->Countries_name}}</a>
                                        @break

                                    @endforeach    </h1></div>

                            <div class="panel-body">


                                    @foreach ($route as $oneyacht)
                                        <h1 align="center">{!! $oneyacht->Routes_description !!} </h1>


                                        @BREAK @endforeach</thead>

                                <br>
                                <br>
                                @foreach ($route as $oneyacht)
                                    <div align="center">
                                    <a href="/countries/{{$oneyacht->Countries_id}}">

                                        <button padding="100px" class="btton-look">Просмотреть яхты в этой стране</button>
                                    </a>

                                    @break
                            </div>

                            @endforeach
                    </div>


            </div>

        </div>
    </div>
</div>


</div>

@INCLUDE ('footer')
</body>
</html>