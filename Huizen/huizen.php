<?php

class House {

    private $floor;
    private $rooms;
    private $length;
    private $width;
    private $height;
    private $volume;
    private $price;

    public function __construct(int $floor, int $rooms, 
    float $length, float $width, float $height, float $price) {
        $this->floor = $floor;
        $this->rooms = $rooms;
        $this->length = $length;
        $this->width = $width;
        $this->height = $height;
        $this->price = $price;
        $this->setVolume();
    }

    private function setVolume() {
        $totalVolume = $this->length * $this->width * $this->height;
        $this->volume = $totalVolume;
    }

    public function getVolume() {
        return $this->volume;
    }

    public function getFloor() {
        return $this->floor;
    }

    public function getRooms() {
        return $this->rooms;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getHouse() {
        return [
            'floor' => $this->getFloor(),
            'rooms' => $this->getRooms(),
            'volume' => $this->getVolume(),
            'price' => $this->getPrice()
        ];
    }
}

$house1 = new House(2, 4, 10, 5, 2, 150000);

$house1Info = $house1->getHouse();

echo 'Dit huis heeft ' . $house1Info['floor'] . ' verdiepingen, ' . $house1Info['rooms'] . ' kamers en heeft
een volume van ' . $house1Info['volume'] . ' m3 ' . "<br>" . 'De prijs van het huis is: ' . $house1Info['price'];

echo "<br>";

$house2 = new House(3, 6, 5, 3, 10, 225000);

$house2Info = $house2->getHouse();

echo 'Dit huis heeft ' . $house2Info['floor'] . ' verdiepingen, ' . $house2Info['rooms'] . ' kamers en heeft
een volume van ' . $house2Info['volume'] . ' m3 ' . "<br>" . 'De prijs van het huis is: ' . $house2Info['price'];

echo "<br>";

$house3 = new House(2, 3, 3, 5, 5, 112500);

$house3Info = $house3->getHouse();

echo 'Dit huis heeft ' . $house3Info['floor'] . ' verdiepingen, ' . $house3Info['rooms'] . ' kamers en heeft
een volume van ' . $house3Info['volume'] . ' m3 ' . "<br>" . 'De prijs van het huis is: '  . $house3Info['price'];
