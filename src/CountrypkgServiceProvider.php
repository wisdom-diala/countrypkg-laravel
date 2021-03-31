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
		// dd("..Ok working");
	}

	public function register()
	{
		$this->commands([
			Console\Commands\GenerateCountries::class,
		]);
	}
}