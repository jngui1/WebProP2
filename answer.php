<?php
    require("functions.php");
    
    session_start();
    
    
    redirectToUrl("answer_old.php?cat=" . $_GET["cat"] . "&val=" . $_GET["val"], is_visited());
    
    foreach ($_SESSION["categories"] as $categoryArray)
    {
        if ($categoryArray[$_GET["cat"]])
        {
            $answer = $categoryArray[$_GET["cat"]][$_GET["val"]]["Answer"];
            
            $trueQuestion = $categoryArray[$_GET["cat"]][$_GET["val"]]["Question"];
            
            break;
        }
    }
    
    if (!($_SESSION["questions"]))
    {
        $falseString1 = getRandomWrongAnswer();
        
        $falseString2 = getRandomWrongAnswer();
        
        $randomPlace = rand(1, 3);
        
        $_SESSION["questions"] = array();
        
        if ($randomPlace == 1)
        {
            $_SESSION["questions"][] = $trueQuestion;
            
            $_SESSION["questions"][] = $falseString1;
            
            $_SESSION["questions"][] = $falseString2;
        }
        
        else if ($randomPlace == 2)
        {
            $_SESSION["questions"][] = $falseString1;
            
            $_SESSION["questions"][] = $trueQuestion;
            
            $_SESSION["questions"][] = $falseString2;
        }
        
        else
        {
            $_SESSION["questions"][] = $falseString2;
            
            $_SESSION["questions"][] = $falseString1;
            
            $_SESSION["questions"][] = $trueQuestion;
        }
    }
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
        
        <div id="cat_heading" class="heading"><h1>Category: <?= $_GET["cat"] ?> ($<?= $_GET["val"] ?>)</h1></div>
        
        <div id="answer"><h1><?= $answer ?></h1></div>
        
        <div id="question_choice_1" class="question_choice"><p><?= $_SESSION["questions"][0] ?></p></div>
        
        <div id="question_select_1" class="button_link question_select"><a href="question.php?cat=<?= $_GET["cat"] ?>&val=<?= $_GET["val"] ?>&question=0">Select</a></div>
        
        <div id="question_choice_2" class="question_choice"><p><?= $_SESSION["questions"][1] ?></p></div>
        
        <div id="question_select_2" class="button_link question_select"><a href="question.php?cat=<?= $_GET["cat"] ?>&val=<?= $_GET["val"] ?>&question=1">Select</a></div>
        
        <div id="question_choice_3" class="question_choice"><p><?= $_SESSION["questions"][2] ?></p></div>
        
        <div id="question_select_3" class="button_link question_select"><a href="question.php?cat=<?= $_GET["cat"] ?>&val=<?= $_GET["val"] ?>&question=2">Select</a></div>
        
    </body>
    
</html>