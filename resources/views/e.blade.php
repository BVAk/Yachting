<head>
	<style>
		/* Ночь */

 .time-night{background:url('{{asset('image/night.jpg')}}');}

 /* Утро */

 .time-morning{background:url(image/morning.jpg);}

 /* День */

 .time-day{background:url(image/day.jpg);}


</style>
</head>
<body>

<?php
date_default_timezone_set('Europe/Kiev');
$now_hours = date('H');
if($now_hours<7)
{
$time = 'time-night';
}
elseif($now_hours>7 && $now_hours<=12 )
{
$time = 'time-morning';
}
elseif($now_hours>12 && $now_hours<18)
{
$time = 'time-day';
}

?>
<div id="head" class="<?php echo $time; ?>"></div>
</body>