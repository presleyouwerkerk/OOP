<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dobbelspel</title>
    <style>
        .dice 
        {
            width: 100px;
            height: auto; 
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <?php
    // Index.php

    require __DIR__ . '/../vendor/autoload.php';

    use Dobbelspel\classes\Game;
    
    session_start();

    echo "<div style='font-size: 40px; font-family: Arial;'>Dice Game</div>";

    $game = isset($_SESSION['game']) ? $_SESSION['game'] : new Game();

    if (isset($_POST["start"])) 
    {
        $game->play();
        $_SESSION['game'] = $game;
    }

    if (isset($_POST["reset"])) 
    {
        $game->restartGame();
        $_SESSION['game'] = $game;
    }

    $results = $game->getResults();

    $total = 0;
    foreach ($results as $throw) 
    {
        foreach ($throw as $result) 
        {
            $total += $result;
        }
    }
    ?>

    <form method="post">
        <br>
        <input type="submit" name="start" value="Throw Dice">
        <br><br>
        <input type="submit" name="reset" value="Reset Game">
    </form>

    <?php 
    $throwCount = 0;
    foreach ($results as $throw): 
        $throwCount++;
    ?>

    <p>Throw <?php echo $throwCount; ?>:</p>
    
       <?php foreach ($throw as $result): ?>
        <img class="dice" src="dice_svgs/<?php echo $result; ?>.svg" alt="Dice">
       <?php endforeach; ?>
       
    <?php endforeach; ?>

    <p>Total Score: <?php echo $total; ?></p>
</body>
</html>