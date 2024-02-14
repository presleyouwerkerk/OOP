<?php

namespace Shop;

abstract class Product {
    private string $name;
    private float $purchasePrice;
    private int $tax;
    private string $description;
    private float $profit;
    protected string $category;

    public function __construct($name, $purchasePrice, $tax,
    $profit, $description) {
        $this->name = $name;
        $this->purchasePrice = $purchasePrice;
        $this->tax = $tax;
        $this->profit = $profit;
        $this->description = $description;
    }
}

class ProductList {

}

namespace Shop\Producten;

class Game extends Product {

}

class Movie extends Product {

}

class Music extends Product {

}
