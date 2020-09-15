<?php

namespace App\Http\Controllers\Api;

use App\Post;
use App\Vote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function like_post()
    {
        if (Auth::check()) {
            $id = request()->id;
            $post = Post::whereId($id)->first();

            if (count($post->votes->where('user_id', Auth::user()->id)) == 0) {

                Vote::create([
                    'votable_id' => request()->post_id,
                    'votable_type' => 'App\Post',
                    'user_id' => auth()->user()->id,
                    'status' => 1
                ]);

                return response()->json(['likes' => count($post->votes), 'status' => true], 200);
            } else {
                return response()->json(['likes' => count($post->votes), 'status' => false], 200);
            }
        } else {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }
    }
}
