<?php

namespace Brad82\FootballData\Eloquent\Traits;

trait SyncsWithFootballData
{
    abstract public function mapFootballDataRemote(array $remote);
}
