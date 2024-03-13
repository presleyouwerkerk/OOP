<?php

namespace Hospital\classes;

class Patient extends Person
{
    private string $eyeColor;
    private string $hairColor;
    private float $height;
    private float $weight;

    public function __construct(
        string $name,
        string $eyeColor,
        string $hairColor,
        float $height,
        float $weight
    ) {
        $this->eyeColor = $eyeColor;
        $this->hairColor = $hairColor;
        $this->height = $height;
        $this->weight = $weight;
        parent::__construct($name);
    }

    public function getEyeColor(): string
    {
        return $this->eyeColor;
    }

    public function getHairColor(): string
    {
        return $this->hairColor;
    }

    public function getHeight(): float
    {
        return $this->height;
    }

    public function getWeight(): float
    {
        return $this->weight;
    }

    public function setRole(string $role)
    {
        $this->role = $role;
    }
}