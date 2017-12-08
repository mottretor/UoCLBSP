@foreach($listTest as $key => $data)
    <tr>   
      <li><th>{{$data->id}}</th></li>
      <li><th>{{$data->name}}</th></li>
      <li><th>{{$data->description}}</th></li> <br>               
    </tr>
@endforeach