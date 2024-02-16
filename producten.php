<?php

// Author: Presley Ouwerkerk

namespace Shop;

abstract class Product {
    private string $name;
    private float $purchasePrice;
    private int $tax;
    protected string $description;
    private float $profit;
    protected string $category;

    public function __construct(string $name, float $purchasePrice, int $tax,
    float $profit, string $description) {
        $this->name = $name;
        $this->purchasePrice = $purchasePrice;
        $this->tax = $tax;
        $this->profit = $profit;
        $this->description = $description;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getCategory(): string {
        return $this->category;
    }

    public function getSalesPrice(): float {
        $sellingPrice = $this->purchasePrice + $this->profit + $this->tax;
        return $sellingPrice;
    }

    abstract public function getInfo();

    abstract public function setCategory(string $category);
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

class Music extends Product {
    private string $artist;
    private array $numbers = [];

    public function __construct(string $name, float $purchasePrice, int $tax,
    float $profit, string $description) {
        parent::__construct($name, $purchasePrice, $tax, $profit, $description);
    }

    public function setArtist(string $artist) {
        $this->artist = $artist;
    }

    public function addNumber(string $number) {
        $this->numbers[] = $number;
    }

    public function getInfo(): array {
        $info = [];

        $info[] = "<li>" . $this->artist . "</li>";

        $info[] = "<li>Description:</li><ul><li>" . $this->description . "</li></ul>";

        $numbersListItems = "";

        foreach ($this->numbers as $number) {
            $numbersListItems .= "<ul><li>" . $number . "</li></ul>";
        }

        $info[] = "<li>Extra info: " . $numbersListItems . "</li>";

        return $info;
    }
    
    public function setCategory(string $category) {
        $this->category = $category;
    }
}

class Movie extends Product {
    private string $quality;

    public function __construct(string $name, float $purchasePrice, int $tax,
    float $profit, string $description) {
        parent::__construct($name, $purchasePrice, $tax, $profit, $description);
    }

    public function setQuality(string $quality) {
        $this->quality = $quality;
    }

    public function getInfo(): array {
        $info = [];

        $info[] = "<li>" . $this->quality . "</li>";

        $info[] = "<li>Description:</li><ul><li>" . $this->description . "</li></ul>";
        
        return $info;
    }

    public function setCategory(string $category) {
        $this->category = $category;
    }
}

class Game extends Product {
    private string $genre;
    private array $requirements = [];

    public function __construct(string $name, float $purchasePrice, int $tax,
    float $profit, string $description) {
        parent::__construct($name, $purchasePrice, $tax, $profit, $description);
    }

    public function setGenre($genre) {
        $this->genre = $genre;
    }

    public function addRequirements(string $requirement) {
        $this->requirements[] = $requirement;
    }

    public function getInfo(): array {
        $info = [];

        $info[] = "<li>" . $this->genre . "</li>";

        $info[] = "<li>Description:</li><ul><li>" . $this->description . "</li></ul>";

        $requirementsListItems = "";

        foreach ($this->requirements as $requirement) {
            $requirementsListItems .= "<ul><li>" . $requirement . "</li></ul>";
        }

        $info[] = "<li>Extra info: " . $requirementsListItems . "</li>";
    
        return $info;
    }

    public function setCategory(string $category) {
        $this->category = $category;
    }
}

$music1 = new Music("Native", 2.50, 21, 1.50, "Leuke muziek!");
$music1->setArtist("OneRepublic");
$music1->addNumber("Counting Stars");
$music1->addNumber("Light It Up");
$music1->setCategory("Music");

$music2 = new Music("Future Nostalgia", 3, 21, 2.50, "Futuristische muziek!");
$music2->setArtist("Dua Lipa");
$music2->addNumber("Don't Start Now");
$music2->addNumber("Physical");
$music2->setCategory("Music");

$movie1 = new Movie("Spiderman", 6.99, 21, 3.50, "Spannende film!");
$movie1->setQuality("DVD");
$movie1->setCategory("Movie");

$movie2 = new Movie("Spiderman 2", 7.99, 21, 3.50, "Het vervolg van Spiderman!");
$movie2->setQuality("Blu-ray");
$movie2->setCategory("Movie");

$game1 = new Game("Call of Duty", 25.99, 21, 5.00, "Uitdagend spel!");
$game1->setGenre("FPS");
$game1->addRequirements("OS: Windows");
$game1->addRequirements("Processor: Intel Core i7");
$game1->addRequirements("Memory: 16 GB");
$game1->setCategory("Game");

$game2 = new Game("GTA V", 7.99, 21, 2.50, "Gewelddadig spel!");
$game2->setGenre("FPS");
$game2->addRequirements("OS: Windows");
$game2->addRequirements("Processor: Intel Core i5");
$game2->addRequirements("Memory: 16 GB");
$game2->setCategory("Game");

$list1 = new ProductList;
$list1->addProduct($music1);
$list1->addProduct($music2);
$list1->addProduct($movie1);
$list1->addProduct($movie2);
$list1->addProduct($game1);
$list1->addProduct($game2);

echo '<table>
     <tr>
        <th>Category</th>
        <th>Naam product</th>
        <th>Verkoopprijs</th>
        <th>Info</th>
     </tr>';

foreach($list1->getProducts() as $product) {
echo '<tr>
        <td>' . $product->getCategory() . '</td>' .
       '<td>' . $product->getName() . '</td>' .
       '<td>' . $product->getSalesPrice() . '</td>' .
       '<td>' . implode(" ", $product->getInfo()) . '</td>
      </tr>';
}
echo '</table>';

echo '<style>
table {
    width: 100%;
    border-collapse: collapse;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

th, td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
    list-style-type: none; /* Remove bullet points */
}

th {
    background: #4CAF50;
    color: white;
    font-weight: bold;
}

tr:nth-child(even) {
    background: #f2f2f2;
}
</style>';
