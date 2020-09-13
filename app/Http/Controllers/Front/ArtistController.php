<?php

namespace App\Http\Controllers\Front;

use App\Artist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArtistController extends Controller
{
    public function Show($slug)
    {
        $data['artist'] = Artist::whereSlug($slug)->first();
        if(!$data['artist']) abort(404);
        $data['title'] = 'RadioAvin | ' . $data['artist']->fullname;
        $data['mp3s'] = $data['artist']->posts->where('type','music');
        $data['videos'] = $data['artist']->posts->where('type','video');
      
        return view('Front.show-artist',$data);
    }
}
