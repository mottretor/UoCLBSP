<!-- <script type="text/javascript">
	var id ,name,description,det = [];
	for(var i=0;i<listTest.length;i++){
		alert(listTest[i]);
	}
</script> -->


@foreach($listTest as $key => $data)
    <tr>   
      <li><th>{{$data->id}}</th></li>
      <li><th>{{$data->name}}</th></li>
      <li><th>{{$data->description}}</th></li>
      <li><th>{{$data->latitudes}}</th></li>
      <li><th>{{$data->longitutes}}</th></li> <br>               
    </tr>
@endforeach