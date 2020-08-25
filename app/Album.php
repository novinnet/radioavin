<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use Sluggable;

    protected $guarded = ['id'];
    protected $with = 'posts';
    public $timestamps = false;

    
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

   public static function check($name)
   {
       if($obj = static::where('name',$name)->first()){
            return $obj->id;
       }else{
           return null;
       }
   }
    public function playurl()
    {
        return route('Play.Album',['slug'=>$this->slug]);
    }

     public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_album', 'album_id', 'post_id');
    }
}
