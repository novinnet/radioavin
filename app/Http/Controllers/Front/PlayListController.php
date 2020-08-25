<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PlayList;
use App\UserPlaylist;

class PlayListController extends Controller
{

    public function All()
    {
        $data['title'] = 'Play Lists';
        $data['featured'] = PlayList::where('featured', 1)->latest()->get();
        $data['browse'] = PlayList::where('featured', 0)->latest()->get();
        if (auth()->check()) {
            $data['my_playlists'] = auth()->user()->playlists;
            //  dd($data['my_playlists']->first()->image);
        }
        return view('Front.playlists', $data);
    }
    public function play($id)
    {
        if (request()->type) {
            if (request()->type == 'c') {
                $playlist = Playlist::find($id);
                $all = $playlist->tracks;
            } elseif (request()->type == 'u') {
                $playlist = UserPlaylist::find($id);
                $all = $playlist->tracks;
                
            } else {
                abort(404);
            }
        } else {
            abort(404);
        }


        $title = $all->first()->title;
        $data['post'] = $all->first();
        $data['playlist'] = $playlist;
        $data['title'] = $title;
        $data['type'] = $all->first()->type;
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
