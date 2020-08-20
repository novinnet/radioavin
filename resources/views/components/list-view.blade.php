<div class="music-cart-h ">
    <a href="./single-music.html">
        <div class="music-cart">
            <img src="{{asset(unserialize($item->poster)['resize'])}}" />

            <div class="img-cover"></div>

        </div>
        <div class="songInfo center">
            <span class="artist" title="{{$item->singers()}}">{{$item->singers()}}</span>
            <span class="song" title="{{$item->title}}">{{$item->title}}</span>

        </div>
    </a>
    <a href="#" onclick="call(event)" id="{{$item->id}}" data-id="{{$item->id}}" data-type="music" class="add-favorite plus">
        +
    </a>
</div>