<div class="col-sm-4 text-right">
	@if(!is_null($post->published_at))
		<strong>Publié le : </strong><span class="date">{{$post->published_at->format('d/m/Y')}}</span></a>
	@endif
</div>