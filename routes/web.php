<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/tsrm','TSRMController@index')->name('tsrm.index');
Route::get('/tsrm/confirm/{cmail}/{ctoken}','ConfirmController@index')->name('tsrm.confirm');

Route::get('/tsrm/signup','SignUpController@index')->name('tsrm.signup');
Route::post('/tsrm/signup','SignUpController@store');

Route::get('/tsrm/login','LogInController@index')->name('tsrm.login');
Route::post('/tsrm/login','LogInController@verify');

Route::get('/tsrm/logout','LogOutController@logout')->name('tsrm.logout');

Route::group(['middleware'=>['sess']], function(){
    Route::get('/tsrm/user/home','HomeController@index')->name('user.home');

    Route::get('/tsrm/user/viewprofile','HomeController@viewprofile')->name('user.viewprofile');
    Route::get('/tsrm/user/editprofile','HomeController@editprofile')->name('user.editprofile');
    Route::post('/tsrm/user/editprofile','HomeController@updateprofile');
    Route::post('/tsrm/user/profilepicture','HomeController@profilepicture');

    Route::get('/tsrm/user/followedseries','HomeController@followedseries')->name('user.followedseries');
    Route::get('/tsrm/user/unfollowseries/{id}','HomeController@unfollowseries')->name('user.unfollowseries');

    Route::get('/tsrm/user/followedmovie','HomeController@followedmovie')->name('user.followedmovie');
    Route::get('/tsrm/user/unfollowmovie/{id}','HomeController@unfollowmovie')->name('user.unfollowmovie');

    Route::get('/tsrm/user/follower','HomeController@follower')->name('user.follower');
    Route::get('/tsrm/user/following','HomeController@following')->name('user.following');
    Route::get('/tsrm/user/unfollowuser/{id}','HomeController@unfollowuser')->name('user.unfollowuser');

    Route::get('/tsrm/user/reviews','HomeController@reviews')->name('user.reviews');
    Route::get('/tsrm/user/deletereviews/{id}','HomeController@deletereviews')->name('user.deletereviews');

    Route::get('/tsrm/user/track','HomeController@track')->name('user.track');
    Route::get('/tsrm/user/episodeupdate/{id}/{status}','HomeController@episodemanage');

    Route::get('/tsrm/profile/followUser/{id}','UserProfileController@followuser');
    Route::get('/tsrm/profile/unfollowUser/{id}','UserProfileController@unfollowuser');

    Route::get('/tsrm/livesearch/{text}/{id}','SearchController@handle');

    Route::get('/tsrm/msprof/{id}','MovieSeriesController@show')->name('tsrm.msprof');
    Route::get('/tsrm/userprof/{id}','UserProfileController@show')->name('tsrm.userprof');
    Route::get('/tsrm/ms/allepisode/{id}','MovieSeriesController@allepisode');


    Route::get('/tsrm/ms/changerating/{id}','MovieSeriesController@changerating');
    Route::get('/tsrm/ms/changecomment/{id}/{comment}','MovieSeriesController@changecomment');
    Route::get('/tsrm/ms/followMS/{id}','MovieSeriesController@followms');
    Route::get('/tsrm/ms/unfollowMS/{id}','MovieSeriesController@unfollowms');
});












