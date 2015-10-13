<?php

namespace Codenexus\GeoIPlm;

use Illuminate\Support\ServiceProvider;
use Codenexus\GeoIPlm\Console\Commands\UpdateCommand;

class GeoIPServiceProvider extends ServiceProvider
{
	public function boot()
	{

	}

	public function register()
	{
		$this->app->singleton('geoip', function()
		{
			return new GeoIP;
		});

		$this->app->singleton('command.geoip.update', function()
		{
			return new UpdateCommand;
		});

		$this->commands(
			'command.geoip.update'
		);
	}
}