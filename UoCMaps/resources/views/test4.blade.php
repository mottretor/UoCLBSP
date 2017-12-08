@foreach($petani as $key => $data)
    <tr>    
      <th>{{$data->id_user}}</th>
      <th>{{$data->nama_user}}</th>
      <th>{{$data->alamat}}</th>
      <th>{{$data->no_telp}}</th>
      <th>{{$data->id_lokasi}}</th>                 
    </tr>
@endforeach