<?php

namespace Brad82\FootballData\Eloquent\Contracts;

interface FootballDataSynchroniserContract
{
    public function mapFootballDataRemote(array $remote);
}
