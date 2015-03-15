<?php namespace Style\Commands;

use Style\Commands\Command;

use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Support\Str;

class SetRememberToken extends Command implements SelfHandling {

  protected $user;
	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($user)
	{
		$this->user = $user;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
    $token = Str::random(100);
    $this->user->remember_token = $token;
    $this->user->save();
    session(['remember_token'=> $token]);
  }

}
