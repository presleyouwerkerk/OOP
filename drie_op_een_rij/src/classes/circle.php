<?php

namespace DrieOpEenRij\Classes;

class Circle extends Figure 
{
    private int $radius;

    public function __construct($color, $radius)
    {
        parent::__construct($color);
        $this->radius = $radius;
    }

    public function draw(): string 
    {
        return "<svg height='100' width='100' xmlns='http://www.w3.org/2000/svg'>
        <circle r='{$this->radius}' cx='50' cy='50' stroke='black' stroke-width='3' fill='{$this->getColor()}' />
        </svg>";
    }
}