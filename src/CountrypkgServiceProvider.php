<?php

namespace Wisdom\Countrypkg;

use Illuminate\Support\ServiceProvider;

/**
 * 
 */
class CountrypkgServiceProvider extends ServiceProvider
{
	
	public function boot()
	{
		// $this->publishes([
  //       __DIR__.'/../config/countrypkg.php' => config_path('courier.php'),
  //   ]);
	}

	public function register()
	{
		$this->commands([
			Console\Commands\GenerateCountries::class,
		]);
	}
}