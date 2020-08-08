<?php

Route::get('/admin/login', 'Panel\LoginController@Login')->name('Admin.Login');
Route::post('/admin/login', 'Panel\LoginController@Verify')->name('Admin.Login');
Route::get('/testapi', 'Panel\ImdbController@testApi')->name('Test.Api');
Route::get('/', function () {
    return view('Front.index');
})->name('MainUrl');
Route::post('/ajax/getmoviedetail', 'Front\AjaxController@getMovieDetail')->name('GetMovieDetail');

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

    Route::get('video/{serie}/season/add', 'Panel\VideoController@AddSeason')->name('Panel.AddSeason');
    Route::post('video/{serie}/season/add', 'Panel\VideoController@InsertSeason')->name('Panel.AddSeason');

    Route::delete('video/season/delete', 'Panel\VideoController@DeleteSeason')->name('Panel.DeleteSeason');
    Route::get('video/season/{season}', 'Panel\VideoController@EditSeason')->name('Panel.EditSeason');
    Route::post('video/season/{season}', 'Panel\VideoController@SaveEditSeason')->name('Panel.EditSeason');

    Route::post('video/section/ajax/imdb', 'Panel\VideoController@getSectionImdbData')->name('Panel.getSectionImdbData');


    Route::get('video/addsection/{season}', 'Panel\VideoController@AddSection')->name('Panel.AddSection');
    Route::post('video/addsection/{season}', 'Panel\VideoController@InsertSection')->name('Panel.AddSection');
    Route::delete('video/section/delete', 'Panel\VideoController@DeleteSection')->name('Panel.DeleteSection');
    Route::get('video/section/{section}', 'Panel\VideoController@EditSection')->name('Panel.EditSection');
    Route::post('video/section/{section}', 'Panel\VideoController@SaveEditSection')->name('Panel.EditSection');

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


    Route::get('plans/add', 'Panel\PlanController@Add')->name('Panel.AddPlan');
    Route::post('plans/add', 'Panel\PlanController@Save')->name('Panel.AddPlan');
    Route::get('plans/{id}/edit', 'Panel\PlanController@Edit')->name('Panel.EditPlan');
    Route::put('plans/{id}/edit', 'Panel\PlanController@SaveEdit')->name('Panel.EditPlan');
    Route::get('plans/list', 'Panel\PlanController@List')->name('Panel.PlanList');
    Route::delete('plans/delete', 'Panel\PlanController@Delete')->name('Panel.DeletePlan');
    Route::delete('post/image/delete', 'Panel\MusicController@DeleteImage')->name('Panel.DeleteImage');
    Route::get('discounts', 'Panel\DiscountController@List')->name('Panel.DiscountList');
    Route::post('discount/save', 'Panel\DiscountController@Save')->name('Panel.Discount.Insert');
    Route::get('discount/{id}/edit', 'Panel\DiscountController@Edit')->name('Panel.Discount.Edit');
    Route::put('discount/{id}/edit', 'Panel\DiscountController@SaveEdit')->name('Panel.Discount.Edit');
    Route::delete('discount/delete', 'Panel\DiscountController@Delete')->name('Panel.DeleteDiscount');
    Route::get('sendmessage', 'Panel\MessageController@Add')->name('Panel.SendMessage');
    Route::post('sendmessage', 'Panel\MessageController@Send')->name('Panel.SendMessage');
    Route::get('blog/add', 'Panel\BlogController@Add')->name('Panel.AddBlog');
    Route::post('upload-image', 'Panel\BlogController@UploadImage')->name('UploadImage');
    Route::post('blog/add', 'Panel\BlogController@Save')->name('Panel.AddBlog');
    Route::get('blog/list', 'Panel\BlogController@List')->name('Panel.BlogList');
    Route::delete('blog/delete', 'Panel\BlogController@DeleteBlog')->name('Panel.DeleteBlog');
    Route::get('blog/edit/{blog}', 'Panel\BlogController@Edit')->name('Panel.EditBlog');
    Route::post('blog/edit/{blog}', 'Panel\BlogController@SaveEdit')->name('Panel.EditBlog');
    Route::get('comments/unconfirmed', 'Panel\CommentController@UnconfirmedComments')->name('Panel.UnconfirmedComments');
    Route::get('comments/confirmed', 'Panel\CommentController@ConfirmedComments')->name('Panel.ConfirmedComments');
    Route::get('setting', 'Panel\SettingController@Show')->name('Panel.Setting');
    Route::post('setting', 'Panel\SettingController@Save')->name('Panel.Setting');

    Route::post('imdb/get', 'Panel\ImdbController@Get')->name('Panel.GetImdb');
    Route::post('ajax/actor/get', 'Panel\ActorsController@GetActorAjax')->name('Panel.Ajax.GetActor');
    Route::post('ajax/director/get', 'Panel\ActorsController@GetDirectorAjax')->name('Panel.Ajax.GetDirector');
    Route::post('ajax/category', 'Panel\MusicController@AddCatAjax')->name('Panel.AddCatAjax');
    Route::post('ajax/checkname', 'Panel\MusicController@checkNameAjax')->name('Panel.checkNameAjax');
        Route::post('ajax/caption/delete', 'Panel\VideoController@DeleteCaption')->name('Ajax.DeleteCaption');

                Route::post('ajax/file/delete', 'Panel\VideoController@DeleteFile')->name('Ajax.DeleteFile');

});
