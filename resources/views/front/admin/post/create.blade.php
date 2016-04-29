@extends('layouts.admin')

@section('content')
    <div class="well">
        <h2 class="text-center">Ajouter un article</h2>
    </div>

    <div class="lead text-center">
        <h3><a href="{{url('post')}}"><span class="glyphicon glyphicon-circle-arrow-left" aria-hidden="true"></span> Retour liste des articles</a></h3>
    </div>

    @if(Session::has('message'))
            <div class="alert alert-warning text-center"><h1>{{Session::get('message')}}</h1></div>
    @endif

    <div class="col-sm-6 col-sm-offset-3">
        <form method="post" action="{{url('post')}}" class="form-horizontal" enctype="multipart/form-data">
            {{csrf_field()}}

            <input type="hidden" name="user_id" value="{{$userId}}">

            <div class="form-group">
                <label for="name" class="col-sm-3 control-label">Nom de l'image : </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
                </div>
            </div>

            <div class="form-group">
                <label for="picture" class="col-sm-3 control-label">Image (max 1Mo) : </label>
                <div class="col-sm-6">
                    <input type="file" name="picture" id="picture">
                </div>
            </div>

            <div class="form-group">
                <label for="category_id" class="col-sm-3 control-label">Categorie : </label>
                <div class="col-sm-6">
                    <select name="category_id" id="category_id" class="form-control">
                        <option value="0">Choisissez une catégorie</option>
                        @forelse($categories as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                        @empty
                        @endforelse
                    </select>
                    @if($errors->has('category_id')) <span class="error">{{$errors->first('category_id')}}</span>@endif
                </div>
            </div>

            <div class="form-group">
                <label for="tag_id" class="col-sm-3 control-label">Tags : </label>
                <div class="col-sm-6">
                    <select multiple name="tag_id[]" id="tag_id" class="form-control">
                        @forelse($tags as $tag)
                            <option value="{{$tag->id}}"> {{$tag->name}}</option>
                        @empty
                        @endforelse
                    </select>
                    @if($errors->has('tag_id')) <span class="error">{{$errors->first('tag_id')}}</span>@endif
                </div>
            </div>

            <div class="form-group">
                <label for="title" class="col-sm-3 control-label">Titre : </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}">
                    @if($errors->has('title')) <span class="error">{{$errors->first('title')}}</span>@endif
                </div>
            </div>

            <div class="form-group">
                <label for="content" class="col-sm-3 control-label">Contenu : </label>
                <div class="col-sm-6">
                    <textarea name="content" id="content" class="form-control" rows="6">{{old('content')}}</textarea></p>
                    @if($errors->has('content')) <span class="error">{{$errors->first('content')}}</span>@endif
                </div>
            </div>

            <div class="form-group">
                <label for="status" class="col-sm-3 control-label">Status : </label>
                <div class="col-sm-6">
                    <select name="status" id="status" class="form-control">
                        <option value="0">Choisissez un status</option>
                        <option value="unpublished">unpublished</option>
                        <option value="published">published</option>
                    </select>
                    @if($errors->has('status')) <span class="error">{{$errors->first('status')}}</span>@endif
                </div>
            </div>

            <div class="form-group">
                <label for="published_at" class="col-sm-3 control-label">Date de publication</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="published_at" id="published_at" value="{{old('published_at')}}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-success btn-block">Ajouter <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span></button>
                </div>
            </div>
        </form>
    </div>
@endsection