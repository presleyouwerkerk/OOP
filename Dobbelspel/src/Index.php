<?php
// Index.php

session_start();

require __DIR__ . '/../vendor/autoload.php';

use Dobbelspel\classes\Game;
use Dobbelspel\classes\Dice;

echo "<div style='font-size: 40px; font-family: Arial;'>Dobbelspel</div>";

$game = new Game();

if (isset($_POST["start"]))
{
    echo "<br>";
    $game->play();
}

if (isset($_POST["reset"]))
{
	$game->restartGame();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dobbelspel</title>
</head>
<body>
    <form method="post">
        <br>
        <input type="submit" name="start" value="Gooi dobbelstenen">
        <br><br>
        <input type="submit" name ="reset" value="Restart Game">
    </form>
</body>
</html>