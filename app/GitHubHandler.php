<?php namespace Style;

use \Socialize;

class GitHubHandler {

  protected $user;
  protected $fail;

  public function __construct(User $user, Fail $fail){
    $this->user = $user;
    $this->fail = $fail;
  }

  public function redirectToProvider()
  {
    return Socialize::with('github')->redirect();
  }

  public function handleProviderCallback()
  {
    if( $GitHubUser = Socialize::with('github')->user()) {
      $user = $this->user->whereUsername($GitHubUser->nickname)->first();
      if( ! $user ){
        $user = $this->user->createUser($GitHubUser);
      }
      return $this->createSession($user);
    }
    return $this->fail->gitHubAuthError();
  }

  private function createSession($user){
    session(['remember_token' => $user->remember_token]);
    return $user;
  }

  public function endSession()
  {
    session()->forget('remember_token');
  }
}