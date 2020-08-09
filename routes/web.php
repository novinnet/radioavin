<?php

Route::get('/admin/login', 'Panel\LoginController@Login')->name('Admin.Login');
Route::post('/admin/login', 'Panel\LoginController@Verify')->name('Admin.Login');
Route::get('/', function () {
    return view('Front.index');
})->name('MainUrl');

// q]Ahy;dA~mmk

Route::group(['middleware' => ['admin'], 'prefix' => 'panel'], function () {
    Route::get('/', 'Panel\DashboardController@Index')->name('BaseUrl');
    Route::get('/logout', function () {
        Auth::guard('admin')->logout();
        return redirect()->route('Admin.Login');
    })->name('logout');

    Route::get('music/add', 'Panel\MusicController@Add')->name('Panel.AddMusic');
    Route::post('music/add', 'Panel\MusicController@Save')->name('Panel.AddMusic');
    Route::put('music/add', 'Panel\MusicController@EditPost')->name('Panel.AddMusic');
    Route::get('users', 'Panel\UserController@List')->name('Panel.UserList');
    Route::post('user/add', 'Panel\UserController@Add')->name('Panel.AddUser');
    Route::get('video/add', 'Panel\VideoController@Add')->name('Panel.AddVideo');
    Route::post('video/add', 'Panel\VideoController@Save')->name('Panel.AddVideo');


    Route::delete('user/delete', 'Panel\UserController@Delete')->name('Panel.DeleteUser');
    Route::get('music/list', 'Panel\MusicController@MusicList')->name('Panel.MusicList');
    Route::get('video/list', 'Panel\VideoController@VideoList')->name('Panel.VideoList');


    Route::get('artist/list', 'Panel\ArtistController@List')->name('Panel.ArtistList');
    Route::get('artist/add', 'Panel\ArtistController@Add')->name('Panel.AddArtist');
    Route::post('artist/add', 'Panel\ArtistController@Save')->name('Panel.AddArtist');
    Route::get('artist/edit/{artist}', 'Panel\ArtistController@Edit')->name('Panel.EditArtist');
    Route::post('artist/edit/{artist}', 'Panel\ArtistController@EditSave')->name('Panel.EditArtist');

    Route::get('playlists', 'Panel\PlaylistController@List')->name('Panel.PlayList');
    Route::get('playlist/add', 'Panel\PlaylistController@Add')->name('Panel.AddPlayList');
    Route::post('playlist/add', 'Panel\PlaylistController@Save')->name('Panel.AddPlayList');
    Route::get('playlist/edit/{PlayList}', 'Panel\PlaylistController@Edit')->name('Panel.EditPlayList');
    Route::post('playlist/edit/{PlayList}', 'Panel\PlaylistController@EditSave')->name('Panel.EditPlayList');

    Route::get('albums', 'Panel\AlbumController@List')->name('Panel.Album');
    Route::get('album/add', 'Panel\AlbumController@Add')->name('Panel.AddAlbum');
    Route::post('album/add', 'Panel\AlbumController@Save')->name('Panel.AddAlbum');
    Route::get('album/edit/{album}', 'Panel\AlbumController@Edit')->name('Panel.EditAlbum');
    Route::post('album/edit/{album}', 'Panel\AlbumController@EditSave')->name('Panel.EditAlbum');

    Route::get('music/{post}', 'Panel\MusicController@Edit')->name('Panel.EditMusic');
    Route::post('music/{post}', 'Panel\MusicController@EditMusic')->name('Panel.EditMusic');

    Route::get('video/{post}', 'Panel\VideoController@Edit')->name('Panel.EditVideo');
    Route::post('video/{post}', 'Panel\VideoController@EditVideo')->name('Panel.EditVideo');


    Route::post('delete/playlist', 'Panel\AjaxController@DeletePlayList')->name('DeletePlayList');
    Route::post('delete/album', 'Panel\AjaxController@DeleteAlbum')->name('DeleteAlbum');
    Route::post('delete/category', 'Panel\AjaxController@DeleteCategory')->name('DeleteCategory');

    Route::post('delete/lyric', 'Panel\AjaxController@DeleteLyric')->name('DeleteLyric');
    Route::post('delete/arrangement', 'Panel\AjaxController@DeleteArrangement')->name('DeleteArrangement');
    Route::get('gallery/list', 'Panel\GalleryController@List')->name('Panel.GalleryList');

    Route::get('gallery/add', 'Panel\GalleryController@Add')->name('Panel.AddGallery');
    Route::post('gallery/add', 'Panel\GalleryController@Save')->name('Panel.AddGallery');
    Route::get('gallery/{post}', 'Panel\GalleryController@Edit')->name('Panel.EditGallery');
    Route::post('gallery/{post}', 'Panel\GalleryController@EditGallery')->name('Panel.EditGallery');
    Route::delete('gallery', 'Panel\GalleryController@DeleteGallery')->name('Panel.DeleteGallery');


    Route::delete('post/delete', 'Panel\MusicController@DeletePost')->name('Panel.DeletePost');
    Route::delete('video/delete', 'Panel\MusicController@DeleteVideo')->name('Panel.DeleteVideo');



    Route::get('sendmessage', 'Panel\MessageController@Add')->name('Panel.SendMessage');
    Route::post('sendmessage', 'Panel\MessageController@Send')->name('Panel.SendMessage');

    Route::get('comments/unconfirmed', 'Panel\CommentController@UnconfirmedComments')->name('Panel.UnconfirmedComments');
    Route::get('comments/confirmed', 'Panel\CommentController@ConfirmedComments')->name('Panel.ConfirmedComments');
    Route::get('setting', 'Panel\SettingController@Show')->name('Panel.Setting');
    Route::post('setting', 'Panel\SettingController@Save')->name('Panel.Setting');

    Route::post('ajax/category', 'Panel\MusicController@AddCatAjax')->name('Panel.AddCatAjax');
    Route::post('ajax/checkname', 'Panel\MusicController@checkNameAjax')->name('Panel.checkNameAjax');
    Route::post('ajax/caption/delete', 'Panel\VideoController@DeleteCaption')->name('Ajax.DeleteCaption');

    Route::post('ajax/file/delete', 'Panel\VideoController@DeleteFile')->name('Ajax.DeleteFile');
});
