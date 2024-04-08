<?php
// Index.php

require_once __DIR__ . '/../vendor/autoload.php';

use Dobbelspel\classes\Game;
use Dobbelspel\classes\Scoreboard;

session_start();

$game = isset($_SESSION['game']) ? $_SESSION['game'] : new Game();
$scoreboard = isset($_SESSION['scoreboard']) ? $_SESSION['scoreboard'] : new Scoreboard();

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    if (isset($_POST["start"])) {
        $game->play();
        $_SESSION['game'] = $game;
        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    }

    if (isset($_POST["restart"])) 
    {
        $scoreboard->addGame($game);
        $_SESSION['scoreboard'] = $scoreboard;
        
        $game = new Game();
        $_SESSION['game'] = $game;
        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    }

    if (isset($_POST["delete_data"])) 
    {
        $scoreboard->reset();
        $_SESSION['scoreboard'] = $scoreboard;
        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    }
}

$results = $game->getResults();
$scoreboardGames = $scoreboard->getGames();
$showDeleteButton = !empty($scoreboardGames);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dice Game</title>
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

<h1>Dice Game</h1>

<form method="post">
    <?php if (count($results) < 3): ?>
        <input type="submit" name="start" value="Throw Dice">
    <?php endif; ?>

    <?php if (count($results) == 3): ?>
        <input type="submit" name="restart" value="Restart Game">
    <?php endif; ?>
</form>

<?php
$throwCount = 0;
$totalScores = [];

foreach ($results as $throwIndex => $throw):
    $throwCount++;
    $throwTotal = array_sum($throw);
    $totalScores[$throwIndex] = $throwTotal; ?>

    <p>Throw <?php echo $throwCount; ?>:</p>
    <p>Total: <?php echo $totalScores[$throwIndex]; ?></p>

    <?php foreach ($throw as $result): ?>
        <img class="dice" src="dice_svgs/<?php echo $result; ?>.svg" alt="Dice">
    <?php endforeach; ?>

    <br>
<?php endforeach; ?>

<br><hr>

<h2>Scoreboard</h2>

<?php if ($showDeleteButton): ?>
    <form method="post">
        <input type="submit" name="delete_data" value="Delete Data">
    </form>
<?php else: ?>
    <p>N/A</p>
<?php endif; ?>

<?php foreach ($scoreboardGames as $gameIndex => $scoreboardGame): ?>
    <h3>Game <?php echo $gameIndex + 1; ?>:</h3>

    <?php foreach ($scoreboardGame as $throwIndex => $throw): ?>
        <p>Throw <?php echo $throwIndex + 1; ?>: <?php echo array_sum($throw); ?></p>
    <?php endforeach; ?>

<?php endforeach; ?>
</body>
</html>