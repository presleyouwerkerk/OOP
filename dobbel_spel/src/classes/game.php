<?php
// game.php

namespace DobbelSpel\Classes;

class Game 
{
    private $dices = [];
    private $maxDice = 6;
    private $results = [];

    public function __construct() 
    {
        for ($i = 0; $i < $this->maxDice; $i++) 
        {
            $this->dices[] = new Dice();
        }
    }

    public function play()
    {
        $throwResults = [];

        foreach ($this->dices as $dice) 
        {
            $dice->throwDice();
            $throwResults[] = $dice->getFaceValue();
        }

        $this->results[] = $throwResults;
    }

    public function getResults()
    {
        return $this->results;
    }

    public function restartGame()
    {
        $this->results = [];
    }
}