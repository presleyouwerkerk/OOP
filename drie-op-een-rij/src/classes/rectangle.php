<?php

namespace DrieOpEenRij\Classes;

class Rectangle extends Figure 
{
    private int $width;
    private int $height;

    public function __construct($color, $width, $height) 
    {
        parent::__construct($color);
        $this->width = $width;
        $this->height = $height;
    }

    public function draw(): string {
        return "<svg width='{$this->width}' height='{$this->height}' xmlns='http://www.w3.org/2000/svg'>
        <rect width='{$this->width}' height='{$this->height}' x='0' y='0' stroke='black' stroke-width='3' fill='{$this->getColor()}' />
        </svg>";
    }
}