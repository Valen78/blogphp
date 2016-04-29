<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>@yield('title','Blog PHP')</title>
	<link rel="stylesheet" href="{{url('assets/css/app.min.css')}}" media="all">
</head>
<body>

	@include('partials.nav')
	
	<div class="container">
		<div class="col-sm-8">
			@yield('content')
		</div>

		@section('sidebar')
			@include('front.partials.sidebar')
		@show
	</div>

	<footer>
		
	</footer>
	<script src="http://code.jquery.com/jquery.min.js"></script>
	<script src="{{url('assets/js/app.min.js')}}"></script>
</body>
</html>