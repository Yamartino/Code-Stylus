<?php
Route::get('/', 'WelcomeController@index');

Route::get('login', 'GitHubController@login');
Route::get('verify', 'GitHubController@handleLogin');
Route::get('logout', 'GitHubController@logout');

Route::group(['middleware' => 'authGitHub'], function(){
  Route::resource('guides','GuideController',['only' => ['index', 'create', 'store']]);
  Route::group(['middleware' => 'guideOwner'], function(){
    Route::get('guides/{slug}/privacy', 'GuideController@show');
    Route::resource('guides','GuideController',['only' => ['edit', 'update', 'destroy']]);
  });
});

Route::group(['middleware' => 'visibility'], function() {
  Route::get('{slug}', 'GuideController@show');
});
