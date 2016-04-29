@extends('layouts.admin')

@section('content')
    <div class="well">
        <h2 class="text-center">Modifier l'article {{$post->title}}</h2>
    </div>

    <div class="lead text-center">
        <h3><a href="{{url('post')}}"><span class="glyphicon glyphicon-circle-arrow-left" aria-hidden="true"></span> Retour liste des articles</a></h3>
    </div>

    @if(Session::has('message'))
        <div class="alert alert-danger"><h1>{{Session::get('message')}}</h1></div>
    @endif

    <div class="col-sm-6 col-sm-offset-3">
        <form method="post" action="{{url('post',[$post->id])}}" class="form-horizontal" enctype="multipart/form-data">
            {{csrf_field()}}

            <input type="hidden" name="user_id" value="{{$userId}}">

            <div class="form-group">
                <label for="name" class="col-sm-3 control-label">Nom de l'image : </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" id="name" value="{{!empty($post->picture->name)?$post->picture->name:''}}">
                </div>
            </div>


            <div class="form-group">
                <label for="picture" class="col-sm-3 control-label">Image (max 1Mo) : </label>
                <div class="col-sm-6">
                    @if(!empty($post->picture))
                        <img src="{{url('uploads',$post->picture->uri)}}" alt="{{$post->picture->name}}" class="img-responsive center-block">
                        <label for="deleteImg">
                            <input type="checkbox" name="deleteImg" id="deleteImg" value="deleteImg"> Supprimer l'image ?
                        </label>
                    @endif

                    <input type="file" name="picture" id="picture">
                </div>
            </div>

            <div class="form-group">
                <label for="category_id" class="col-sm-3 control-label">Categorie : </label>
                <div class="col-sm-6">
                    <select name="category_id" id="category_id" class="form-control">
                        <option value="0">Non catégorisé</option>
                        @forelse($categories as $category)
                            <option value="{{$category->id}}" {{($post->hasCategory($category->id))?'selected':''}}>{{$category->title}}</option>
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
                            <option value="{{$tag->id}}" {{($post->hasTag($tag->id))?'selected':''}}> {{$tag->name}}</option>
                        @empty
                        @endforelse
                    </select>
                    @if($errors->has('tag_id')) <span class="error">{{$errors->first('tag_id')}}</span>@endif

                </div>
            </div>

            <div class="form-group">
                <label for="title" class="col-sm-3 control-label">Titre : </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="title" value="{{$post->title}}"></p>
                    @if($errors->has('title')) <span class="error">{{$errors->first('title')}}</span>@endif
                </div>
            </div>

            <div class="form-group">
                <label for="content" class="col-sm-3 control-label">Contenu : </label>
                <div class="col-sm-6">
                    <textarea name="content" class="form-control" rows="6">{{$post->content}}</textarea></p>
                    @if($errors->has('content')) <span class="error">{{$errors->first('content')}}</span>@endif
                </div>
            </div>

            <div class="form-group">
                <label for="status" class="col-sm-3 control-label">Status : </label>
                <div class="col-sm-6">
                    <select name="status" id="status" class="form-control">
                        <option value="0">Choisissez un status</option>
                        <option value="unpublished" @if($post->status == 'unpublished') selected @endif>unpublished</option>
                        <option value="published" @if($post->status == 'published') selected @endif>published</option>
                    </select>
                    @if($errors->has('status')) <span class="error">{{$errors->first('status')}}</span>@endif
                </div>
            </div>

            <div class="form-group">
                <label for="published_at" class="col-sm-3 control-label">Date de publication</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="published_at" id="published_at" value="{{$post->published_at->format('Y-m-d')}}">
                </div>
                @if($errors->has('published_at')) <span class="error">{{$errors->first('published_at')}}</span>@endif
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <input type="hidden" name="_method" value="PUT">
                    <button type="submit" class="btn btn-success btn-block">Modifier <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span></button>
                </div>
            </div>
        </form>
    </div>
@endsection