<?php namespace Style\Http\Middleware;

use Closure;
use Style\Fail;
use Style\Guide;
use Style\User;

class CheckVisibility {

  protected $guide;
  protected $user;
  protected $fail;

  public function __construct(Guide $guide, User $user, Fail $fail){
    $this->guide = $guide;
    $this->user  = $user;
    $this->fail  = $fail;
  }

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
    if($guide = $this->guide->isPrivate($request->slug)) {
      if( ! $this->guide->userHasPermission($this->user->currentUser(), $request->slug)) {
        return $this->fail->noPermission();
      }
    }
    return $next($request);
	}

}
