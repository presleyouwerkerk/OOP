<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Huizen\Classes\House;

$house1 = new House(2, 4, 10, 5, 2, 150000);
$house2 = new House(3, 6, 5, 3, 10, 225000);
$house3 = new House(2, 3, 3, 5, 5, 112500);

$house1Info = $house1->getHouse();
echo 'Dit huis heeft ' . $house1Info['floor'] . ' verdiepingen, ' . $house1Info['rooms'] . ' kamers en heeft
een volume van ' . $house1Info['volume'] . ' m3 ' . "<br>" . 'De prijs van het huis is: ' . $house1Info['price'];

echo "<br>";

$house2Info = $house2->getHouse();
echo 'Dit huis heeft ' . $house2Info['floor'] . ' verdiepingen, ' . $house2Info['rooms'] . ' kamers en heeft
een volume van ' . $house2Info['volume'] . ' m3 ' . "<br>" . 'De prijs van het huis is: ' . $house2Info['price'];

echo "<br>";

$house3Info = $house3->getHouse();
echo 'Dit huis heeft ' . $house3Info['floor'] . ' verdiepingen, ' . $house3Info['rooms'] . ' kamers en heeft
een volume van ' . $house3Info['volume'] . ' m3 ' . "<br>" . 'De prijs van het huis is: '  . $house3Info['price'];