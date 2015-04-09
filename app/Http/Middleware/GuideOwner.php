<?php namespace Style\Http\Middleware;

use Closure;
use Style\Guide;
use Style\User;
use Style\Fail;

class GuideOwner {

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
    if( ! $this->guide->isOwner($request->slug, $this->user->currentUser())){
      return $this->fail->noPermissionEdit();
    }
		return $next($request);
	}

}
