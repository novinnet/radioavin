<?php

namespace App\Http\Controllers\Panel;

use App\Post;
use App\Album;
use App\Artist;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AlbumController extends Controller
{
    public function List()
    {
        $albums = Album::latest()->get();

        return view('Panel.Album.List', ['albums' => $albums]);
    }

    public function Add()
    {
        $songs = Post::whereType('music')->orderBy('title', 'DESC')->get();
        return view('Panel.Album.Add', ['songs' => $songs]);
    }

    public function Save(Request $request)
    {


        $slug = SlugService::createSlug(Post::class, 'slug', $request->name);
        $destinationPath = 'album_images';
        if (request()->hasFile('poster')) {
            $poster = $this->SavePoster($request->file('poster'), $slug, $destinationPath);
            $resize = $this->image_resize(179, 179, $poster, $destinationPath);
            File::delete(public_path() . '/' . $poster);
        } else {
            $resize = '';
        }
        $album = new Album();
        $album->name = $request->name;
        $album->information = $request->information;
        $album->image = $resize;
        $album->save();

        if (isset($request->songs)) {
            foreach ($request->songs as $key => $song) {
                $album->posts()->attach($song);
            }
        }

        toastr()->success('album added successfuly');

        return Redirect::route('Panel.Album');
    }
    public function Edit(Album $album)
    {

        return view('Panel.Album.Add', compact(['album']));
    }

    public function EditSave(Request $request, Artist $playlist)
    {
        $destinationPath = 'playlist';
        $slug = Str::slug($request->name);

        if ($request->hasFile('poster')) {
            File::delete(public_path() . $playlist->poster);

            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0777, true);
            }
            $picextension = $request->file('poster')->getClientOriginalExtension();
            $fileName = $slug  . '-'  . date("Y-m-d") . '_' . time() . '.' . $picextension;
            $request->file('poster')->move($destinationPath, $fileName);
            $Poster = "$destinationPath/$fileName";
        } else {
            $Poster = $playlist->poster;
        }

        $playlist->fullname = $request->name;
        $playlist->role = $request->role;
        $playlist->bio = $request->bio;
        $playlist->birthday = Carbon::parse($request->birthday);
        $playlist->photo = $Poster;
        $playlist->update();

        toastr()->success('هنرمند با موفقیت ویرایش شد');

        return Redirect::route('Panel.ArtistList');
    }
}
