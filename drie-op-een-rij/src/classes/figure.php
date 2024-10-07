<?php

namespace DrieOpEenRij\Classes;

abstract class Figure
{
    private string $color;

    public function __construct($color) 
    {
        $this->color = $color;
    }

    public function getColor(): string 
    {
        return $this->color;
    }

    abstract public function draw(): string;
}