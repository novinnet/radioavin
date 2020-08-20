@if (isset($sliders) && count($sliders) > 6)
<div class="{{$type == 'photo' ? 'position-relative mb-5' : 'container'}}  mt-page">

    <div id="touchSlider5" class="{{$type == 'photo' ? '' : 'music-page-slider'}} ">
        <ul>
            @foreach ($sliders as $slider)
            <li>
                <img src="{{asset(unserialize($slider->poster)['banner'])}}" style="width: 100%;" />
                <div class="songInfo inline">
                    @if ($type == 'photo')
                    <span class="title" title="Behzad Leito Concert in Los Angeles">Behzad Leito Concert in Los
                        Angeles</span>
                    <span class="date">February 16, 2020</span>
                    @else
                    <span class="date">{{$slider->singers()}} - </span>
                    <span class="title" title="{{$slider->title}}">{{$slider->title}}</span>
                    @endif
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endif