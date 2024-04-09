<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Producten\Classes\Music;
use Producten\Classes\Movie;
use Producten\Classes\Game;
use Producten\Classes\ProductList;

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

foreach($list1->getProducts() as $product) 
{
echo '<tr>
        <td>' . $product->getCategory() . '</td>' .
       '<td>' . $product->getName() . '</td>' .
       '<td>' . $product->getSalesPrice() . '</td>' .
       '<td>' . implode(" ", $product->getInfo()) . '</td>
      </tr>';
}
echo '</table>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <style>
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
            list-style-type: none;
        }

        th {
            background: #4CAF50;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background: #f2f2f2;
        }
    </style>
</head>
<body>
</body>
</html>