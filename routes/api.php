<?php

Route::get('get','Api\MainController@index');
Route::get('playlists/latest','Api\PlayListController@latest');
Route::get('playlists/{id}','Api\PlayListController@get');
Route::get('featured','Api\MainController@featured');
Route::get('newsongs','Api\MainController@newsongs');
Route::get('hot-tracks','Api\MainController@hot_tracks');

Route::post('search','Api\MainController@search');

Route::post('/register','Api\AuthController@register');
Route::post('/login','Api\AuthController@login');
Route::post('/like-post','Api\UserController@like_post');
