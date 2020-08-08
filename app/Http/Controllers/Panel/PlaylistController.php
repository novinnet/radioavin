<?php

namespace App\Http\Controllers\Panel;

use App\Post;
use App\PlayList;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class PlaylistController extends Controller
{
    public function List()
    {
        $playlists = PlayList::latest()->get();
        return view('Panel.PlayList.List', ['playlists' => $playlists]);
    }

    public function Add()
    {
        $songs = Post::whereType('music')->orderBy('title', 'DESC')->get();
        return view('Panel.PlayList.Add', ['songs' => $songs]);
    }

    public function Save(Request $request)
    {

       

        $slug = Str::slug($request->name);
        if (request()->hasFile('poster')) {
            $destinationPath = 'playlist';
            $picextension = request()->file('poster')->getClientOriginalExtension();
            $fileName = $slug  . '-'  . date("Y-m-d") . '_' . time() . '.' . $picextension;
            request()->file('poster')->move($destinationPath, $fileName);
            $poster = "$destinationPath/$fileName";
        } else {
            $poster = '';
        }
        $playlist = new PlayList();
        $playlist->name = $request->name;
        $playlist->information = $request->information;
        $playlist->image = $poster;
        $playlist->save();

        if(isset($request->songs)){
            foreach ($request->songs as $key => $song) {
                $playlist->posts()->attach($song);
            }
        }

        toastr()->success('playlist added successfuly');

        return Redirect::route('Panel.PlayList');
    }
    public function Edit(PlayList $playlist)
    {

        return view('Panel.Artist.Add', compact(['artist']));
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
