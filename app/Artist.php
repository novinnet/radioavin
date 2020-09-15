<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use Sluggable;
    protected $guarded = ['id'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'fullname'
            ]
        ];
    }
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
        return $this->belongsToMany(Post::class, 'post_artist');
    }

    public function url()
    {
        return route('Artist.Show',['slug'=>$this->slug]);
    }
     public function image($size)
    {
        $data = @unserialize($this->photo);
        if ($data == true && !is_null(unserialize($this->photo)["$size"])) {
            
            $resize = unserialize($this->photo)["$size"];
            return asset($resize);
        } else {
            if ($size == 'resize') return asset('frontend/images/logo_101.png');
            if ($size == 'banner') return asset('frontend/images/logo_100.png');
        }
    }
}
