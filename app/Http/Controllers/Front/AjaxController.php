<?php

namespace App\Http\Controllers\Front;

use App\Plan;
use App\Post;
use App\Mail\Discount;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Discount as AppDiscount;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\UserPlaylist;
use Illuminate\Database\Eloquent\Collection;
use UplaylistTrack;

class AjaxController extends Controller
{
    public function getMovieDetail(Request $request)
    {

        $post = Post::find($request->id);

        if ($post) {
            if ($post->type == 'movies') {
                return response()->json([
                    'id' => $post->id,
                    'type' => 'movies',
                    'poster' => asset($post->poster),
                    'title' => $post->title,
                    'desc' => Str::limit($post->description, 200, '...'),
                    'path' => $post->path(),
                    'play' => $post->play(),
                    'download' => $post->downloadpath(),
                    'favoritepath' => $post->favoritepath(),
                    'favoritestatus' => $post->checkFavorite($post->id)
                ], 200);
            }
            if ($post->type == 'series') {
                return response()->json([
                    'id' => $post->id,
                    'type' => 'series',
                    'poster' => asset($post->poster),
                    'title' => $post->title,
                    'desc' => Str::limit($post->description, 200, '...'),
                    'path' => $post->path(),
                    'favoritepath' => $post->favoritepath(),
                    'favoritestatus' => $post->checkFavorite()
                ], 200);
            }
        }
    }


    public function addToFavorite(Request $request)
    {
        // dd($request->all());

        if (auth()->check()) {
            $user = auth()->user();
        } else {
            return response()->json(['auth' => false, 'login' => route('login')], 200);
        }



        $obj = DB::table('user_favorite')->where(['user_id' => $user->id, 'post_id' => $request->post_id])->first();
        if ($obj) {
            $user->favorite()->detach($request->post_id);
            return response()->json('detach', 200);
        } else {
            $user->favorite()->attach($request->post_id);
            return response()->json('attach', 200);
        }
    }

    public function getPlaylists(Request $request)
    {



        if (!auth()->check()) {
            return 'You must  <a href="' . route('login') . '" class="text-gray">login </a> to add to playlist.';
        }
        $track = $request->id;
        $user_id = auth()->user()->id;
        $request->session()->put("track_id", $request->id);
        $user_playlists = auth()->user()->playlists->where('type', $request->type);
       
        $url = route('Ajax.NewPlaylist');


        $list  = '<div class="pl-wrapper">';


        foreach ($user_playlists as $key => $playlist) {
            if($playlist->tracks->contains($track)){
                $icon = '<i class="fa fa-minus"></i>';
            }else{
                $icon = '<i class="fa fa-plus"></i>';

            }
            $list .= ' <div class="pl-item"><a href="'.$playlist->playurl().'" class="user-playlist">' . $playlist->name . ' ('.count($playlist->tracks).') </a>
        <div>
            <a href="#" data-id="' . $playlist->id . '" data-url="' . $playlist->addurl() . '" onclick="addToPlaylist(this)"class="add"> '.$icon.' </a>
            <a href="#" onclick=""> <i class="fa fa-edit"></i> </a>
        </div>
        </div>';
        }

        $list .= '
       </div>
       <hr/>
       <a  href="#" class="newplaylist" data-type="' . $request->type . '" onclick="showForm(event)">New Playlist</a>
       ';
        return $list;
    }

    public function newPlaylist(Request $request)
    {


        $playlist = UserPlaylist::create([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'type' => $request->type
        ]);
        return response()->json([
            'name' => $playlist->name,
            'id' => $playlist->id,
            'playurl' => $playlist->playurl(),
            'addurl' => $playlist->addurl()

        ], 200);
    }

    public function addToPlaylist(Request $request)
    {


        $track = $request->session()->get('track_id');


        $playlist = UserPlaylist::find($request->playlist_id);
        if ($playlist->tracks->contains($track)) {
            $playlist->tracks()->detach($track);
            $status = 'detach';
        } else {
            $playlist->tracks()->attach($track);
             $status = 'attach';
        }

        return response()->json($status, 200);
    }


    public function checkTakhfif(Request $request)
    {
        $user = auth()->user();


        $plan = Plan::whereId($request->plan_id)->first();
        if ($plan) {
            $discount = $plan->discounts->where('d_code', $request->code);

            if (count($discount)) {

                $amount = ($plan->priceWithDiscount() * $discount->first()->percent) / 100;
                session()->put('discount' . $user->id, $amount);
                session()->put('amount' . $user->id, $plan->priceWithDiscount() - $amount);
                return response()->json(session()->get('amount' . $user->id), 200);
            }
        }
    }



    public function Search(Request $request)
    {

        $cat = [];
        $caption = [];
        $year = [];

        // dd($request->data);
        if ($request->data) {


            foreach ($request->data as $key => $data) {
                if ($data['type'] == 'word') {

                    $word = $data['key'];
                } else {
                    $word = null;
                }
            }


            foreach ($request->data as $key => $data) {
                if ($data['type'] == 'genre') {
                    $cat[] = $data['id'];
                }
            }
            foreach ($request->data as $key => $data) {
                if ($data['type'] == 'caption') {
                    $caption[] = $data['id'];
                }
            }
            foreach ($request->data as $key => $data) {
                if ($data['type'] == 'year') {
                    $year[] = $data['year'];
                }
            }
            foreach ($request->data as $key => $data) {
                if ($data['type'] == 'order') {
                    $order = $data['name'];
                }
            }

            // dd($order);
            // dd([explode(';',$year[0])[0],explode(';',$year[0])[1]]);
            // dd([$cat, $caption, $year]);
            if ($word !== null) {
                $posts = Post::where('name', 'like', '%' . $word . '%')
                    ->orWhere('title', 'like', '%' . $word . '%')
                    ->orWhereHas('actors', function ($q) use ($word) {
                        $q->where('name', 'like', '%' . $word . '%');
                    })->get();
            } else {


                if (count($cat) > 0 && count($caption) > 0 && count($year) > 0) {

                    $posts = Post::whereHas('categories', function ($q) use ($cat) {
                        $q->whereIn('id', $cat);
                    })->whereHas('categories', function ($q) use ($cat) {
                        $q->whereIn('id', $cat);
                    })->whereBetween('year', [explode(';', $year[0])[0], explode(';', $year[0])[1]])->get();
                } elseif (count($cat) > 0 && count($caption)) {
                    $posts = Post::whereHas('categories', function ($q) use ($cat) {
                        $q->whereIn('id', $cat);
                    })->whereHas('captions', function ($q) use ($caption) {
                        $q->whereIn('lang', $caption);
                    })->get();
                } elseif (count($cat) > 0) {
                    $posts = Post::whereHas('categories', function ($q) use ($cat) {
                        $q->whereIn('id', $cat);
                    })->get();
                } elseif (count($caption) > 0) {
                    $posts = Post::whereHas('captions', function ($q) use ($caption) {
                        $q->whereIn('lang', $caption);
                    })->get();
                } elseif (count($year) > 0) {
                    $posts = Post::whereBetween('year', [explode(';', $year[0])[0], explode(';', $year[0])[1]])->get();
                }



                if ($order !==  'default') {
                    if ($order == 'new') {

                        $posts = $posts->sortBy('created_at');
                    }
                    if ($order == 'rate') {

                        $posts = $posts->sortBy('imdbRating');
                    }
                    if ($order == 'yearasc') {

                        $posts = $posts->sortBy('year');
                    }
                    if ($order == 'yeardsc') {

                        $posts = $posts->sortByDesc('year');
                    }
                }
            }



            $articles = $this->createArticles($posts);

            return response()->json($articles, 200);
        }
    }

    public function createArticles($posts)
    {
        $article = '';
        foreach ($posts as $key => $post) {


            $article .= '
             <div class="col-6 col-md-3 col-lg-2">
    <a href="' . $post->path() . '" data-id="1" >
        <div class="movie-sections-box">
            <div class="img-box-movies">
                <img src="' . asset($post->poster) . '" alt="' . $post->name . '">
                <div class="cover-img-movies-details">
                    <span>
                        ' . $post->name . ' -';
            if ($post->type == 'series') {

                $article .= \Morilog\Jalali\Jalalian::forge($post->first_publish_date)->format('%Y');
            } else {

                $article .= \Morilog\Jalali\Jalalian::forge($post->released)->format('%Y');
            }

            $article .= '</span>
                    <span>
                        <i class="fa fa-heart"></i>
                        89%
                    </span>
                </div>
            </div>
            <h5>
                ' . $post->title . '
            </h5>
        </div>
    </a></div>';
        }
        return $article;
    }
}
