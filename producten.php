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

    }
}

class ProductList {

}

namespace Shop\Entertainment;
use Shop\Product;

class Game extends Product {

}

class Movie extends Product {

}

class Music extends Product {

}
