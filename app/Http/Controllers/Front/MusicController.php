<?php

namespace App\Http\Controllers\Front;

use App\Post;
use App\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;

class MusicController extends Controller
{
    public function Show($slug)
    {

        $post = collect(Post::whereSlug($slug)->get());
        if (empty($post)) {
            abort(404);
        }
        $relatedPosts = collect($post->first()->relatedPosts());

        $all = $post->merge($relatedPosts);

        $title = $post->first()->title;
        $data['post'] = $post->first();
        $data['relatedPosts'] = $relatedPosts;
        $data['title'] = $title;
        $data['type'] = $post->first()->type;
        $array = [];
        foreach ($all as $key => $item) {

            $array[] = [
                'id' => $item->id,
                'name' => $item->title,
                'artist' => $item->singers(),
                'image' => asset($item->poster),
                'path' => asset($item->files->first()->url),
                'lyric' => $item->description
            ];
        }
        $data['post']->increment('views');


        $data['track_lists'] = json_encode($array);

        return view(
            'Front.show',
            $data
        );
    }

    public function All()
    {
       
        // $sliders = Slider::whereHas('post', function ($q) {
        //     $q->where('type', 'series');
        // })->latest()->take(5)->get();

        // if (count($sliders)) {
        //     $data['sliders'] = $sliders;
        // } else {
        //     $data['sliders'] = Slider::latest()->take(5)->get();
        // }

        // $data['newseries'] = $newseries;
       

        return view('Front.mp3s');
    }
}
