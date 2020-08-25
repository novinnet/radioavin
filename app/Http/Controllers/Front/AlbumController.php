<?php

namespace App\Http\Controllers\Front;

use App\Album;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlbumController extends Controller
{
    public function Play($slug)
    { 
        
        $album = Album::whereSlug($slug)->first();
        if(!$album) abort(404);
        $all = $album->posts;
        
      
        $data['post'] = $all->first();
        $data['title'] = $album->name;
        $data['type'] = $all->first()->type;
        $data['album'] = $album;
        $array = [];
        foreach ($all as $key => $item) {

            $array[] = [
                'id' => $item->id,
                'name' => $item->title,
                'artist' => $item->singers(),
                'image' => asset(unserialize($item->poster)['resize']),
                'path' => asset($item->files->first()->url),
                'lyric' => $item->description
            ];
        }



        $data['track_lists'] = json_encode($array);

        return view(
            'Front.show-music',
            $data
        );
    }
}
