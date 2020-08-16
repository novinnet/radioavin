<?php

namespace App\Http\Controllers\Front;

use App\Artist;
use App\Category;
use App\Episode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PlayList;
use App\Post;
use App\Slider;
use Carbon\Carbon;

class MainController extends Controller
{
    public function index()
    {

        $categories = Category::all();
        $playlists = PlayList::latest()->take(10)->get();
        $artists = Artist::where('role','singer')->latest()->get();
        $data['categories'] = $categories;
        $data['playlists'] = $playlists;
          $data['artists'] = $artists;
        $data['title'] = 'صفحه اصلی';
        return view('Front.index', $data);
    }

    public function Play()
    {
       


            $model = Post::where('slug', request()->slug)->first();
            if (!$model) {
                abort(404);
            }

            if ($model->type == 'movies') {
                $post = $model;
                $videos = $model->videos;


                if (count($videos) == 0) {
                    return back();
                }
            }
            if ($model->type == 'series') {
                $season = $model->seasons->where('name', request()->season)->first();
                if (!$season) {
                    abort(404);
                }
                $post = $season->sections->where('section', request()->section)->first();
                if (!$post) {
                    abort(404);
                }
                $videos = $post->videos;
            }
            return view('Front.play', compact(['videos', 'post']));
       
    }

    public function DownLoad($id)
    {
       
        
        
        $post = Post::find($id);
        $url = $post->videos->first()->url;
        $path      = parse_url($url, PHP_URL_PATH);
        $extension = pathinfo($path, PATHINFO_EXTENSION);
        $filename  = pathinfo($path, PATHINFO_FILENAME);
        $filename = $post->slug . '.' . $extension;
        header("Content-disposition:attachment; filename=$filename");
        readfile($url);

        // $tempImage = tempnam(sys_get_temp_dir(), $filename);
        // copy($url, $tempImage);
        // return response()->download($tempImage, $filename);
    }

    public function MyFavorite()
    {
        if(auth()->check()){

            $myfavorites = auth()->user()->favorite;
        }
        if(auth()->guard('admin')->check()){
              $myfavorites = auth()->guard('admin')->user()->favorite;
        }
        return view('Front.MyFavorite', compact('myfavorites'));
    }

    public function ShowMore()
    {
        $year = Carbon::now()->year();
        $c = request()->c;
        $type = request()->type;
        if ($c == $year) {
            if ($type == 'all') {
                $data['posts'] = Post::where('year', $year)->latest()->get();
                $data['title'] = 'فیلم های امسال';
            }
            if ($type == 'movie') {
                $data['posts'] = Post::where(['year' => $year, 'type' => 'movies'])->latest()->get();
                $data['title'] = 'فیلم های امسال';
            }
            if ($type == 'serie') {
                $data['posts'] = Post::where(['year' => $year, 'type' => 'serie'])->latest()->get();
                $data['title'] = 'سریال های امسال';
            }
        }
        if ($c == 'doble') {
            if ($type == 'all') {
                $data['posts'] = Post::whereHas('categories', function ($q) {
                    $q->where('name', 'دوبله فارسی');
                })->latest()->get();
                $data['title'] = 'دوبله فارسی';
            }
            if ($type == 'movie') {
                $data['posts'] = Post::whereHas('categories', function ($q) {
                    $q->where('name', 'دوبله فارسی');
                })->where('type', 'movies')->latest()->get();
                $data['title'] = 'دوبله فارسی';
            }
            if ($type == 'serie') {
                $data['posts'] = Post::whereHas('categories', function ($q) {
                    $q->where('name', 'دوبله فارسی');
                })->where('type', 'series')->latest()->get();
                $data['title'] = 'دوبله فارسی';
            }
        }
        if ($c == 'new') {
            if ($type == 'movie') {
                $data['posts'] = Post::where('type', 'movies')->latest()->get();
                $data['title'] = 'تازه ترین ها';
            }
            if ($type == 'serie') {
                $data['posts'] = Post::where('type', 'series')->latest()->get();
                $data['title'] = 'تازه ترین ها';
            }
        }



        return view('Front.ShowMore', $data);
    }
}
