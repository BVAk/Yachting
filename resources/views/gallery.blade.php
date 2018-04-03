<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>
/* demo background */
body{
background: #200122;
background: -webkit-linear-gradient(to right, #6f0000, #200122);
background: linear-gradient(to right, #6f0000, #200122);
}

/* style snippet */
#thumbnail-preview-indicators {
position: relative;
overflow: hidden;
}
#thumbnail-preview-indicators .slides .slide-1, 
#thumbnail-preview-indicators .slides .slide-2,
#thumbnail-preview-indicators .slides .slide-3 {
background-size: cover;
background-position: center center;
background-repeat: no-repeat;
}
#thumbnail-preview-indicators,
#thumbnail-preview-indicators .slides,
#thumbnail-preview-indicators .slides .slide-1, 
#thumbnail-preview-indicators .slides .slide-2,
#thumbnail-preview-indicators .slides .slide-3 {
height: 480px;
}
#thumbnail-preview-indicators .slides .slide-1 {
background-image: url(http://bootstraptema.ru/snippets/slider/2017/thumbslider/thumbslider-1.jpg); 
}
#thumbnail-preview-indicators .slides .slide-2 {
background-image: url(http://bootstraptema.ru/snippets/slider/2017/thumbslider/thumbslider-2.jpg);
}
#thumbnail-preview-indicators .slides .slide-3 {
background-image: url(http://bootstraptema.ru/snippets/slider/2017/thumbslider/thumbslider-3.jpg);
}
#thumbnail-preview-indicators .carousel-inner .item .carousel-caption {
top: 20%;
bottom: inherit;
}
#thumbnail-preview-indicators .carousel-indicators li,
#thumbnail-preview-indicators .carousel-indicators li.active {
position: relative;
width: 100px;
height: 8px; 
}
#thumbnail-preview-indicators .carousel-indicators li > .thumbnail {
position: absolute;
top: 0;
width: 100px;
display: none;
opacity: 0;
left: 50%;
margin-top: -80px;
margin-left: -50px;
}
#thumbnail-preview-indicators .carousel-indicators li:hover > .thumbnail,
#thumbnail-preview-indicators .carousel-indicators li.active > .thumbnail {
display: block;
opacity: .8;
}
#thumbnail-preview-indicators .carousel-indicators li.active > .thumbnail:hover{
opacity: 1;
}
@media screen and (max-width : 480px) { 
#thumbnail-preview-indicators .carousel-indicators li,
#thumbnail-preview-indicators .carousel-indicators li.active {
width: 50px;
height: 8px;
position: relative;
}
#thumbnail-preview-indicators .carousel-indicators li > .thumbnail {
width: 50px;
left: 50%;
margin-top: -50px;
margin-left: -25px;
}
}
</style>

<div id="thumbnail-preview-indicators" class="carousel slide" data-ride="carousel">
<!-- Indicators -->
<ol class="carousel-indicators">
<li data-target="#thumbnail-preview-indicators" data-slide-to="0" class="active">
<div class="thumbnail">
<img class="img-responsive" src="http://bootstraptema.ru/snippets/slider/2017/thumbslider/thumbslider-1.jpg">
</div>
</li>
<li data-target="#thumbnail-preview-indicators" data-slide-to="1">
<div class="thumbnail">
<img class="img-responsive" src="http://bootstraptema.ru/snippets/slider/2017/thumbslider/thumbslider-2.jpg">
</div>
</li>
<li data-target="#thumbnail-preview-indicators" data-slide-to="2">
<div class="thumbnail">
<img class="img-responsive" src="http://bootstraptema.ru/snippets/slider/2017/thumbslider/thumbslider-3.jpg">
</div>
</li>
</ol>
<div class="carousel-inner">
<div class="item slides active">
<div class="slide-1"></div>
<div class="container">
<div class="carousel-caption">
<h1>Thumb indicator carousel</h1>
<p>Responsive thumbnail preview in carousel indicators</p>
<p class="lead"><a class="btn btn-lg btn-link" href="#" role="button">THUMBSLIDER</a></p>
</div>
</div>
</div>
<div class="item slides">
<div class="slide-2"></div>
<div class="container">
<div class="carousel-caption">
<h1>Another example headline one</h1>
<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam</p>
<p><a class="btn btn-lg btn-link" href="#" role="button">THUMBSLIDER</a></p>
</div>
</div>
</div>
<div class="item slides">
<div class="slide-3"></div>
<div class="container">
<div class="carousel-caption">
<h1>One more for good measure.</h1>
<p>Nullam id dolor id nibh ultricies vehicula ut id elit</p>
<p><a class="btn btn-lg btn-link" href="#" role="button">THUMBSLIDER</a></p>
</div>
</div>
</div>
</div>
<a class="left carousel-control" href="#thumbnail-preview-indicators" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
<a class="right carousel-control" href="#thumbnail-preview-indicators" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
</div>