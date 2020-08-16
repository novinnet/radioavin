@isset($post)
    <div class="mt-page">
    <div id="breadcrumbs_container" class="container">
        <div class="row">
            <div class="col">
                <ul class="breadcrumbs">
                    <li><a href="{{route('MainUrl')}}"><i class="fa fa-home"></i></a></li>
                    <li><a href="#">
                            @if ($post->type == 'music')
                            MP3s
                            @elseif($post->type == 'podcast')
                            PodCasts
                            @else
                            Videos
                            @endif
                        </a></li>
                  
                    <li class="current"><a href="#">{{$post->title}}</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endisset