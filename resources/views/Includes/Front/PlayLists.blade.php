@if (isset($playlists) && count($playlists))
    <div class="container mt-2">
    <div class="row  justify-content-between">
        <div class="col">
            <div class="sectionTitle">
                <h2 class="title">Playlists</h2>
            </div>
        </div>
        <div class="col text-right">
            <a class="viewMore button primaryButton" href="#">View More</a>
        </div>
    </div>
    <div class="">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach ($playlists as $playlist)
                <div class="swiper-slide text-center mb-lg-5">
                    <div class="music-cart-wrapper scale-play-list p-3 p-sm-2 p-md-1 p-lg-3">
                        <a href="#">
                            <div class="music-cart">
                                @isset($playlist->image)
                                 <img src="{{asset($playlist->image)}}" />
                                @else 
                                <img src="{{asset('frontend/images/remix.jpg')}}" />
                                @endisset
                                <div class="img-cover"></div>
                            </div>
                            <div class="songInfo center">
                                <span class="artist" title="{{$playlist->name}}">{{$playlist->name}}</span>
                                {{-- <span class="song" title="Migzaroonam">Migzaroonam</span> --}}
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach

            </div>

            <!-- Add Scrollbar -->
            <div class="swiper-scrollbar"></div>
        </div>

    </div>
</div>
@endif