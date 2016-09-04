<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('/', 'SoundcloudController@index');
    
    // Soundcloud routes
    Route::get('/discover', 'SoundcloudController@discover');
    Route::post('/filter' , 'SoundcloudController@getFilteredTracks');
    Route::post('/nextTrack', 'SoundcloudController@nextTrack');
    Route::get('/relatedTracks/{id}', 'SoundcloudController@getRelatedTracks');
    Route::get('/discover_next_song', 'SoundcloudController@update');
    Route::get('/track/{id}', 'SoundcloudController@showTrack');
    Route::get('/test', 'SoundcloudController@test');
});