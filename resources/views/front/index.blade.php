@extends('layouts.master')

@section('title',$title)

@section('content')

	<div class="text-center">{{$posts->links()}}</div>

	@if(!is_null($bestPost))
		@include('front.partials.best')
	@endif

	@forelse($posts as $post)
		@if($post->id != $bestPost->id)
			@include('front.partials.posts')
		@endif
	@empty
		<p>Pas d'article</p>
	@endforelse

	<div class="text-center">{{$posts->links()}}</div>

@endsection