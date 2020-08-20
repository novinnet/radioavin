<?php

namespace App\Http\Controllers\Panel;

use App\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class GalleryController extends Controller
{

    public function List()
    {

        $galleries = Gallery::latest()->get();
        return view('Panel.Photos.list', ['galleries' => $galleries]);
    }
    public function Add()
    {
        return view('Panel.Photos.add');
    }

    public function Save(Request $request)
    {

        $gallery = new Gallery();
        $gallery->name = $request->title;
        $destinationPath = 'gallery/' . $request->title;
        $Poster = $this->SavePoster($request->file('poster'), 'poster-', $destinationPath);
        $banner =    $this->image_resize(450,450,$Poster,$destinationPath);

        $gallery->poster = serialize(['org' => $Poster, 'banner' => $banner]);
        if ($gallery->save()) {
            foreach ($request->images as $key => $image) {
                $Poster = $this->SavePoster($image, 'image-', $destinationPath);
                $poster151 =  $this->image_resize(151, 151, $Poster, $destinationPath);
                $gallery->images()->create([
                    'url' => serialize(['org' => $Poster, 'resize' => $poster151])
                ]);
            }
        }

        toastr()->success('گالری با موفقیت ثبت شد');
        return Redirect::route('Panel.GalleryList');
    }

    public function DeleteGallery(Request $request)
    {

        $gallery = Gallery::find($request->gallery_id);
        File::deleteDirectory(public_path("gallery/$gallery->title/"));
        $gallery->images()->delete();
        $gallery->delete();
        toastr()->success('گالری با موفقیت حذف شد');
        return Redirect::route('Panel.GalleryList');
    }
}
