<?
$a = DB::table('Countries')->get();
?>

@extends('layouts.app')
@section('content')
<div>
	<button class="btn btn-primary" type="submit" value="btn1">Love u </button> 
</div>

<div class="table-responsive">



<table class="table">
		@foreach ($a as $key => $data)
		<tr><td>{{$data->Countries_id}}</td> <td>{{$data->Countries_name}}</td>
		</tr>
		@endforeach
		</table>


		</div>



		@endsection