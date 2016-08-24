<?php

namespace Brad82\FootballData;

use GuzzleHttp\Client;

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

    public static function __callStatic($method, $args) 
    {
      
    }
}