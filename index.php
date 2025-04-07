<?php
    session_start();
    
    session_unset();
    
    session_destroy();
?>
<!DOCTYPE html>

<html lang="en">
    <head>
        <title>Jeopardy</title>

        <meta charset="UTF-8">

        <link rel="stylesheet" type="text/css" href="layout.css">
        
    </head>

    <body>
        <div id="welcome"><h1>Welcome to Jeopardy!</h1></div>
        
        <div id="start_board_link" class="button_link"><a href="board.php">Begin Game</a></div>
    
    </body>
    
</html>