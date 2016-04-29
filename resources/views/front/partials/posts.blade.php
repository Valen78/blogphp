<article>
    <h1><a href="{{url('article',[$post->id])}}">{{strtoupper($post->title)}}</a></h1>

    <div class="well">
        <div class="col-sm-5">
            @include('front.partials.picture')
        </div>

        <div class="{{!is_null($post->picture)?'col-sm-7':''}}}">
            <div class="text-justify">
                <h4>{{excerpt($post->content,10)}}</h4>
            </div>

            <a href="{{url('article',[$post->id])}}"><strong>Lire la suite</strong></a>
        </div>

        <div class="clearfix"></div>
    </div>

    @include('front.partials.metas')

    @include('front.partials.published')

    @include('front.partials.tags')

    @include('front.partials.average')
</article>
<hr>