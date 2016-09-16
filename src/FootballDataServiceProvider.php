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
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('football', function() 
        {
            $config = [
                'base_uri' => 'http://api.football-data.org/v1/',
                'headers'  => [
                    'X-Auth-Token' => '3437824471a84516837f965c1c3f665f'
                ]
            ];

            return new FootballDataClient($config);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['football'];
    }
}
