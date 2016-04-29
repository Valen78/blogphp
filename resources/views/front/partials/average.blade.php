<div class="text-right">
	<span class="lead">
		@if($post->score > 0)
			Moyenne de l'article : <strong>{{$post->score}} / 20</strong>
		@else
			Aucun vote
		@endif
	</span>
</div>