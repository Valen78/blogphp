<article class="best">
    <h1><a href="{{url('article',[$bestPost->id])}}"><span class="glyphicon glyphicon-star star"></span> {{strtoupper($bestPost->title)}}</a></h1>

    <div class="well">
        <div class="col-sm-5">
            @if(!is_null($bestPost->picture))
                <img src="{{url('uploads',$bestPost->picture->uri)}}" alt="{{$bestPost->picture->name}}" class="img-responsive center-block">
            @endif
        </div>

        <div class="{{!is_null($bestPost->picture)?'col-sm-7':''}}}">
            <div class="text-justify">
                <h4>{{excerpt($bestPost->content,10)}}</h4>
            </div>

            <a href="{{url('article',[$bestPost->id])}}"><strong>Lire la suite</strong></a>
        </div>

        <div class="clearfix"></div>
    </div>

    <div class="col-sm-8">
        @if(!is_null($bestPost->user))
            <strong>Auteur : </strong><a>{{$bestPost->user->name}}</a> -
        @else
            <strong><a>Aucun Auteur</a> - </strong>
        @endif

        @if(!is_null($bestPost->category))
            <strong>Categorie : </strong><a href="{{url('category',[$bestPost->category->id])}}">{{ucfirst($bestPost->category->title)}}</a>
        @else
            Non catégorisé
        @endif
    </div>

    <div class="col-sm-4 text-right">
        @if(!is_null($bestPost->published_at))
            <strong>Publié le : </strong><span class="date">{{$bestPost->published_at->format('d/m/Y')}}</span></a>
        @endif
    </div>

    <div class="tags">
        <ul>
            @if(!is_null($bestPost->tags))
                <li><strong>Tags : </strong></li>
                @forelse($bestPost->tags as $tag)
                    <li class="label label-warning">{{$tag->name}}</li>
                @empty
                @endforelse
            @endif
        </ul>
    </div>

    <div class="text-right">
	    <span class="lead">
		    @if($bestPost->score > 0)
                Moyenne de l'article : <strong>{{$bestPost->score}} / 20</strong>
            @else
                Aucun vote
            @endif
	    </span>
    </div>
</article>
<hr>