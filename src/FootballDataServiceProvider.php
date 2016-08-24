<?php

namespace Brad82\FootballData;

use Illuminate\Support\ServiceProvider;

class FootballDataServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->blind('football', function() 
        {
            $config = [
                'api_url' => 'http://api.football-data.org/v1'
            ];

            return new FootballDataClient($config);
        })
    }
}
