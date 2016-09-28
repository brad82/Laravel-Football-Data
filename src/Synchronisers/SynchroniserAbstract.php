<?php

namespace Brad82\FootballData\Synchronisers;

use Carbon\Carbon;

abstract class SynchroniserAbstract
{   
    abstract protected function getRemoteData();

    abstract protected function handleIncomingResults($results);

    public function run() 
    {
        return $this->getRemoteData();
    }

    protected function syncExistingItem($remote, $local)
    {
        $local->mapFootballDataRemote($remote);
        $local->last_synced_at = Carbon::now();
        $local->save();
    }
}
