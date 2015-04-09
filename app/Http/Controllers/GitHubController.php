<?php namespace Style\Http\Controllers;

use Style\Commands\SetRememberToken;
use Style\GitHubHandler;
use Style\Http\Requests;

class GitHubController extends Controller {

  protected $github;

  public function __construct(GitHubHandler $github)
  {
    $this->github = $github;
  }

  public function login()
  {
    return $this->github->redirectToProvider();
  }

  public function handleLogin()
  {
    $this->github->handleProviderCallback();
    return redirect('guides');
  }

  public function logout()
  {
    $this->github->endSession();
    return redirect('/');
  }

}
