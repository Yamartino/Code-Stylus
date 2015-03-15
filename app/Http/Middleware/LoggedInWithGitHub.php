<?php namespace Style\Http\Middleware;

use Closure;
use Style\User;

class LoggedInWithGitHub {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
    if( ! User::whereRememberToken(session('remember_token'))->first() )
    {
      return redirect('/');
    }
		return $next($request);
	}

}
