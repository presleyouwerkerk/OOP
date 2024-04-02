<?php
// Game.php

namespace Dobbelspel\classes;

class Game 
{
    private $dice;
    private $throwCount;

    public function __construct() 
    {
        $this->dice = new Dice();
        $this->throwCount = isset($_SESSION['throwCount']) ? $_SESSION['throwCount'] : 0;
    }

    public function play()
    {
        $this->dice->throwDice();
        $this->throwCount++;
        $_SESSION["throwCount"] = $this->throwCount;
        echo "Worp " . $this->throwCount . ": " . $this->dice->getFaceValue() . "<br/>";
    }

    public function restartGame()
    {
        session_unset();
            
        session_destroy();
    }
}