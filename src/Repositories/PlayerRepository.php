<?php

namespace Brad82\FootballData\Repositories;

class PlayerRepository extends FootballDataRepository
{
    public function all()
    {}

    public function find($id)
    {
        return $this->_get('players/' . $id);
    }

    public function findByTeam($teamId)
    {
        return $this->_get('teams/' . $teamId . '/players');
    }
}