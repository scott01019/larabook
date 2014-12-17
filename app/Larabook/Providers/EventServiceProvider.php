<?php namespace Larabook\Providers;

use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider {

	/**
	 * Register Larabook event listener.
	 * @return [type] [description]
	 */
	public function register()
	{
		$this->app['events']->listen('Larabook.*', 'Larabook\Handlers\EmailNotifier');
	}
}