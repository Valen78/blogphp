<div class="tags">
	<ul>
		@if(!is_null($post->tags))
			<li><strong>Tags : </strong></li>
			@forelse($post->tags as $tag)
				<li class="label label-warning">{{$tag->name}}</li>
			@empty
			@endforelse
		@endif
	</ul>
</div>