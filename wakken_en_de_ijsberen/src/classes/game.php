<?php
// game.php

namespace WakkenEnDeIjsberen\Classes;

class Game 
{
    private $dices = [];
    private $results = [];
    private $holes = 0;
    private $iceBears = 0;
    private $penguins = 0;
    private $guesses = 0;
    private $correctGuesses = 0;
    private $falseGuesses = 0;
    private $guessResult;
    
    const HOLES_ICEBEARS_PENGUINS = 
    [
        1 => [1, 0, 6],
        2 => [0, 0, 0],
        3 => [1, 2, 4],
        4 => [0, 0, 0],
        5 => [1, 4, 2],
        6 => [0, 0, 0]
    ];

    public function play($numberOfDice)
    {
        $userDice = max(3, min(8, $numberOfDice));
        $throwResults = [];

        for ($i = 0; $i < $userDice; $i++) 
        {
            $this->dices[] = new Dice();
        }

        foreach ($this->dices as $dice) 
        {
            $dice->throwDice();
            $throwResults[] = $dice->getFaceValue();
        }

        $this->results[] = $throwResults;
    }

    public function makeGuess()
    {
        $this->guesses++;
        $this->holes = 0;
        $this->iceBears = 0;
        $this->penguins = 0;
    
        foreach ($this->results as $throw) 
        {
            foreach ($throw as $result) 
            {
                [$hole, $iceBear, $penguin] = self::HOLES_ICEBEARS_PENGUINS[$result];
                $this->holes += $hole;
                $this->iceBears += $iceBear;
                $this->penguins += $penguin;
            }
        }
    }

    public function isGuessCorrect($userHoles, $userIceBears, $userPenguins)
    {
        if ($this->holes == $userHoles && $this->iceBears == $userIceBears && $this->penguins == $userPenguins) 
        {
            $this->correctGuesses++;
            $this->guessResult = 'Correct guess!';
        } 
        else
        {
            $this->falseGuesses++;
            $this->guessResult = 'Incorrect guess!';
        }
    }

    public function getCorrectAnswer()
    {
        $correctAnswer = [0, 0, 0];
    
        foreach ($this->results as $throw) 
        {
            foreach ($throw as $result) 
            {
                [$hole, $iceBear, $penguin] = self::HOLES_ICEBEARS_PENGUINS[$result];
                $correctAnswer[0] += $hole;
                $correctAnswer[1] += $iceBear;
                $correctAnswer[2] += $penguin;
            }
        }
        return $correctAnswer;
    }
    
    public function getResults()
    {
        return $this->results;
    }

    public function getGuesses()
    {
        return $this->guesses;
    }

    public function getCorrectGuesses()
    {
        return $this->correctGuesses;
    }

    public function getFalseGuesses()
    {
        return $this->falseGuesses;
    }

    public function getGuessResult()
    {
        return $this->guessResult;
    }
}