<?php

namespace Producten\Classes;

class Movie extends Product 
{
    private string $quality;

    public function __construct(string $name, float $purchasePrice, int $tax,
    float $profit, string $description) 
    {
        parent::__construct($name, $purchasePrice, $tax, $profit, $description);
    }

    public function setQuality(string $quality) 
    {
        $this->quality = $quality;
    }

    public function getInfo(): array 
    {
        $info = [];

        $info[] = "<li>" . $this->quality . "</li>";

        $info[] = "<li>Description:</li><ul><li>" . $this->description . "</li></ul>";
        
        return $info;
    }

    public function setCategory(string $category) 
    {
        $this->category = $category;
    }
}