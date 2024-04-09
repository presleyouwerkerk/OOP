<?php

namespace Huizen\Classes;

class House 
{
    private int $floor;
    private int $rooms;
    private float $length;
    private float $width;
    private float $height;
    private float $volume;
    private int $price;

    public function __construct(int $floor, int $rooms, 
    float $length, float $width, float $height, float $price) 
    {
        $this->floor = $floor;
        $this->rooms = $rooms;
        $this->length = $length;
        $this->width = $width;
        $this->height = $height;
        $this->price = $price;
        $this->volume = $this->length * $this->width * $this->height;
    }

    public function getVolume(): float
    {
        return $this->volume;
    }

    public function getFloor(): int
    {
        return $this->floor;
    }

    public function getRooms(): int
    {
        return $this->rooms;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getHouse(): array
    {
        return [
            'floor' => $this->getFloor(),
            'rooms' => $this->getRooms(),
            'volume' => $this->getVolume(),
            'price' => $this->getPrice()
        ];
    }
}