<?php

namespace App\Http\Controllers\Api;

use App\Post;
use App\Artist;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ArtistResource;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostsResource;
use Illuminate\Support\Facades\Response;

class MainController extends Controller
{
    public function index()
    {
        $categories = Category::has('posts')->orderBy('orders', 'ASC')->get();
        $all = [];
        foreach ($categories as $key => $category) {
            $posts_array = [];
            $posts_array['category'] = $category->name;
            foreach ($category->lastPosts() as $key => $post) {

                $post_array = new PostResource($post);
                $posts_array['posts'][] = $post_array;
            }
            $all[] = $posts_array;
        }

        return Response::json($all, 200);
    }

    public function newsongs()
    {
        $category = Category::where('name', 'New Song')->first();
        $posts = $category->posts()->take(10)->latest()->get();
        return Response::json(PostResource::collection($posts), 200);
    }

    public function hot_tracks()
    {

        $posts = Post::orderBy('views', 'desc')->take(10)->get();
        return Response::json(PostResource::collection($posts), 200);
    }

    public function featured()
    {
        $category = Category::where('name', 'Featured')->first();
        $posts = $category->posts()->take(10)->latest()->get();
        return Response::json(PostResource::collection($posts), 200);
    }

    public function search(Request $request)
    {
        $word = $request->key;
        if ($word !== null) {
            $posts = collect(Post::where('title', 'like', '%' . $word . '%')->latest()->take(10)->get());
            $artists = collect(Artist::where('fullname', 'like', '%' . $word . '%')->latest()->take(10)->get());
            $all = $posts->merge($artists);
            if (count($all)) {
                foreach ($all as $key => $model) {
                    if ($model instanceof Post) {
                        $post_array = new PostResource($model);

                        $posts_array['posts'][] = $post_array;
                    } else {
                        $post_array = new ArtistResource($model);
                        $posts_array['artists'][] = $post_array;
                    }
                }
            } else {
                $posts_array = [];
            }
        } else {
            $posts_array = [];
        }

        return $posts_array;
    }
}
