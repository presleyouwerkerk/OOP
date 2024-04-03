<?php
// Game.php

namespace Dobbelspel\classes;

class Game 
{
    private $dices = [];
    private $maxDice = 6;
    private $maxThrows = 3;
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
        if (count($this->results) >= $this->maxThrows) 
        {
            echo "You have reached the maximum limit of throws.";
            return;
        }

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