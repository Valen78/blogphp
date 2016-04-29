@extends('layouts.master')

@section('title',$title)

@section('content')
	<h1 class="text-center">Articles de la categorie : <span class="alert alert-info">{{$name}}</span></h1>
	<hr>

	<div class="text-center">{{$posts->links()}}</div>

	@forelse($posts as $post)
		@include('front.partials.posts')
	@empty
		<h3 class="error">Pas d'article pour cette catégorie !!</h3>
	@endforelse

	<div class="text-center">{{$posts->links()}}</div>

@endsection