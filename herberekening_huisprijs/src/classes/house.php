<?php

namespace HerberekeningHuisprijs\Classes;

class House 
{
    private array $rooms = [];
    private int $volume = 0;
    private float $price;

    public function __construct($price) 
    {
        $this->price = $price;
    }

    public function addRoom(Room $room): void
    {
        $this->rooms[] = $room;
    }

    public function calculateTotalVolume(): float 
    {
        foreach ($this->rooms as $room) 
        {
            $this->volume += $room->calculateVolume();
        }
        return $this->volume;
    }

    public function getTotalVolume(): int 
    {
        return $this->volume;
    }

    public function getRooms(): array 
    {
        $roomObjects = [];
        foreach ($this->rooms as $room) 
        {
            $roomObjects[] = ' Lengte: ' . $room->getLength() . 'm' . 
                             ' Breedte: ' . $room->getWidth() . 'm' .
                             ' Hoogte: ' . $room->getHeight() . 'm' . '<br>';
        }
        return $roomObjects;
    }

    public function getPrice(): float 
    {
        return $this->price;
    }
}