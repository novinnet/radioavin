<?php

namespace App\Http\Controllers\Api;

use App\PlayList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class PlayListController extends Controller
{
    public function latest()
    {
        
        $playlists = PlayList::getLatest();
        $all = [];
        foreach ($playlists as $key => $item) {
            $array['id'] = $item->id;
            $array['name'] = $item->name;
            $array['image'] = asset($item->image);
            $all[] = $array;
        }

         return Response::json($all, 200);
        
    }

    public function get($id)
    {
        $playlist = PlayList::find($id);
        $posts_array['playlist_name'] = $playlist->name;
        if($playlist) {
            foreach ($playlist->tracks as $key => $track) {
                $post_array['title'] = $track->title;
                $post_array['type'] = $track->get_type();
                $post_array['singers'] = $track->singers();
                $post_array['translate'] = $track->description;
                $post_array['poster'] = $track->image('resize');
                $post_array['duration'] = $track->duration;
                $post_array['released'] = $track->released;
                $post_array['views'] = $track->views;
                $post_array['file'] = $track->file_url();
                $posts_array['posts'][] = $post_array;
            }
        }
        return Response::json($posts_array, 200);
    }
}
