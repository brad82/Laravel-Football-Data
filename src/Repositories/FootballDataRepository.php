<?php

namespace Brad82\FootballData\Repositories;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

use Brad82\FootballData\Exceptions\FootballDataException;

class FootballDataRepository
{
    protected $client;
    
    public function __construct(Client $client)
    {
        if (!$client instanceof Client) {
            throw new FootballDataException("Class " . get_class($client) . " must be an instance of GuzzleHttp\\Client");
        }

        $this->client = $client;
    }

    protected function _get($uri, $opts = []) 
    {
        return $this->parseResponse($this->client->get($uri));
    }

    protected function parseResponse(Response $response)
    { 
        return json_decode($response->getBody(), true);
    }
}