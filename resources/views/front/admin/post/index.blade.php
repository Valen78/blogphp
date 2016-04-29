@extends('layouts.admin')

@section('content')
	<div class="container">
		<div class="well">
			<h2>Liste des articles</h2>
		</div>

		@if(Session::has('message'))
			<div class="alert alert-warning text-center"><h1>{{Session::get('message')}}</h1></div>
		@endif
	</div>

	<div class="lead text-center">
		<h3><a href="{{url('post/create')}}"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Ajouter un article</a></h3>
	</div>

	<div class="text-center">{{$posts->links()}}</div>

	<table class="table table-bordered table-hover table-striped text-center">
		<tr>
			<th><h3>Status</h3></th>
			<th><h3>Date Published</h3></th>
			<th><h3>Title</h3></th>
			<th><h3>Author</h3></th>
			<th><h3>Category</h3></th>
			<th><h3>Tags</h3></th>
			<th><h3>Image</h3></th>
			<th><h3>Action</h3></th>
		</tr>

	@forelse($posts as $post)
		<tr>
			<td>{{$post->status}}</td>
			<td>{{$post->published_at->format('d/m/Y')}}</td>
			<td class="lead"><a href="{{url('post',[$post->id,'edit'])}}">{{$post->title}}</a></td>
			<td>{{($post->user)?$post->user->name:'aucun auteur'}}</td>
			<td>@if($post->category_id==0)
					Non catégorisé
				@else
					{{$post->category->title}}
				@endif
			</td>
			<td class="text-left">@forelse($post->tags as $key=>$tag)
					{{$tag->name}}{{($key<count($post->tags)-1)?',':''}}
				@empty
				@endforelse</td>
			<td>@if(!is_null($post->picture))
					<h4><span class="glyphicon glyphicon-ok-circle success"></span></h4>
				@else
					<h4><span class="glyphicon glyphicon-remove-circle danger"></span></h4>
				@endif
			</td>
			<td class="text-center">
				<a href="{{url('post',[$post->id,'edit'])}}" class="btn btn-info"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
				<a class="btn btn-danger" data-toggle="modal" data-target="#delete" data-id="{{$post->id}}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
			</td>
		</tr>
		@empty
		<p>Pas d'article</p>
	@endforelse

	</table>

	<div class="text-center">{{$posts->links()}}</div>

	<!-- Modal Suppression -->
	<div class="modal" id="delete" tabindex="-1" role="dialog" aria-labelledby="deleteLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<div class="alert alert-info">
						<h3>Etes vous sur de vouloir supprimer cet article ?</h3>
					</div>
				</div>
				<div class="modal-footer">
					<form method="post" action="">
						{{csrf_field()}}
						<input type="hidden" name="_method" value="DELETE">
						<button type="submit" class="btn btn-success">OUI <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span></button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">NON <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span></button>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection