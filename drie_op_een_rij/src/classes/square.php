<?php

namespace DrieOpEenRij\Classes;

class Square extends Figure 
{
    private int $length;

    public function __construct($color, $length) 
    {
        parent::__construct($color);
        $this->length = $length;
    }

    public function draw(): string 
    {
        return "<svg width='{$this->length}' height='{$this->length}' xmlns='http://www.w3.org/2000/svg'>
        <rect width='{$this->length}' height='{$this->length}' x='0' y='0' stroke='black' stroke-width='3' fill='{$this->getColor()}' />
        </svg>";
    }
}