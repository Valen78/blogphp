<div class="container">
	<nav class="navbar navbar-default">
		<a class="navbar-brand" href="{{url('/')}}">Blog PHP</a>
		<ul class="nav navbar-nav">
			<li><a href="{{url('/')}}"><span class="glyphicon glyphicon-home"></span> Accueil</a></li>
			@forelse($categories as $id=>$title)
				<li><a href="{{url('category',$id)}}"><span class="glyphicon glyphicon-flash"></span> {{ucfirst($title)}}</a></li>
			@empty
			@endforelse
		</ul>
		<div class="navbar-right">
			<a href="{{url('post')}}" class="btn btn-info"><h4><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Admin</h4></a>
		</div>
	</nav>
</div>