<?php namespace Style\Http\Controllers;

use Style\Commands\SetRememberToken;
use Style\GitHub;
use Style\Http\Requests;
use Style\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GitHubController extends Controller {

  protected $github;

  public function __construct(GitHub $github)
  {
    $this->github = $github;
  }

  public function login()
  {
    return $this->github->redirectToProvider();
  }

  public function handleLogin()
  {
    $user = $this->github->handleProviderCallback();

    $this->dispatch(
      new SetRememberToken($user)
    );

    return redirect('done');
  }

  public function logout()
  {
    $this->github->endSession();
  }

}
