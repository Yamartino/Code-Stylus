<?php namespace Style;

use \Socialize;

class GitHubHandler {

  protected $user;

  public function __construct(User $user){
    $this->user = $user;
  }

  public function redirectToProvider()
  {
    return Socialize::with('github')->redirect();
  }

  public function handleProviderCallback()
  {
    if( $GitHubUser = Socialize::with('github')->user()) {
      if( $userObject = $this->user->whereUsername($GitHubUser->nickname)->first()){
        return $userObject;
      }
      $this->user->username = $GitHubUser->nickname;
      $this->user->name = $GitHubUser->name;
      $this->user->github_token = $GitHubUser->token;
      $this->user->avatar = $GitHubUser->avatar;
      $this->user->profile = $GitHubUser->user['html_url'];
      $this->user->save();

      return $this->user;
    }
    return redirect('/');
  }

  public function endSession()
  {
    session()->forget('remember_token');
  }
}