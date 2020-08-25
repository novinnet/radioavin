<?php

namespace App\Http\Controllers\Front;

use App\Album;
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
                'image' => asset(unserialize($item->poster)['resize']),
                'path' => asset($item->files->first()->url),
                'lyric' => $item->description
            ];
        }
        $data['post']->increment('views');


        $data['track_lists'] = json_encode($array);

        return view(
            'Front.show-music',
            $data
        );
    }

    public function All()
    {

       
        $sliders = Post::where('type', 'music')->latest()->take(10)->get();
        $trending = Post::where('type', 'music')->where('featured',0)->orderBy('views', 'DESC')->get();
        $featured = Post::where('type', 'music')->where('featured',1)->orderBy('views', 'DESC')->get();
        

        $data['this_week'] = Post::where('type', 'music')->
        whereDate('created_at', '>', Carbon::now()->subWeeks(1)->toDateString())
        ->orderBy('views', 'DESC')->take(8)->get();
        $data['this_month'] = Post::where('type', 'music')->
        whereDate('created_at', '>', Carbon::now()->subMonths(1)->toDateString())
        ->orderBy('views', 'DESC')->take(8)->get();
        $data['all_time'] = Post::where('type', 'music')
        ->orderBy('views', 'DESC')->take(8)->get();

        $data['albums'] = Album::has('posts')->latest()->get();
        $data['sliders'] = $sliders;
        $data['trending'] = $trending;
        $data['featured'] = $featured;


        return view('Front.mp3s', $data);
    }
}
