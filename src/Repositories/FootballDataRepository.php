<?php

namespace Brad82\FootballData\Models;

use GuzzleHttp\Client;

use Brad82\FootballData\Exceptions\FootballDataException;

class FootballDataRepository
{
    protected $client;
    
    public function __construct($client)
    {
        if (!$client instanceof Client) {
            throw new FootballDataException("Class " . $client::class . " must be an instance of GuzzleHttp\\Client");
        }

        $this->client = $client;
    }
}