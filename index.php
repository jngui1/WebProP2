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
        <div><h1>Welcome to Jeopardy!</h1></div>
        
        <div class="button_link"><a href="board.php">Begin Game</a></div>
    
    </body>
    
</html>