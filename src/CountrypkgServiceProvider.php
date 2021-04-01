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
		$this->loadMigrationsFrom(__DIR__.'/database/migrations');
		// $this->publishes([
  //       __DIR__.'/../config/countrypkg.php' => config_path('courier.php'),
  //   ]);
		// $jsonString = file_get_contents(__DIR__.'/resources/files/countries.json');


  //   	$data = json_decode($jsonString, true);

  //   	dd($data);

		// $jsonString = file_get_contents(__DIR__.'/resources/files/states.json');


  //   	$data = json_decode($jsonString, true);

  //   	dd($data);
	}

	public function register()
	{
		$this->commands([
			Console\Commands\GenerateCountries::class,
			Console\Commands\GenerateStates::class,
		]);
	}
}