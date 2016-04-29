<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>@yield('title','Blog PHP')</title>
	<link rel="stylesheet" href="{{url('assets/css/app.min.css')}}" media="all">
</head>
<body>

	@include('partials.navAdmin')
	
	<div class="container-fluid">
			@yield('content')
	</div>

<footer>
</footer>
<script src="http://code.jquery.com/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
<script src="{{url('assets/js/app.min.js')}}"></script>
</body>
</html>