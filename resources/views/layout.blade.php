<html> 
	<head>
		<link href="{{ URL::asset('css/app.css')}}" rel="stylesheet">
	</head>
	<body>
	<div class="container">
		
		<ul class="nav nav-pills">
	 		<li ><a href="register">Registrácia</a></li>
	  		<li ><a href="compare">Porovnať</a></li>
	  		<li ><a href="https://github.com/3riik/zadanie">GitHub</a></li>
		</ul>
		
		<div id="ajaxResponse" class="alert alert-danger hidden"><ul> </ul> </div>

		@if (count($errors) > 0)
   		<div class = "alert alert-danger">
     	 	<ul>
	         	@foreach ($errors->all() as $error)
	            <li>{{ $error }}</li>
	         	@endforeach
      		</ul>
   		</div>
		@endif
		@if ( isset($message_success) )
			<p class = "alert alert-success">{{$message_success}}</p>
		@endif
		<div class="content">
			
			@yield('content')
		</div>
	</div>	
	<div class="row">
		<div class="container">
			<h3>Broadcast</h3>
				@{{ user.name }} - @{{ user.email }}
			<script type="text/javascript">
				
			</script>
		</div>
	</div>
	<script src="https://js.pusher.com/4.1/pusher.min.js"></script>
	<script src="https://unpkg.com/vue"></script>
	<script src="{{ URL::asset('js/app.js') }}"></script>
	<script src="{{ URL::asset('js/register-ajax.js') }}"></script>

	</body>

</html>