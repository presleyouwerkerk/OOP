<?php

namespace DrieOpEenRij\Classes;

class Triangle extends Figure 
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
        return "<svg height='{$this->height}' width='{$this->width}' xmlns='http://www.w3.org/2000/svg'>
        <polygon points='0,{$this->height} {$this->width},{$this->height} " . ($this->width / 2) . ",0' stroke='black' stroke-width='3' fill='{$this->getColor()}' />
        </svg>";
    }
}