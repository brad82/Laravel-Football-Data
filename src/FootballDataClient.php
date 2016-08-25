<?php

namespace Brad82\FootballData;

use App;
use GuzzleHttp\Client;

use Brad82\FootballData\Exceptions\FootballDataException;

class FootballDataClient
{
    protected $client;

    public function __construct($config)
    {
        $this->client = new Client($config);
    }

    public function getClient()
    {
        return $this->client;
    }

    public function __call($method, $args) 
    {

        $name = studly_case(str_singular($method));
        $repository = 'Brad82\\FootballData\\Repositories\\' . $name . 'Repository';

        if(!class_exists($repository)) {
            throw new FootballDataException('Could not build repository chain, there is no ' . $name . ' repository defined');
        }

        return new $repository($this->client);
    }
}