<?php

namespace Brad82\FootballData\Repositories;

class LeagueRepository extends FootballDataRepository
{
    public function all()
    {
        $this->_get('competitions');
    }
}