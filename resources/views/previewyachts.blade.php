<html>  @include('header')
<?
$yacht = DB::table('yachts')->join('marinas', 'Yacht_marina', '=', 'marinas.marinas_id')->join('countries', 'marinas.Countries_Countries_id', '=', 'countries.countries_id')->join('Yachts_photo', 'Yachts.Yachts_id', '=', 'Yachts_photo.Yachts_id')->where('Yachts.Yachts_id', $yachts_id)->paginate(15);
?>
<title>Yachting</title>
<!-- Bootstrap CSS -->
<link href="bootstrap\css/bootstrap.min.css" rel="stylesheet">
<!-- fancyBox3 CSS -->
<link href="\fancybox-master\dist/jquery.fancybox.min.css" rel="stylesheet">

<!-- fancyBox JS -->
<script src="\fancybox-master\dist/jquery.fancybox.min.js"></script>
<style>
    .btton {
        display: inline-block;
        vertical-align: top;
        height: 48px;
        line-height: 46px;
        padding: 0 25px;
        font-family: inherit;
        font-size: 20px;
        color: white;
        text-align: center;
        text-decoration: none;
        text-shadow: 0 0 2px rgba(0, 0, 0, 0.7);
        background-color: #303030;
        background-clip: padding-box;
        border: 1px solid;
        border-color: #202020 #1a1a1a #111;
        border-radius: 25px;
        background-image: -webkit-linear-gradient(top, limegreen,palegreen );
        background-image: -moz-linear-gradient(top,limegreen,palegreen);
        background-image: -o-linear-gradient(top,limegreen,palegreen);
        background-image: linear-gradient(to bottom, limegreen,palegreen);
        -webkit-box-shadow: inset 0 1px rgba(255, 255, 255, 0.09), 0 1px 3px rgba(0, 0, 0, 0.3);
        box-shadow: inset 0 1px rgba(255, 255, 255, 0.09), 0 1px 3px rgba(0, 0, 0, 0.3);

    }

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

                @if (Route::has('login'))
                    <div class="top-right links">
                        @auth


                            <div><h1> @foreach($yacht as $countryname)
                                        {{$countryname->Countries_name}}
                                </h1></div>

                            <div class="links">
                                <a href="/countries/{{$countryname->Countries_id}}/{{$countryname->Marinas_id}}"
                                   style="padding:20px">{{$countryname->Marinas_name}}</a>
                            </div>
                            @break

                            @endforeach
                            <div class="panel-body">
                                <table class="table">
                                    <thead>
                                    @foreach ($yacht as $oneyacht)
                                        <h1 align="center">{{$oneyacht->Yacht_name}} </h1>
                                        <div thumb><img class="img-fluid" width="100%"
                                                        src="{{asset($oneyacht->Yacht_main_photo)}}"></div>
                                        @BREAK @endforeach</thead>
                                    <tr>
                                        <td>


                                            <div>

                                                @foreach ($yacht as $oneyacht)

                                                    <div class=" col-lg-2 col-md-2 col-3 thumb">
                                                        <a data-fancybox="gallery"
                                                           href="{{asset($oneyacht->Yachts_photo_url)}}">
                                                            <img class="img-fluid" height="150px"
                                                                 src="{{asset($oneyacht->Yachts_photo_url)}}">
                                                        </a>
                                                    </div>


                                                @endforeach


                                            </div>


                                        </td>
                                    </tr>
                                    @foreach ($yacht as $oneyacht)

                                        <tr>
                                            <td align="justify">
                                                {!!$oneyacht->Yacht_about!!} <br>
                                                {{$oneyacht->Yacht_price}}€/за неделю
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img src="{{asset($oneyacht->Yacht_structure)}}"></td>


                                        </tr>
                                        @break

                                    @endforeach
                                </table>
                                <br>
                                @foreach ($yacht as $oneyacht)
                                    <div align="center">
                                    <a href="/booking/{{$oneyacht->Yachts_id}}">
                                        <button padding="100px" class="btton">Заказать</button>
                                    </a>
                                    @break
                            </div>

                            @endforeach
                    </div>

                @else

                    <div class="panel-body" align="center">
                        <h3> Для дальнейшей работы зарегистрируйтесь или войдите в свой аккаунт!</h3><br><br>
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a></div>
                @endauth
            </div>
            @endif
        </div>
    </div>
</div>


</div>

<form action="/yachts/{yachts_id}" method="post">

    <input type="text" name="id" value={{$yachts_id}} style="display: none">

</form>
@INCLUDE ('footer')
</body>

<script src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
        integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
        integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
        crossorigin="anonymous"></script>
<script src="https://unpkg.com/vue"></script>


<script src="photo/lightbox/js/lightbox-plus-jquery.min.js"></script>

</html>