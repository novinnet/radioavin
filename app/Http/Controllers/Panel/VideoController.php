<?php

namespace App\Http\Controllers\Panel;


use App\Post;

use App\Artist;

use App\Caption;
use App\File as PostFile;
use App\Quality;
use Carbon\Carbon;
use App\Arrangement;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class VideoController extends Controller
{
    public function VideoList(Request $request)
    {

        $videos = Post::where('type','video')->latest()->get();
       
        return view('Panel.Video.List', compact(['videos']));
    }

    public function Add()
    {
                $singers = Artist::whereRole('singer')->get();

        return view('Panel.Video.add',compact('singers'));
    }

    public function Save(Request $request)
    {

        // dd($request->all());

        $slug = Str::slug($request->title);

        $destinationPath = "videos/$slug";
        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0777, true);
        }
        $post = new Post;
        $post->post_author = 1;
        $post->title = $request->title;
        $post->type = 'video';
        $post->description = $request->translation;

        if ($request->hasFile('poster')) {
            $picextension = $request->file('poster')->getClientOriginalExtension();
            $fileName = 'poster_' . date("Y-m-d") . '_' . time() . '.' . $picextension;
            $request->file('poster')->move(public_path($destinationPath), $fileName);
            $Poster = "$destinationPath/$fileName";
        } else {
            $Poster = '';
        }
        $post->released = Carbon::parse($request->released)->toDateTimeString();
        $post->poster = $Poster;
        $post->duration = '12';
        if ($post->save()) {

           $this->saveInformation($request, $post, $destinationPath);
        } else {
            return back();
        }

        toastr()->success('ویدئو با موفقیت ثبت شد');
        return Redirect::route('Panel.VideoList', ['id' => $post->id]);
    }


    public function Edit(Post $post)
    {
        $singers = Artist::whereRole('singer')->get();
        return view('Panel.Video.add', compact(['post','singers']));
    }

    public function EditVideo(Request $request, Post $post)
    {

        // dd($request->all());
        $slug = Str::slug($post->name);

        $destinationPath = "video/$slug";
        if ($request->hasFile('poster')) {
            File::delete(public_path() . $post->poster);

            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0777, true);
            }
            $picextension = $request->file('poster')->getClientOriginalExtension();
            $fileName = 'poster_' . date("Y-m-d") . '_' . time() . '.' . $picextension;
            $request->file('poster')->move($destinationPath, $fileName);
            $Poster = "$destinationPath/$fileName";
        } else {
            $Poster = $post->poster;
        }

        $post->post_author = 1;
        $post->title = $request->title;
        $post->description = $request->translation;
        $post->released = Carbon::parse($request->released)->toDateTimeString();
        $post->poster = $Poster;
        $post->duration = '12';
        $post->update();



        $this->editInformation($request , $post , $destinationPath);

        toastr()->success('پست با موفقیت ویرایش شد');

        return Redirect::route('Panel.VideoList');
    }










    public function DeleteCaption(Request $request)
    {
        $caption = Caption::find($request->id);
        File::delete(public_path() . $caption->url);
        $caption->delete();
         return response()->json('success',200);
    }
    public function DeleteFile(Request $request)
    {
        $file = PostFile::find($request->id);
        File::delete(public_path() . $file->url);
        $file->delete();
         return response()->json('success',200);
    }
}