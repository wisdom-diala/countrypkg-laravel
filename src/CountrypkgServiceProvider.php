<?php

namespace WisdomDiala\Countrypkg;

use Illuminate\Support\ServiceProvider;

/**
 * 
 */
class CountrypkgServiceProvider extends ServiceProvider
{
	
	public function boot()
	{
		$this->loadMigrationsFrom(__DIR__.'/database/migrations');

		$this->publishes([
	        __DIR__.'/resources/img/country_flags' => public_path('resources'),
	    ], 'public');
		
	}

	public function register()
	{
		$this->commands([
			Console\Commands\GenerateCountries::class,
			Console\Commands\GenerateStates::class,
		]);


	}
}