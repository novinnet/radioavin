<?php

namespace App\Http\Controllers\Panel;

use App\Post;
use App\PlayList;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class PlaylistController extends Controller
{
    public $destinationPath = "playlist_images";
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
            $poster = $this->SavePoster($request->file('poster'), $slug, $this->destinationPath);
            $resize = $this->image_resize(179, 179, $poster, $this->destinationPath);
            File::delete(public_path() . '/' . $poster);
        } else {
            $resize = '';
        }


        $playlist = new PlayList();
        $playlist->name = $request->name;
        $playlist->information = $request->information;
        $playlist->image = $resize;
        $playlist->save();

        if (isset($request->songs)) {
            foreach ($request->songs as $key => $song) {
                $playlist->tracks()->attach($song);
            }
        }

        toastr()->success('playlist added successfuly');

        return Redirect::route('Panel.PlayList');
    }
    public function Edit(PlayList $playlist)
    {

        return view('Panel.PlayList.Add', compact(['playlist']));
    }

    public function EditSave(Request $request, PlayList $playlist)
    {

        $slug = Str::slug($request->name);

        if ($request->hasFile('poster')) {
            File::delete(public_path() . $playlist->poster);

            if (!File::exists($this->destinationPath)) {
                File::makeDirectory($this->destinationPath, 0777, true);
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

    public function Delete(Request $request)
    {


        $playlist = PlayList::find($request->id);
        File::deleteDirectory(public_path("$playlist->image/"));

        $playlist->tracks()->detach();

        $playlist->delete();

        toastr()->success('پلی لیست با موفقیت حذف شد');
        return back();
    }

    public function ChangeFeatured(Request $request)
    {


        $playlist = PlayList::find($request->playlist_id);
        if ($playlist->featured == 1) {
            $playlist->featured = 0;
        } else {
            $playlist->featured = 1;
        }
        $playlist->save();

        return response()->json([
            'data' => $playlist->featured

        ]);
        toastr()->success('پلی لیست با موفقیت حذف شد');
        return back();
    }
}
