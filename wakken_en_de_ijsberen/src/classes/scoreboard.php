<?php
// scoreboard.php

namespace WakkenEnDeIjsberen\Classes;

class Scoreboard
{
    private $games = [];

    public function addGame($game)
    {
        $totalGuesses = $game->getGuesses();
        $totalCorrectGuesses = $game->getCorrectGuesses();
        $totalFalseGuesses = $game->getFalseGuesses();
    
        $this->games[] = 
        [
            'total_guesses' => $totalGuesses,
            'total_correct_guesses' => $totalCorrectGuesses,
            'total_false_guesses' => $totalFalseGuesses
        ];
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