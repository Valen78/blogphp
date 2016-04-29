@if(Session::has('message'))
    <div class="alert alert-success text-center"><h1>{{Session::get('message')}}</h1></div>
@endif

@if(!is_null($post))
    <article class="well">

        <h1>{{$post->title}}</h1>

        @include('front.partials.picture')

        <div class="mt20">
            <div class="text-justify">
                <h4>{{$post->content}}</h4>
            </div>
        </div>

        <div class="mt20">
            @include('front.partials.metas')

            @include('front.partials.published')

            @include('front.partials.tags')
        </div>

        @include('front.partials.average')
    </article>

    <form method="post" action="{{url('score')}}" class="form-inline text-right">
        {{csrf_field()}}

        <input type="hidden" name="post_id" value="{{$post->id}}">

        <div class="form-group">
            <label for="score">Votre note :</label>
            <input type="text" class="form-control input-sm" name="score" id="score" size="2" maxlength="2"> / 20
        </div>
        <button type="submit" class="btn btn-info btn-sm">ok</button>
    </form>

    <div class="text-right">
        @if($errors->has('score')) <span class="error">{{$errors->first('score')}}</span>@endif
    </div>
@else
    <p>Pas d'article !!</p>
@endif