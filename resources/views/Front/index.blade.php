@extends('Layout.Front')

@section('main')

@include('Includes.Front.TopBanner')
@include('Includes.Front.PlayLists')
@isset($categories)

@foreach ($categories as $category)
<div class="container mt-2">
    <div class="row  justify-content-between">
        <div class="col">
            <div class="sectionTitle">
                <h2 class="title">{{$category->name}}</h2>
            </div>
        </div>
        <div class="col text-right">
        </div>
    </div>
    @if (count($category->posts))
    <div class="row">
        @foreach ($category->posts as $post)
        <div class="col-6 col-md-2">
            <div class="music-cart-wrapper scale-play-list p-3 p-sm-2 p-md-1 p-lg-3">
            <a href="{{$post->url()}}">
                    <div class="music-cart">
                        @isset($post->poster)
                        <img src="{{asset($post->poster)}}" />
                        @else
                        <img src="{{asset('frontend/images/newreleases.jpg')}}" />
                        @endisset
                        <div class="img-cover"></div>
                    </div>
                    <div class="songInfo center">
                    <span class="artist" title="Baran">{{$post->singers()}}</span>
                        <span class="song" title="Migzaroonam">{{str_limit($post->title,20,' ...')}}</span>
                    </div>
                </a>
            </div>
        </div>
        @endforeach

    </div>
    @endif
</div>

@endforeach
@endisset

@if (isset($artists) && count($artists))
    <div class="container mt-2">
    <div class="row  justify-content-between">
        <div class="col">
            <div class="sectionTitle">
                <h2 class="title">Popular Artists</h2>
            </div>
        </div>
        <div class="col text-right">
        </div>
    </div>
    <div class="row">
       @foreach ($artists as $artist)
            <div class="col-6 col-md-2">
            <div class="music-cart-wrapper Popular-Artists scale-play-list p-3 p-md-1 p-lg-3">
                <a href="#">
                    <div class="artist music-cart">
                        <img src="{{asset($artist->photo)}}" />
                        <div class="img-cover"></div>

                    </div>
                    <div class="songInfo text-center">
                        <span class="artist" title="{{$artist->name}}">{{$artist->name}}</span>


                    </div>
                </a>
            </div>
        </div>
       @endforeach
       

    </div>
</div>
@endif
@endsection