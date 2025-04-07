<?php
    session_start();
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
        
        <div id="p1_heading" class="heading"><h1>Player 1's winnings: $#00</h1></div>
        
        <div id="p2_heading" class="heading"><h1>Player 2's winnings: $#00</h1></div>
        
        <div id="winner"><h1>Player # Wins!</h1></div>
        
        <div id="return_button" class="button_link"><a href="index.php">Return to Landing Page</a></div>
    
    </body>
    
</html>