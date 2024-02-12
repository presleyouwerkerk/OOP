<?php

abstract class Figure {
    public $color;

    public function __construct($color) {
        $this->color = $color;
    }

    public function getColor(): string {
        return $this->color;
    }

    abstract public function draw();
}

class Circle extends Figure {
    public function __construct($color, $radius) {
        $this->color = $color;
        $this->radius = $radius;
    }

    public function draw(): string {
        echo "<circle r='{$this->radius}' cx='100' cy='50' fill='{$this->color}' />";
    }
}

class Rectangle extends Figure {
    public function __construct($color, $width, $height) {
        $this->color = $color;
        $this->width = $width;
        $this->height = $height;
    }

    public function draw(): string {
        echo "<rect width='{$this->width}' height='{$this->height}' x='100' y='150' fill='{$this->color}' />";
    }
}

class Square extends Figure {
    public function __construct($color, $length) {
        $this->color = $color;
        $this->length = $length;
    }

    public function draw(): string {
        echo "<rect width='{$this->length}' height='{$this->length}' x='100' y='200' fill='{$this->color}' />";
    }
}

class Triangle extends Figure {
    public function __construct($color, $width, $height) {
        $this->color = $color;
        $this->width = $width;
        $this->height = $height;
    }

    public function draw(): string {
        echo "<polygon points='200,10 250,190 150,190' fill='{$this->color}' />";
    }
}



