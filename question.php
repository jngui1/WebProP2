<?php
    session_start();
?>
<!DOCTYPE html>

<html lang="en">
    <head>
        <title>Jeopardy - Question</title>

        <meta charset="UTF-8">

        <link rel="stylesheet" type="text/css" href="layout.css">
        
    </head>

    <body>
        <div id="turn_heading" class="heading"><h1>Player #'s turn!</h1></div>
        
        <div id="cat_heading" class="heading"><h1>Category #: $#00</h1></div>
        
        <div id="result"><h1>Correct!</h1></div>
        
        <div id="result_question"><p>Question 1: Lorem ipsum dolor sit amet consectetur</p></div>
        
        <div id="winnings"><h1>Player #'s winnings increase by<br>$#00!</h1></div>
        
        <div id="return_button" class="button_link"><a href="board.php">Return to Board</a></div>
        
    </body>
    
</html>