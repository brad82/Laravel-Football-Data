<?php

namespace Brad82\FootballData\Synchronisers;

use Carbon\Carbon;
use FootballApi;

abstract class FixtureSynchroniser extends SynchroniserAbstract
{   
    abstract protected function getLeagueRemoteIds();
    abstract protected function getLocalFixturesFromRemoteIds(array $ids);
    protected function getRemoteData()
    {   
        foreach($this->getLeagueRemoteIds() as $league_id) {
            $apiResponse = FootballApi::fixtures()->findByLeague($league_id);
            $this->handleIncomingResults($apiResponse['fixtures']);
        }
    }

    protected function handleIncomingResults($results)
    {
        $ids = [];

        // Fixtures dont actually return an ID, so we need to calculate it
        // from a resource link. *sigh*
        foreach($results  as $k => $fixture) {
            $href = explode('/', array_get($fixture, '_links.self.href'));
            
            if(is_numeric($remote_id = (int) end($href))) {
                $ids[$remote_id] = $k;
            }
        }

        $fixtures = $this->getLocalFixturesFromRemoteIds(array_keys($ids));

        foreach($fixtures as $fixture) {
            $remote_index = $ids[$fixture->remote_id];
            $remote_result = $results[$remote_index];

            $this->syncItem($remote_result, $fixture);
        }
    }
}