<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{


    protected $guarded = ['id'];
    public $timestamps = false;

   public static function check($name)
   {
       if($obj = static::where('name',$name)->first()){
            return $obj->id;
       }else{
           return null;
       }
   }

     public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_album', 'album_id', 'post_id');
    }
}
