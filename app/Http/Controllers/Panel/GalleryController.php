<?php

namespace App\Http\Controllers\Panel;

use App\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class GalleryController extends Controller
{

    public function List()
    {

        $galleries = Gallery::latest()->get();
        return view('Panel.Photos.list',['galleries'=>$galleries]);
    }
    public function Add()
    {
        return view('Panel.Photos.add');
    }

    public function Save(Request $request)
    {
        $gallery = new Gallery();
        $gallery->name = $request->title;
        if ($gallery->save()) {
            $destinationPath = 'gallery/'. $request->title;
            foreach ($request->images as $key => $image) {
                if ($request->hasFile('poster')) {
                    $picextension = $request->file('poster')->getClientOriginalExtension();
                    $fileName = 'image_' . date("Y-m-d") . '_' . time() . '.' . $picextension;
                    $request->file('poster')->move(public_path($destinationPath), $fileName);
                    $url = "$destinationPath/$fileName";
                } else {
                    $url = '';
                }
                $gallery->images()->create([
                    'url' => $url
                ]);
            }
        }

         toastr()->success('گالری با موفقیت ثبت شد');
        return Redirect::route('Panel.GalleryList');
    }

    public function DeleteGallery(Request $request)
    {
        
        $gallery = Gallery::find($request->gallery_id);
        $gallery->images()->delete();
        $gallery->delete();
         toastr()->success('گالری با موفقیت حذف شد');
        return Redirect::route('Panel.GalleryList');
    }
}
