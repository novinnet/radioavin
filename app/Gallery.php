<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
     protected $guarded = ['id'];


     public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
