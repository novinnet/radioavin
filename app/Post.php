<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
     use Sluggable;
    protected $guarded = ['id'];
   
    protected $casts = [
        'awards' => 'array',
    ];

    

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function albums()
    {
        return $this->belongsToMany(Album::class, 'post_album', 'post_id', 'album_id');
    }

     public function playlists()
    {
        return $this->belongsToMany(PlayList::class, 'post_playlist', 'post_id', 'play_list_id');
    }
  public function captions()
    {
        return $this->hasmany(Caption::class);
    } 
    public function files()
    {
        return $this->morphMany(File::class, 'fileble');
    }
    // image and comment may be for videos or blogs

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    // votes may be for videos or comments
    public function votes()
    {
        return $this->morphMany(Vote::class, 'votable');
    }

    public function artists()
    {
        return $this->belongsToMany(Artist::class, 'post_artist', 'post_id', 'artist_id');
    }

    public function arrangements()
    {
        return $this->belongsToMany(Arrangement::class, 'post_arrangement', 'post_id', 'arrangement_id');
    }
      public function categories()
    {
        return $this->belongsToMany(Category::class, 'post_category', 'post_id', 'category_id');
    }

     public function singers()
    {
        $first = $this->artists->where('role','singer')->first();
        if($first) {
            return $first->fullname;
        }
    }

    public function url()
    {
        $type = $this->type;
        if($type == 'music') {
            return route('ShowMusic',$this->slug);
        }
        if($type == 'podcast') {
            return route('ShowPodcast',$this->slug);
        }
        if($type == 'video') {
            return route('ShowVideo',$this->slug);
        }
    }

    public function relatedPosts()
    {
       $cats =  $this->categories()->pluck('name');
        
      return $posts = Post::whereHas('categories',function($q)use($cats){
           $q->whereIn('name',$cats);
       })->get();
       
    }

    
}
