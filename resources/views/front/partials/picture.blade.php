@if(!is_null($post->picture))
    <img src="{{url('uploads',$post->picture->uri)}}" alt="{{$post->picture->name}}" class="img-responsive center-block">
@endif