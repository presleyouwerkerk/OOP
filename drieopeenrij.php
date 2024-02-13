<?php

// Author: Presley Ouwerkerk

namespace Shapes;

use Shapes\Circle;
use Shapes\Rectangle;
use Shapes\Square;
use Shapes\Triangle;

abstract class Figure {
    protected string $color;

    public function __construct($color) {
        $this->color = $color;
    }

    public function getColor(): string {
        return $this->color;
    }

    abstract public function draw(): string;
}

class Circle extends Figure {
    public int $radius;

    public function __construct($color, $radius) {
        parent::__construct($color);
        $this->radius = $radius;
    }

    public function draw(): string {
        return "<svg height='100' width='100' xmlns='http://www.w3.org/2000/svg'>
        <circle r='{$this->radius}' cx='50' cy='50' stroke='black' stroke-width='3' fill='{$this->color}' />
        </svg>";
    }
}

class Rectangle extends Figure {
    public int $width;
    public int $height;

    public function __construct($color, $width, $height) {
        parent::__construct($color);
        $this->width = $width;
        $this->height = $height;
    }

    public function draw(): string {
        return "<svg width='{$this->width}' height='{$this->height}' xmlns='http://www.w3.org/2000/svg'>
        <rect width='{$this->width}' height='{$this->height}' x='0' y='0' stroke='black' stroke-width='3' fill='{$this->color}' />
        </svg>";
    }
}

class Square extends Figure {
    public int $length;

    public function __construct($color, $length) {
        parent::__construct($color);
        $this->length = $length;
    }

    public function draw(): string {
        return "<svg width='{$this->length}' height='{$this->length}' xmlns='http://www.w3.org/2000/svg'>
        <rect width='{$this->length}' height='{$this->length}' x='0' y='0' stroke='black' stroke-width='3' fill='{$this->color}' />
        </svg>";
    }
}

class Triangle extends Figure {
    public int $width;
    public int $height;

    public function __construct($color, $width, $height) {
        parent::__construct($color);
        $this->width = $width;
        $this->height = $height;
    }

    public function draw(): string {
        return "<svg height='{$this->height}' width='{$this->width}' xmlns='http://www.w3.org/2000/svg'>
        <polygon points='0,{$this->height} {$this->width},{$this->height} " . ($this->width / 2) . ",0' stroke='black' stroke-width='3' fill='{$this->color}' />
        </svg>";
    }
}

$aquaSquare = new Square('aqua', 100);
$purpleSquare = new Square('purple', 100);
$greenSquare = new Square('green', 100);

echo $aquaSquare->draw();
echo $purpleSquare->draw();
echo $greenSquare->draw() . "<br>";

$aquaCircle = new Circle('aqua', 50);
$purpleCircle = new Circle('purple', 50);
$greenCircle = new Circle('green', 50);

echo $aquaCircle->draw();
echo $purpleCircle->draw();
echo $greenCircle->draw() . "<br>";

$aquaRectangle = new Rectangle('aqua', 100, 50);
$purpleRectangle = new Rectangle('purple', 100, 50);
$greenRectangle = new Rectangle('green', 100, 50);

echo $aquaRectangle->draw();
echo $purpleRectangle->draw();
echo $greenRectangle->draw() . "<br>";

$aquaTriangle = new Triangle('aqua', 100, 50);
$purpleTriangle = new Triangle('purple', 100, 50);
$greenTriangle = new Triangle('green', 100, 50);

echo $aquaTriangle->draw();
echo $purpleTriangle->draw();
echo $greenTriangle->draw() . "<br>";