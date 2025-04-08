<?php
    session_start();
    
    foreach ($_SESSION["visited"] as &$categoryArray)
    {
        if ($categoryArray[$_GET["cat"]])
        {
            $categoryArray[$_GET["cat"]][$_GET["val"]] = true;
            
            // check if the selected question is correct
            $selectedQuestionIndex = $_GET["question"];
            $isCorrect = false;
            $correctQuestion = "";
            
            foreach ($_SESSION["categories"] as $categoryArray)
            {
                if ($categoryArray[$_GET["cat"]])
                {
                    $correctQuestion = $categoryArray[$_GET["cat"]][$_GET["val"]]["Question"];
                    break;
                }
            }
            
            if ($_SESSION["questions"][$selectedQuestionIndex] === $correctQuestion)
            {
                $isCorrect = true;
                // update player winnings
                if ($_SESSION["current_turn"] == 1)
                {
                    $_SESSION["p1_winnings"] += $_GET["val"];
                }
                else
                {
                    $_SESSION["p2_winnings"] += $_GET["val"];
                }
            }
            
            // change turns
            $_SESSION["current_turn"] = ($_SESSION["current_turn"] == 1) ? 2 : 1;
            
            //print_r($_SESSION["visited"]);
            
            break;
        }
    }
    
    unset($_SESSION["questions"]);
?>
<!DOCTYPE html>

<html lang="en">
    <head>
        <title>Jeopardy - Question</title>

        <meta charset="UTF-8">

        <link rel="stylesheet" type="text/css" href="layout.css">
        
    </head>

    <body>
        <div id="turn_heading" class="heading"><h1>Player <?= $_SESSION["current_turn"] ?>'s turn!</h1></div>
        
        <div id="cat_heading" class="heading"><h1>Category: <?= $_GET["cat"] ?> ($<?= $_GET["val"] ?>)</h1></div>
        
        <div id="result"><h1><?= $isCorrect ? "Correct!" : "Incorrect!" ?></h1></div>
        
        <div id="result_question"><p>The correct question was: <?= $correctQuestion ?></p></div>
        
        <div id="winnings"><h1><?= $isCorrect ? "Player " . ($_SESSION["current_turn"] == 1 ? "2" : "1") . "'s winnings increased by<br>$" . $_GET["val"] . "!" : "No winnings this time!" ?></h1></div>
        
        <div id="return_button" class="button_link"><a href="board.php">Return to Board</a></div>
        
    </body>
    
</html>