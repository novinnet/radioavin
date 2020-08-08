<?php

namespace App\Http\Controllers\Panel;

use App\Artist;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class ArtistController extends Controller
{
    public function List()
    {
        $artists = Artist::latest()->get();
        return view('Panel.Artist.List',['artists'=>$artists]);
    }

    public function Add()
    {
        return view('Panel.Artist.Add');
    }

    public function Save(Request $request)
    {
      
        $slug = Str::slug($request->name);
         if (request()->hasFile('poster')) {
            $destinationPath = 'artists';
            $picextension = request()->file('poster')->getClientOriginalExtension();
            $fileName = $slug  . '-'  . date("Y-m-d") . '_' . time() . '.' . $picextension;
            request()->file('poster')->move($destinationPath, $fileName);
            $poster = "$destinationPath/$fileName";
        } else {
            $poster = '';
        }
        $artist = new Artist();
        $artist->fullname = $request->name;
        $artist->role = $request->role;
        $artist->bio = $request->bio;
        $artist->birthday = Carbon::parse($request->birthday);
        $artist->photo = $poster;
        $artist->save();

         toastr()->success('هنرمند با موفقیت ثبت شد');

        return Redirect::route('Panel.ArtistList');

    }
      public function Edit(Artist $artist)
    {

        return view('Panel.Artist.Add', compact(['artist']));
    }

    public function EditSave(Request $request,Artist $artist)
    {
         $destinationPath = 'artists';
                 $slug = Str::slug($request->name);

          if ($request->hasFile('poster')) {
            File::delete(public_path() . $artist->poster);

            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0777, true);
            }
            $picextension = $request->file('poster')->getClientOriginalExtension();
            $fileName = $slug  . '-'  . date("Y-m-d") . '_' . time() . '.' . $picextension;
            $request->file('poster')->move($destinationPath, $fileName);
            $Poster = "$destinationPath/$fileName";
        } else {
            $Poster = $artist->poster;
        }

         $artist->fullname = $request->name;
        $artist->role = $request->role;
        $artist->bio = $request->bio;
        $artist->birthday = Carbon::parse($request->birthday);
        $artist->photo = $Poster;
        $artist->update();

         toastr()->success('هنرمند با موفقیت ویرایش شد');

        return Redirect::route('Panel.ArtistList');
    }

}
