<?php
// scoreboard.php

namespace DobbelSpel\Classes;

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