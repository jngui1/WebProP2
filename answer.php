<?php
    session_start();
    
    
?>
<!DOCTYPE html>

<html lang="en">
    <head>
        <title>Jeopardy - Answer</title>

        <meta charset="UTF-8">

        <link rel="stylesheet" type="text/css" href="layout.css">
        
    </head>

    <body>
        <div id="turn_heading" class="heading"><h1>Player <?= $_SESSION["current_turn"] ?>'s turn!</h1></div>
        
        <div id="cat_heading" class="heading"><h1>Category #: $#00</h1></div>
        
        <div id="answer"><h1>Answer 1</h1></div>
        
        <div id="question_choice_1" class="question_choice"><p>Question 1: Lorem ipsum dolor sit amet consectetur</p></div>
        
        <div id="question_select_1" class="button_link question_select"><a href="question.php?cat=#&val=#00&question=1">Select</a></div>
        
        <div id="question_choice_2" class="question_choice"><p>Question 2: Adipiscing elit sed do eiusmod tempor</p></div>
        
        <div id="question_select_2" class="button_link question_select"><a href="question.php?cat=#&val=#00&question=2">Select</a></div>
        
        <div id="question_choice_3" class="question_choice"><p>Question 3: Incididunt ut labore et dolore magna aliqua</p></div>
        
        <div id="question_select_3"class="button_link question_select"><a href="question.php?cat=#&val=#00&question=3">Select</a></div>
        
    </body>
    
</html>