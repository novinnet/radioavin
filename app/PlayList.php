<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayList extends Model
{
    protected $guarded = ['id'];
    public static function check($id)
    {
        if ($obj = static::where('id', $id)->first()) {
            return $obj->id;
        } else {
            return null;
        }
    }

       public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_playlist','play_list_id','post_id');
    }

}
