<?php
    session_start();
    
    $winner = $_SESSION["p1_winnings"] > $_SESSION["p2_winnings"] ? 1 : 
             ($_SESSION["p1_winnings"] < $_SESSION["p2_winnings"] ? 2 : "Tie");
?>
<!DOCTYPE html>

<html lang="en">
    <head>
        <title>Jeopardy - Board</title>

        <meta charset="UTF-8">

        <link rel="stylesheet" type="text/css" href="layout.css">
        
    </head>

    <body>
        <div id="over_heading" class="heading"><h1>Game Over!</h1></div>
        
        <div id="p1_heading" class="heading"><h1>Player 1's winnings: $<?= $_SESSION["p1_winnings"] ?></h1></div>
        
        <div id="p2_heading" class="heading"><h1>Player 2's winnings: $<?= $_SESSION["p2_winnings"] ?></h1></div>
        
        <div id="winner"><h1><?= $winner === "Tie" ? "It's a Tie!" : "Player " . $winner . " Wins!" ?></h1></div>
        
        <div id="return_button" class="button_link"><a href="index.php">Return to Landing Page</a></div>
    
    </body>
    
</html>