<?php
// index.php

require_once __DIR__ . '/../vendor/autoload.php';

use WakkenEnDeIjsberen\Classes\Game;
use WakkenEnDeIjsberen\Classes\Scoreboard;

session_start();

$game = isset($_SESSION['game']) ? $_SESSION['game'] : new Game();
$scoreboard = isset($_SESSION['scoreboard']) ? $_SESSION['scoreboard'] : new Scoreboard();

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    if (isset($_POST["throw"])) 
    {
        unset($_SESSION['correct_guess']);
        $numberOfDice = $_POST['numberOfDice'];
        
        $game->play($numberOfDice);
        $_SESSION['game'] = $game;
        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    }

    if (isset($_POST["guess"])) 
    {
        $userHoles = $_POST["holes"];
        $userIceBears = $_POST["iceBears"];
        $userPenguins = $_POST["penguins"];

        $game->makeGuess();
        $game->isGuessCorrect($userHoles, $userIceBears, $userPenguins);

        if ($game->getGuessResult() == 'Correct guess!') 
        {
            $scoreboard->addGame($game);
            $_SESSION['scoreboard'] = $scoreboard;

            $game = new Game();
            $_SESSION['game'] = $game;
            $_SESSION['correct_guess'] = true;
        }

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
        .custom-table 
        {
            border-collapse: collapse;
            width: 40%;
        }
        .custom-table th, .custom-table td 
        {
            border: 1px solid black;
            padding: 1px;
            text-align: center;
        }
    </style>
</head>
<body>

<h1>Arctic Guessing Game</h1>

<?php
if ($game->getFalseGuesses() >= 3) 
{
    echo "<p>Hint:</p>";
    echo "<p>Ice bears only sit around a hole so they can get food.<br>
          Penguins are at the South Pole when there is a hole at the North Pole.</p>";
}
?>

<?php
if (count($results) > 0)
{
    echo "<p>" . $game->getGuessResult() . "<p>";
}
?>

<?php 
if (isset($_SESSION['correct_guess'])) 
{
    echo "<p>Correct guess!</p>";
}
?>

<?php if (count($results) < 1): ?>
    <form method="post">
        <label for="numberOfDice">Number of dice:</label>
        <input type="number" id="numberOfDice" name="numberOfDice" min="3" max="8" required><br><br>
        <button type="submit" name="throw">Throw Dice</button>
    </form>
<?php endif; ?>

<?php foreach ($results as $throwIndex => $throw): ?>
    <?php foreach ($throw as $result): ?>
        <img class="dice" src="dice_svgs/<?php echo $result; ?>.svg" alt="Dice">
    <?php endforeach; ?>
<?php endforeach; ?>

<?php $correctAnswer = $game->getCorrectAnswer(); ?>

<?php if (!empty($correctAnswer) && isset($_POST["show_solution"])): ?>
    <table class="custom-table">
        <thead>
            <tr>
                <th>Holes</th>
                <th>Ice bears</th>
                <th>Penguins</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $correctAnswer[0]; ?></td>
                <td><?php echo $correctAnswer[1]; ?></td>
                <td><?php echo $correctAnswer[2]; ?></td>
            </tr>
        </tbody>
    </table>
    <br>
    <style>
        .guess-form 
        {
            display: none;
        }
    </style>
<?php endif; ?>

<?php if (count($results) > 0 || isset($_POST["show_solution"])): ?>
    <form method="post" class="guess-form">
        <label for="holes">Guess holes:</label>
        <input type="number" id="holes" name="holes" min="0" required><br><br>
        <label for="iceBears">Guess ice bears:</label>
        <input type="number" id="iceBears" name="iceBears" min="0" required><br><br>
        <label for="penguins">Guess penguins:</label>
        <input type="number" id="penguins" name="penguins" min="0" required><br><br>
        <input type="submit" name="guess" value="Make guess"><br><br>
    </form>
<?php endif; ?>

<?php if (!isset($_POST["show_solution"]) && count($results) > 0): ?>
    <form method="post">
        <input type="submit" name="show_solution" value="Show correct solution"><br><br>
    </form>
<?php endif; ?>

<?php if (count($results) > 0): ?>
    <form method="post">
        <input type="submit" name="restart" value="Restart game">
    </form>
<?php endif; ?>

<br><hr>

<h2>Scoreboard</h2>

<?php if (!empty($scoreboardGames)): ?>
    <table class="custom-table">
        <thead>
            <tr>
                <th>Games</th>
                <th>Total guesses</th>
                <th>Incorrect guesses</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($scoreboardGames as $gameIndex => $scoreboardGame): ?>
                <tr>
                    <td>Game <?php echo $gameIndex + 1; ?></td>
                    <td><?php echo $scoreboardGame['total_guesses']; ?></td>
                    <td><?php echo $scoreboardGame['total_false_guesses']; ?></td>
                </tr>
            <?php endforeach; ?>

            <?php
            $totalCorrectGuesses = 0;

            foreach ($scoreboardGames as $scoreboardGame) 
            {
                $totalCorrectGuesses += $scoreboardGame['total_correct_guesses'];
            }
            ?>
            <tr>
                <td>Score</td>
                <td colspan="3"><?php echo $totalCorrectGuesses; ?></td>
            </tr>
        </tbody>
    </table>
    <br>
    <form method="post">
        <input type="submit" name="delete_data" value="Delete data">
    </form>
<?php else: ?>
    <p>N/A</p>
<?php endif; ?>

</body>
</html>