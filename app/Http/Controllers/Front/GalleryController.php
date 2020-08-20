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
        $data['galleries'] = Gallery::with('images')->latest()->get();
        return view('Front.photos',$data);

    }
}
