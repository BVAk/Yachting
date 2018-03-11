<html>
<style>
body{
      background-image: url($imagee);
}      
</style>

<?
      date_default_timezone_set('Europe/Kiev');
      echo date('l \t\h\e jS <br>');
      $today = date("H:i:s");  
      $time = date("H");
      echo $today;
      echo $time;

      if ($time >=20 and $time <=24){
           ?><link href="{{asset('css/style-1.css')}}" rel="stylesheet" type="text/css" media="screen" /><?
      }
      elseif ($time>12 and $time<20){?>
      	 <div style="background-image:url('{{asset('image/main.jpg')}}')"></div><?
      }
      else{?>
      	 $imagee= "{{asset('image/night.jpg')}}";
      	<?}


            ?>
