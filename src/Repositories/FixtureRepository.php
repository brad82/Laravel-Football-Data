<?php

namespace Brad82\FootballData\Repositories;

class FixtureRepository extends FootballDataRepository
{
    public function all()
    {
      return $this->_get('fixtures/');
    }

    public function find($id)
    {
        return $this->_get('fixtures/' . $id);
    }

    public function findByLeague($leagueId)
    {
        return $this->_get('competitions/' . $leagueId . '/fixtures');
    }

    public function findByTean($teamId)
    {
        return $this->_get('teams/' . $teamId . '/fixtures');
    }
}