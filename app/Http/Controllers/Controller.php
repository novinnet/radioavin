<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Album;
use App\Lyric;
use App\PlayList;
use App\Arrangement;
use App\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function convertDate($date)
    {

        $date_array = explode('/', $date);
        $year = $date_array[2];
        $month = $date_array[1];
        $day = $date_array[0];
        if (strlen($month) == 1) {
            $month = '0' . $month;
        }
        if (strlen($day) == 1) {
            $day = '0' . $day;
        }


        $new_date_array = array($year, $month, $day);
        $new_date_string = implode('/', $new_date_array);
        $carbon = \Morilog\Jalali\CalendarUtils::createCarbonFromFormat('Y/m/d', $new_date_string);

        return $carbon;
    }

    public function saveInformation(Request $request, $post, $destinationPath)
    {
        if (isset($request->singers)) {
            foreach ($request->singers as $key => $singer) {
                if ($id = Artist::check($singer)) {
                    $post->artists()->attach($id);
                }
            }
        }

        if ($post->type == 'video') {
            if (isset($request->file)) {
                foreach ($request->file as $key => $video) {
                    if (!is_null($video[1])) {
                        if (!File::exists($destinationPath)) {
                            File::makeDirectory($destinationPath, 0777, true);
                        }
                        $picextension = $video[1]->getClientOriginalExtension();
                        $fileName = 'video_' . date("Y-m-d") . '_' . time() . '.' . $picextension;
                        $video[1]->move(public_path($destinationPath), $fileName);
                        $videoPath = "$destinationPath/$fileName";
                        $post->files()->create(['url'=>$videoPath,'type'=>'video','quality_id'=>$video[2]]);
                    }
                }
            }
              if (isset($request->captions)) {
                foreach ($request->captions as $key => $caption) {
                    if (!is_null($caption[2]) && !is_null($caption[1]) ) {
                        if (!File::exists($destinationPath)) {
                            File::makeDirectory($destinationPath, 0777, true);
                        }
                        $picextension = $caption[2]->getClientOriginalExtension();
                        $fileName = 'video_' . date("Y-m-d") . '_' . time() . '.' . $picextension;
                        $caption[2]->move(public_path($destinationPath), $fileName);
                        $captionPath = "$destinationPath/$fileName";
                        $post->captions()->create(['url'=>$captionPath,'lang'=>$caption[1]]);
                    }
                }
            }
        }
        

        if ($post->type !== 'video') {
            if (isset($request->playLists)) {
                foreach ($request->playlists as $key => $playlist) {
                    if ($id = PlayList::check($playlist)) {
                        $post->playlists()->attach($id);
                    }
                }
            }
            if (isset($request->writers)) {
                foreach ($request->writers as $key => $writer) {
                    if ($id = Artist::check($writer)) {
                        $post->artists()->attach($id);
                    }
                }
            }
            if (isset($request->arrangements)) {
                foreach ($request->arrangements as $key => $arrangement) {
                    if ($id = Arrangement::check($arrangement)) {
                        $post->arrangements()->attach($id);
                    } else {

                        $post->arrangements()->create(['name' => $arrangement]);
                    }
                }
            }
            if (isset($request->albums)) {
                foreach ($request->albums as $key => $album) {
                    if ($id = Album::check($album)) {
                        $post->albums()->attach($id);
                    } else {

                        $post->albums()->create(['name' => $album]);
                    }
                }
            }

            if (isset($request->file)) {

                $picextension = $request->file('file')->getClientOriginalExtension();
                $fileName = 'audio_' . date("Y-m-d") . '_' . time() . '.' . $picextension;
                $request->file('file')->move(public_path($destinationPath), $fileName);
                $url = "$destinationPath/$fileName";
                $post->files()->create([
                    'url' => $url,
                    'type' => 'audio',

                ]);
            }
        }
    }


    public function editInformation(Request $request, $post , $destinationPath = null)
    {


         if ($post->type == 'video') {
            if (isset($request->file)) {
                foreach ($request->file as $key => $video) {
                    if (array_key_exists(1,$video) && !is_null($video[1])) {

                        if (!File::exists($destinationPath)) {
                            File::makeDirectory($destinationPath, 0777, true);
                        }
                        $picextension = $video[1]->getClientOriginalExtension();
                        $fileName = 'video_' . date("Y-m-d") . '_' . time() . '.' . $picextension;
                        $video[1]->move(public_path($destinationPath), $fileName);
                        $videoPath = "$destinationPath/$fileName";
                        $post->files()->create(['url'=>$videoPath,'type'=>'video','quality_id'=>$video[2]]);
                    }
                }
            }
              if (isset($request->captions)) {
                foreach ($request->captions as $key => $caption) {
                    if (array_key_exists(1,$caption) && array_key_exists(2,$caption) &&  !is_null($caption[2]) && !is_null($caption[1]) ) {
                        if (!File::exists($destinationPath)) {
                            File::makeDirectory($destinationPath, 0777, true);
                        }
                        $picextension = $caption[2]->getClientOriginalExtension();
                        $fileName = 'video_' . date("Y-m-d") . '_' . time() . '.' . $picextension;
                        $caption[2]->move(public_path($destinationPath), $fileName);
                        $captionPath = "$destinationPath/$fileName";
                        $post->captions()->create(['url'=>$captionPath,'lang'=>$caption[1]]);
                    }
                }
            }
        }
        if (isset($request->playlists)) {
            foreach ($request->playlists as $key => $playlist) {
                if ($post->playlists()->pluck('id')->contains($playlist)) {
                    continue;
                }
                if ($id = PlayList::check($playlist)) {
                    $post->playlists()->attach($id);
                }
            }
        }


        if (isset($request->singers)) {
            foreach ($request->singers as $key => $singer) {
                if ($post->artists()->pluck('id')->contains($singer)) {
                    continue;
                }
                if ($id = Artist::check($singer)) {
                    $post->artists()->attach($id);
                }
            }
        }
        if (isset($request->writers)) {
            foreach ($request->writers as $key => $writer) {
                if ($post->artists()->pluck('id')->contains($writer)) {
                    continue;
                }
                if ($id = Artist::check($writer)) {
                    $post->artists()->attach($id);
                }
            }
        }


        if (isset($request->arrangements)) {
            foreach ($request->arrangements as $key => $arrangement) {
                if ($post->arrangements()->pluck('name')->contains($arrangement)) {
                    continue;
                }
                if ($id = Arrangement::check($arrangement)) {
                    $post->arrangements()->attach($id);
                } else {

                    $post->arrangements()->create(['name' => $arrangement]);
                }
            }
        }
        if (isset($request->albums)) {
            foreach ($request->albums as $key => $album) {
                if ($post->albums()->pluck('name')->contains($album)) {
                    continue;
                }
                if ($id = Album::check($album)) {
                    $post->albums()->attach($id);
                } else {

                    $post->albums()->create(['name' => $album]);
                }
            }
        }
    }


    public function SavePoster(Request $request, $destinationPath)
    {
        if ($request->hasFile('poster')) {
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0777, true);
            }
            $picextension = $request->file('poster')->getClientOriginalExtension();
            $fileName = 'poster_' . date("Y-m-d") . '_' . time() . '.' . $picextension;
            $request->file('poster')->move(public_path($destinationPath), $fileName);
            return "$destinationPath/$fileName";
        } else {
            return '';
        }
    }
}