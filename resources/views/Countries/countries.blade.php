@include('header')


<style>
.column {border: 1px solid #DDD;
    padding: 10px 10px;
    margin: 10px;
    width: 350px;
    float: left;
    height:400x; 
    text-align: center;

}
.row:after{

display: table;
clear: both;
}
</style>
<body>

	<div class="container">
		<div class="row">

			<div class="col-md-8 col-md-offset-2">
				
				<div class="panel panel-default">
					<div class="panel-body">

						<div class="content row" width="800px" text-align="center">
							@foreach ($a as $key => $data)
							<div class="column">
								<tr class="category-list clearfix"><td> <a href="/countries/{{$data->Countries_id}}" > {{$data->Countries_name}}</a></td><br>
									<td><a href="/countries/{{$data->Countries_id}}"> <img height="200px" src="{{asset($data->Countries_photo)}}"></a></td>
								</tr>

								</div>
								@endforeach

							</div>
						</div>
					</div>
				</div>
			</div>


		</body>