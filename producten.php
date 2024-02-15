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

    public function getName(): string {
        return $this->name;
    }

    public function getCateGory(): string {
        return $this->category;
    }

    public function getSalesPrice(): float {
        $sellingPrice = $this->purchasePrice + $this->profit + $this->tax;
        return $sellingPrice;
    }

    public function printInfo(): string {

    }

    abstract public function getInfo();

    public function setCategory(string $category) {
        $this->category = $category;
    }
}

class ProductList {
    private array $products = [];

    public function addProduct(Product $product) {
        $this->products[] = $product;
    }

    public function getProducts(): array {
        return $this->products;    
    }
}

class Game extends Product {
    private string $genre;
    private array $requirements = [];

    public function __construct($name, $purchasePrice, $tax,
    $profit, $description) {
        parent::__construct($name, $purchasePrice, $tax, $profit, $description);
    }

    public function setGenre($genre) {
        $this->genre = $genre;
    }

    public function addRequirements($requirement) {
        $this->requirements[] = $requirement;
    }

    public function getInfo(): array {
        $info = $this->genre;
        $info .= $this->requirements;
        return $info;
    }

    public function setCategory($category) {
        $this->category = $category;
    }
}

class Movie extends Product {
    private string $quality;

    public function __construct($name, $purchasePrice, $tax,
    $profit, $description) {
        parent::__construct($name, $purchasePrice, $tax, $profit, $description);
    }

    public function setQuality($quality) {
        $this->quality = $quality;
    }

    public function getInfo(): array {
        return $this->quality;
    }

    public function setCategory($category) {
        $this->category = $category;
    }
}

class Music extends Product {
    private string $artist;
    private array $numbers = [];

    public function __construct($name, $purchasePrice, $tax,
    $profit, $description) {
        parent::__construct($name, $purchasePrice, $tax, $profit, $description);
    }

    public function setArtist($artist) {
        $this->artist = $artist;
    }

    public function addNumber($number) {
        $this->numbers[] = $number;
    }

    public function getInfo(): array {
        $info = $this->artist;
        $info .= $this->numbers;
        return $info;
    }

    public function setCategory($category) {
        $this->category = $category;
    }
}

?>

<table>
  <tr>
    <th></th>
    <th></th>
    <th></th>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td> </td>
    <td></td>
    <td></td>
  </tr>
</table>

