@if (isset($sliders) && count($sliders) > 6)
    <div class="container mt-page">

    <div id="touchSlider5" class="music-page-slider">
        <ul>
           @foreach ($sliders as $slider)
            <li>
                <img src="{{asset(unserialize($slider->poster)['banner'])}}" style="width: 100%;" />
                <div class="songInfo inline">
                    <span class="date">{{$slider->singers()}} - </span> 
                    <span class="title" title="{{$slider->title}}">{{$slider->title}}</span>
                </div>
            </li>
            
           @endforeach
        </ul>
    </div>
</div>
@endif