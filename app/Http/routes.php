<?php
Route::get('/', 'WelcomeController@index');

Route::get('login', 'GitHubController@login');
Route::get('verify', 'GitHubController@handleLogin');
Route::get('logout', 'GitHubController@logout');

Route::group(['middleware' => 'authGitHub'], function(){
  Route::resource('guides','GuideController',['only' => ['create', 'store', 'update', 'index']]);
  Route::group(['middleware' => 'guideOwner'], function(){
    Route::get('guides/{slug}/privacy', 'GuideController@privacy');
    Route::resource('guides','GuideController',['only' => ['edit']]);
  });
});

Route::group(['middleware' => 'visibility'], function() {
  Route::get('{slug}', 'GuideController@show');
});
