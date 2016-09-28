<?php

namespace Brad82\FootballData\Synchronisers;

use Closure;
use Carbon\Carbon;
use FootballApi;

abstract class PlayerSynchroniser extends SynchroniserAbstract
{   
    abstract protected function getTeamRemoteIds();

    abstract protected function getLocalPlayersFromRemoteIds(array $ids, Closure $callback);
    
    protected function getRemoteData()
    {   
        foreach($this->getTeamRemoteIds() as $team_id) {
            $apiResponse = FootballApi::players()->findByTeam($team_id);
            $this->handleIncomingResults($apiResponse['players']);
        }
    }

    protected function handleIncomingResults($results)
    {
        $ids = [];

        die('Cant Continue: The football data API doesn\'t currently give us any way to link results from this query to local models');

        $this->getLocalPlayersFromRemoteIds(array_keys($ids), function($players)  use ($ids, $results)
        {
            foreach($players as $fixture) {
                $remote_index = $ids[$fixture->remote_id];
                $remote_result = $results[$remote_index];

                $this->syncExistingItem($remote_result, $fixture);

                unset($results[$remote_index]);
            }
        });

        dd($results);
    }
}