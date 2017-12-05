@section('content')

<!-- include header --> 

<div>
	<!-- include form -->
	<div style="width: 25%; height:100%; float: left">
		@include('forms.addbuildingform')
	<!-- </div>

	<!- include map -->
	<div style="width: 75%">
		@include('map')
	</div> 
</div>

@endsection

 