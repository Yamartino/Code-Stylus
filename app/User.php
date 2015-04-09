<?php namespace Style;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'username'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['remember_token', 'github_token'];

  /**
   * Get the current user associated with the session
   *
   * @return User
   */
  public function currentUser(){
    return $this->whereRememberToken(session('remember_token'))->first();
  }

  /**
   * Create a new user using the GitHub auth object
   *
   * @param $GitHubUser
   * @return $this
   */
  public function createUser($GitHubUser){
    $this->username       = $GitHubUser->nickname;
    $this->name           = $GitHubUser->name;
    $this->github_token   = $GitHubUser->token;
    $this->avatar         = $GitHubUser->avatar;
    $this->profile        = $GitHubUser->user['html_url'];
    $user->remember_token = str_random(100);
    $this->save();
    return $this;
  }

}
