
    <div class="col-6 col-md-2">
    <div class="music-cart-wrapper scale-play-list p-3 p-sm-2 p-md-1 p-lg-2">
    <a href="{{$video->url()}}">
            <div class="music-cart">
                @if(isset($video->poster) && !is_null($video->poster) && unserialize($video->poster)['resize'])
                <img src="{{asset(unserialize($video->poster)['resize'])}}" />
                @else
                <img src="{{asset('frontend/images/remix.jpg')}}" />
                @endif

                <div class="img-cover"></div>
            </div>
            <div class="songInfo center">
                <span class="artist" title="{{$video->singers()}}">{{$video->singers()}}</span>
                <span class="song" title="{{$video->title}}">{{$video->title}}</span>
            </div>
        </a>
    </div>
</div>
