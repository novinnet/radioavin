<?php

namespace App\Http\Controllers\Panel;

use App\Post;

use App\Album;
use App\Artist;
use App\Image;

use App\Category;
use App\PlayList;
use Carbon\Carbon;
use App\File as Fil;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Image as ImageResize;

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
        $albums = Album::all();
        $singers = Artist::whereRole('singer')->get();
        $writers = Artist::whereRole('writer')->get();
        return view('Panel.Music.add', compact(['playlists', 'singers', 'writers', 'albums']));
    }



    public function Save(Request $request)
    {
        // dd($request->all());
        

        $slug = SlugService::createSlug(Post::class, 'slug',$request->title);

        $destinationPath = "music/$slug";

        $post = new Post;
        $post->post_author = 1;
        $post->title = $request->title;
        if ($request->podcast && $request->podcast == 1) {
            $post->type = 'podcast';
        } else {
            $post->type = 'music';
        }
         if ($request->featured && $request->featured == 1) {
            $post->featured =1;
        } else {
            $post->featured = 0;
        }
        $post->description = $request->translation;
        $Poster = $this->SavePoster($request->file('poster'),'poster-', $destinationPath);
        $poster161 =  $this->image_resize(161,161,$Poster,$destinationPath);
        $banner =    $this->image_resize(440,212,$Poster,$destinationPath);
        File::delete(public_path() . '/' . $Poster);
        $post->released = Carbon::parse($request->released)->toDateTimeString();

        $post->poster = serialize(['resize' => $poster161, 'banner' => $banner]);
       
        $post->duration = $this->get_duration($request->file('file'));
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
        $albums = Album::all();
        $singers = Artist::whereRole('singer')->get();
        $writers = Artist::whereRole('writer')->get();
        return view('Panel.Music.add', compact(['post', 'playlists', 'albums', 'singers', 'writers']));
    }






    public function EditMusic(Request $request, Post $post)
    {

        //  dd($request->all());

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
       
         if ($request->featured && $request->featured == 1) {
            $post->featured =1;
        } else {
            $post->featured = 0;
        }
        $post->update();



        $this->editInformation($request, $post);

        toastr()->success('موزیک با موفقیت ویرایش شد');

        return Redirect::route('Panel.MusicList');
    }

    public function DeletePost(Request $request)
    {


        $post = Post::find($request->post_id);
        if($post->type == 'video') {

            File::deleteDirectory(public_path("videos/$post->slug/"));
        }else{
            File::deleteDirectory(public_path("music/$post->slug/"));
        }
        $post->files()->delete();
        $post->captions()->delete();
      
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
