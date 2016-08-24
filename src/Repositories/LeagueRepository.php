<?php

namespace Brad82\FootballData\Models

class LeagueRepository extends FootballDataRepository
{
    public function all()
    {
        return $this->client->get()->all();
    }
}