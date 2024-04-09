<?php

namespace Producten\Classes;

class Music extends Product 
{
    private string $artist;
    private array $numbers = [];

    public function __construct(string $name, float $purchasePrice, int $tax,
    float $profit, string $description) 
    {
        parent::__construct($name, $purchasePrice, $tax, $profit, $description);
    }

    public function setArtist(string $artist) 
    {
        $this->artist = $artist;
    }

    public function addNumber(string $number) 
    {
        $this->numbers[] = $number;
    }

    public function getInfo(): array 
    {
        $info = [];

        $info[] = "<li>" . $this->artist . "</li>";

        $info[] = "<li>Description:</li><ul><li>" . $this->description . "</li></ul>";

        $numbersListItems = "";

        foreach ($this->numbers as $number) 
        {
            $numbersListItems .= "<ul><li>" . $number . "</li></ul>";
        }

        $info[] = "<li>Extra info: " . $numbersListItems . "</li>";

        return $info;
    }
    
    public function setCategory(string $category) 
    {
        $this->category = $category;
    }
}