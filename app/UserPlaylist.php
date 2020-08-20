<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPlaylist extends Model
{
    protected $guarded = ['id'];
    protected $table = 'uplaylists';
      public function tracks()
    {
        return $this->belongsToMany(Post::class, 'uplaylist_track', 'playlist_id', 'track_id');
    }
    public function playurl()
    {
        return route('Play.Playlist',['id'=>$this->id]).'?type=u';
    }
     public function addurl()
    {
        return route('Ajax.AddToPlaylist');
    }
}


