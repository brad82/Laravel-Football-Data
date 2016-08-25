<?php

namespace Brad82\FootballData\Repositories;

class TeamRepository extends FootballDataRepository
{
    public function all()
    {}

    public function find($id)
    {
        return $this->_get('teams/' . $id);
    }

    public function findByLeague($leagueId)
    {
        return $this->_get('competitions/' . $leagueId . '/teams');
    }
}