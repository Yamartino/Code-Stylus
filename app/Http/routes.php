<?php
Route::get('/', 'WelcomeController@index');

Route::get('login', 'GitHubController@login');
Route::get('verify', 'GitHubController@handleLogin');
Route::get('logout', 'GitHubController@logout');

Route::group(['middleware' => 'authGitHub'], function(){
  Route::resource('guide','GuideController',['only' => ['create', 'store', 'edit', 'update']]);
  Route::get('guides', 'GuideController@index');
});

Route::get('{slug}', 'GuideController@show');


