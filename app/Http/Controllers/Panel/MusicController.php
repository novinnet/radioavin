<?php

namespace App\Http\Controllers\Panel;

use Goutte;
use App\Tag;
use App\Post;
use App\Actor;
use App\Artist;
use App\Image;
use App\Writer;
use App\Episode;
use App\Quality;
use App\Category;
use App\Director;
use App\Language;
use App\PlayList;
use Carbon\Carbon;
use App\File as Fil;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class MusicController extends Controller
{

    function MusicList(Request $request)
    {

        $musics = Post::where('type', 'music')->latest()->get();
        return view('Panel.Music.List', compact(['musics']));
    }

    public function Add()
    {
        $playlists = PlayList::all();
        $singers = Artist::whereRole('singer')->get();
        $writers = Artist::whereRole('writer')->get();
        return view('Panel.Music.add', compact(['playlists', 'singers', 'writers']));
    }



    public function Save(Request $request)
    {

       
        $slug = Str::slug($request->title);

        $destinationPath = "music/$slug";

        $post = new Post;
        $post->post_author = 1;
        $post->title = $request->title;
        if ($request->podcast && $request->podcast == 1) {
            $post->type = 'podcast';
        } else {
            $post->type = 'music';
        }
        $post->description = $request->translation;

        $Poster = $this->SavePoster($request, $destinationPath);
        $post->released = Carbon::parse($request->released)->toDateTimeString();
        $post->poster = $Poster;
        $post->duration = '12';
        if ($post->save()) {

            $this->saveInformation($request, $post, $destinationPath);
        } else {
            return back();
        }

        toastr()->success('موزیک با موفقیت ثبت شد');
        return Redirect::route('Panel.MusicList', ['id' => $post->id]);
    }

    public function Edit(Post $post)
    {

 $playlists = PlayList::all();
        $singers = Artist::whereRole('singer')->get();
        $writers = Artist::whereRole('writer')->get();
        return view('Panel.Music.add', compact(['post','playlists','singers','writers']));
    }



    public function AddEpisode()
    {
        $id = request()->id;
        if ($id) {
            $post = Post::find($id);
            $episodes = $post->episodes;
        } else {
            $episodes = [];
            $post = null;
        }
        return view('Panel.Files.AddEpisode', compact(['id', 'episodes', 'post']));
    }

    public function SaveEpisode(Request $request)
    {

        $post = Post::find($request->post);
        if (request()->hasFile('thumb')) {
            $destinationPath = 'files/series/thumbs';
            $picextension = request()->file('thumb')->getClientOriginalExtension();
            $fileName = $post->name . '-' . $request->season . '-' . $request->section . date("Y-m-d") . '_' . time() . '.' . $picextension;
            request()->file('thumb')->move($destinationPath, $fileName);
            $thumb = "$destinationPath/$fileName";
        } else {
            $thumb = '';
        }

        $episode = $post->episodes()->create([
            'name' => $request->name,
            'duration' => '00',
            'description' => $request->description,
            'poster' => $thumb,
            'season' => $request->season,
            'section' => $request->section,
        ]);

        return Redirect::route('Panel.UploadVideo', ['id' => $post->id, 'episode' => $episode->id]);
    }

    public function EditMusic(Request $request, Post $post)
    {


        
        $slug = Str::slug($post->name);

        $destinationPath = "music/$slug";
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



        $this->editInformation($request, $post);

        toastr()->success('موزیک با موفقیت ویرایش شد');

        return Redirect::route('Panel.MusicList');
    }

    public function DeletePost(Request $request)
    {


        $post = Post::find($request->post_id);
        File::delete(public_path() . $post->poster);


        if ($post->type == 'video') {
            foreach ($post->files as $key => $video) {
                File::delete(public_path() . $video->url);

                $video->delete();
            }
        }
        $post->delete();

        toastr()->success('پست با موفقیت حذف شد');
        return back();
    }

    public function DeleteVideo(Request $request)
    {

        $video = Video::find($request->id);
        File::delete(public_path() . $video->url);
        foreach ($video->captions as $key => $caption) {
            $caption->delete();
        }
        $video->delete();
        return response()->json('ویدیو با موفقیت حذف شد');
    }

    public function DeleteImage(Request $request)
    {
        $image = Image::find($request->id);
        File::delete(public_path() . $image->url);
        $image->delete();
        return response()->json('تصویر با موفقیت حذف شد');
    }


    public function AddCatAjax(Request $request)
    {

        $cat = new Category;
        $cat->name = $request->name;
        $cat->save();

        return response()->json([
            'id' => $cat->id,
            'name' => $cat->name
        ], 200);
    }


    public function checkNameAjax(Request $request)
    {
        // check in db
        if (Post::where('name', $request->name)->count()) {
            return response()->json(['error' => 'این مورد از قبل ثبت شده است']);
        }
    }
}
