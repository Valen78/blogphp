<div class="col-sm-8">
	@if(!is_null($post->user))
		<strong>Auteur : </strong><a>{{$post->user->name}}</a> -
	@else
		<strong><a>Aucun Auteur</a> - </strong>
	@endif

	@if(!is_null($post->category))
		<strong>Categorie : </strong><a href="{{url('category',[$post->category->id])}}">{{ucfirst($post->category->title)}}</a>
	@else
		Non catégorisé
	@endif
</div>