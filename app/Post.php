<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = ['id'];
   
    protected $casts = [
        'awards' => 'array',
    ];

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

    
}
