<?php

require_once __DIR__ . '/../vendor/autoload.php';

use HerberekeningHuisprijs\Classes\House;
use HerberekeningHuisprijs\Classes\Room;

$house = new House(894000);

$room = new Room(5.2, 5.1, 5.5);
$house->addRoom($room);

$room = new Room(4.8, 4.6, 4.9);
$house->addRoom($room);

$room = new Room(5.9, 2.5, 3.1);
$house->addRoom($room);

$house->calculateTotalVolume();

echo 'Inhoud Kamers: <br> <br>';
foreach ($house->getRooms() as $roomDimensions) 
{
    echo $roomDimensions;
}

echo '<br> Volume totaal = ' . $house->getTotalVolume() . 'm3 <br>';
echo 'Prijs van het huis is = ' . $house->getPrice() . ' euro';