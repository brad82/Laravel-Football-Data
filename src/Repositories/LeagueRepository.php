<?php

namespace Brad82\FootballData\Repositories;

class LeagueRepository extends FootballDataRepository
{
    public function all()
    {
        return $this->_get('competitions');
    }

    public function find($id) 
    {
        return $this->_get('competitions/' . $id);
    }
}