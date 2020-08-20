<?php

namespace App\Http\Controllers\Front;

use App\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
     public function All()
    {
        $data['title'] = 'Radio Avin | Photos';
        $data['sliders'] = Gallery::latest()->take(10)->get();
        $data['galleries'] = Gallery::with('images')->latest()->get();

        return view('Front.photos',$data);

    }
}
