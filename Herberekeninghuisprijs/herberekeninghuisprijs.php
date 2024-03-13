<?php

// Author: Presley Ouwerkerk

class House {

    private array $rooms = [];
    private int $volume = 0;
    private float $price;

    // Sets the price
    public function __construct($price) {
        $this->price = $price;
    }

    // Adds a room to the array
    public function addRoom(Room $room) {
        $this->rooms[] = $room;
    }

    // Calculates the total volume of all rooms in the house
    public function calculateTotalVolume(): float {
        foreach ($this->rooms as $room) {
            $this->volume += $room->calculateVolume();
        }
        return $this->volume;
    }

    // Returns the total volume of all rooms
    public function getTotalVolume(): int {
        return $this->volume;
    }

    // Returns an array of Room objects
    public function getRooms(): array {
        $roomObjects = [];
        foreach ($this->rooms as $room) {
            $roomObjects[] = ' Lengte: ' . $room->getLength() . 'm' . 
                             ' Breedte: ' . $room->getWidth() . 'm' .
                             ' Hoogte: ' . $room->getHeight() . 'm' . '<br>';
        }
        return $roomObjects;
    }

    // Returns the price of the house
    public function getPrice(): float {
        return $this->price;
    }
}

class Room {

    private float $length;
    private float $width;
    private float $height;

    // Sets the length, width and height
    public function __construct(float $length, float $width, float $height) {
        $this->length = $length;
        $this->width = $width;
        $this->height = $height;
    }

    // Calculates the volume of a room
    public function calculateVolume(): float {
        return $this->length * $this->width * $this->height;
    }

    // Returns the length of the room
    public function getLength(): float {
        return $this->length;
    }
    
    // Returns the width of the room
    public function getWidth(): float {
        return $this->width;
    }

    // Returns the height of the room
    public function getHeight(): float {
        return $this->height;
    }
}

$house = new House(894000);

$room = new Room(5.2, 5.1, 5.5);
$house->addRoom($room);

$room = new Room(4.8, 4.6, 4.9);
$house->addRoom($room);

$room = new Room(5.9, 2.5, 3.1);
$house->addRoom($room);

$house->calculateTotalVolume();

echo 'Inhoud Kamers: <br> <br>';
foreach ($house->getRooms() as $roomDimensions) {
    echo $roomDimensions;
}

echo '<br> Volume totaal = ' . $house->getTotalVolume() . 'm3 <br>';
echo 'Prijs van het huis is = ' . $house->getPrice() . ' euro';