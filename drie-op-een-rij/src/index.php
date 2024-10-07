<?php

require_once __DIR__ . '/../vendor/autoload.php';

use DrieOpEenRij\Classes\Square;
use DrieOpEenRij\Classes\Rectangle;
use DrieOpEenRij\Classes\Circle;
use DrieOpEenRij\Classes\Triangle;

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