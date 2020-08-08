<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $guarded = ['id'];

      public static function check($name)
   {
       if($obj = static::where('id',$name)->first()){
            return $obj->id;
       }else{
           return null;
       }
   }
   
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'actor_video');
    }
}
