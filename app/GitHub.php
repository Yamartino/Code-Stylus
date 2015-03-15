<?php namespace Style;

use \Socialize;

class GitHub {

  public function redirectToProvider()
  {
    return Socialize::with('github')->redirect();
  }

  public function handleProviderCallback()
  {
    $user = Socialize::with('github')->user();

    $userObject               = new User;
    $userObject->username     = $user->nickname;
    $userObject->name         = $user->name;
    $userObject->github_token = $user->token;
    $userObject->avatar       = $user->avatar;
    $userObject->profile      = $user->user['html_url'];
    $userObject->save();

    return $userObject;
  }

  public function endSession()
  {
    session()->forget('remember_token');
  }
}