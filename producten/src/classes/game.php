<?php

namespace Producten\Classes;

class Game extends Product 
{
    private string $genre;
    private array $requirements = [];

    public function __construct(string $name, float $purchasePrice, int $tax,
    float $profit, string $description) 
    {
        parent::__construct($name, $purchasePrice, $tax, $profit, $description);
    }

    public function setGenre($genre) 
    {
        $this->genre = $genre;
    }

    public function addRequirements(string $requirement) 
    {
        $this->requirements[] = $requirement;
    }

    public function getInfo(): array 
    {
        $info = [];

        $info[] = "<li>" . $this->genre . "</li>";

        $info[] = "<li>Description:</li><ul><li>" . $this->description . "</li></ul>";

        $requirementsListItems = "";

        foreach ($this->requirements as $requirement) 
        {
            $requirementsListItems .= "<ul><li>" . $requirement . "</li></ul>";
        }

        $info[] = "<li>Extra info: " . $requirementsListItems . "</li>";
    
        return $info;
    }

    public function setCategory(string $category) 
    {
        $this->category = $category;
    }
}