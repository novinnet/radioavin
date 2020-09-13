{{-- <div id="alphabetic_browse" class="container mb-5 my-md-5 text-center">
    <a href="/mp3s/browse/artists/all" id="BrowseAll"> All</a>
    <a href="/mp3s/browse/artists/other-artists">#</a>
    <a href="/mp3s/browse/artists/A">A</a>
    <a href="/mp3s/browse/artists/B">B</a>
    <a href="/mp3s/browse/artists/C">C</a>
    <a href="/mp3s/browse/artists/D">D</a>
    <a href="/mp3s/browse/artists/E">E</a>
    <a href="/mp3s/browse/artists/F">F</a>
    <a href="/mp3s/browse/artists/G">G</a>
    <a href="/mp3s/browse/artists/H">H</a>
    <a href="/mp3s/browse/artists/I">I</a>
    <a href="/mp3s/browse/artists/J">J</a>
    <a href="/mp3s/browse/artists/K">K</a>
    <a href="/mp3s/browse/artists/L">L</a>
    <a href="/mp3s/browse/artists/M">M</a>
    <a href="/mp3s/browse/artists/N">N</a>
    <a href="/mp3s/browse/artists/O">O</a>
    <a href="/mp3s/browse/artists/P">P</a>
    <a href="/mp3s/browse/artists/Q">Q</a>
    <a href="/mp3s/browse/artists/R">R</a>
    <a href="/mp3s/browse/artists/S">S</a>
    <a href="/mp3s/browse/artists/T">T</a>
    <a href="/mp3s/browse/artists/U">U</a>
    <a href="/mp3s/browse/artists/V">V</a>
    <a href="/mp3s/browse/artists/W">W</a>
    <a href="/mp3s/browse/artists/X">X</a>
    <a href="/mp3s/browse/artists/Y">Y</a>
    <a href="/mp3s/browse/artists/Z">Z</a>
</div> --}}

<div class="container">
    <div class="row mt-5">
        <div class="form-group col-md-6">

            <select name="song" class="js-example-basic-single col-md-12" dir="rtl">
                <option value="search singer">search singer</option>
                @foreach (\App\Artist::all() as $artist)
                <option value="{{$artist->id}}"
                    {{isset($playlist) && $playlist->tracks()->pluck('id')->contains($artist->id) ? 'selected' : ''}}>
                    {{$artist->fullname}}</option>
                @endforeach
            </select>
           
        </div>
        <div class="form-group col-md-6">
             <select name="song" class="js-example-basic-single col-md-12" dir="rtl">
                <option value="search song">search song</option>
                @foreach (\App\Post::where('type','music')->get() as $song)
                <option value="{{$song->id}}"
                    {{isset($playlist) && $playlist->tracks()->pluck('id')->contains($song->id) ? 'selected' : ''}}>
                    {{$song->title}}</option>
                @endforeach
            </select>
        </div>
    </div>
     
</div>