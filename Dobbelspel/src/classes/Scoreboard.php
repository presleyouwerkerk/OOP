<?php
// Scoreboard.php

namespace Dobbelspel\classes;

class Scoreboard
{
    private $games = [];

    public function addGame($game)
    {
        $this->games[] = $game->getResults();
    }

    public function reset()
    {
        $this->games = [];
    }

    public function getGames()
    {
        return $this->games;
    }
}