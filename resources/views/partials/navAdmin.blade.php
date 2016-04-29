<div class="container">
	<nav class="navbar navbar-default">
		<a class="navbar-brand" href="{{url('/')}}">Blog PHP</a>
		<ul class="nav navbar-nav">
			<li><a href="{{url('/')}}"><span class="glyphicon glyphicon-home"></span> Accueil</a></li>
			<li><a href="{{url('/post')}}"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
		</ul>

		<div class="navbar-right">
			<a href="{{url('logout')}}" class="btn btn-danger"><h4>Déconnexion <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></h4></a>
		</div>
	</nav>
</div>