<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div>
	<div class="container">
    @if(isset($details))
        <p>Search results <b> {{ $query }} </b> are</p>
    
    {!! Form::open(['url' => '/update','method' => 'post']) !!}
            <form action="/update" method="post">
               
                <table>
                    <tr>
                        <td>
                            Name :
                        </td>
                        <td>
                            <!-- {!!Form::text('name',null,['class'=>'form-control']);!!} -->
                            <!-- @foreach($details as $user) -->
				            
				                <!-- <td>{{$user->name}}</td> -->
				                
				            
				            <!-- @endforeach -->
                            <input type="hidden" name="id" value=" {{$user->id}}">
                            <input type="text" name="name" id="name" value="{{$user->name}}">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Description :
                        </td>
                        <td>
                            <!-- <input type="text" name="Description" value=""> -->
                            <!-- {!!Form::text('description',null,['class'=>'form-control']);!!} -->
                            <input type="text" name="description" id="name" value="{{$user->description}}">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Latitude :
                        </td>
                        <td>
                            <input type="text" name="Latitudes" id="infoLat" value="{{$user->lat}}">
                            
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Longitude :
                        </td>
                        <td>
                            <input type="text" name="Longitudes" id="infoLng" value="{{$user->long}}">
                            
                        </td>
                    </tr>

                </table>

                <input type="submit" name="update" value="UPDATE">
                <input type="reset" name="delete" value="DELETE">

            
            </form>
            {!! Form::close() !!}
    @endif
 	</div>

 	
</div>
</body>
</html>
