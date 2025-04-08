<?php
    require("functions.php");

    session_start();
    
    if (!($_SESSION["current_turn"]))
    {
        $_SESSION["current_turn"] = 1;
        
        $_SESSION["p1_winnings"] = 0;
        
        $_SESSION["p2_winnings"] = 0;
        
        $_SESSION["categories"] = getRandomCategories("filtered_csv.csv");
        
        $_SESSION["visited"] = array();
        
        foreach($_SESSION["categories"] as $categoryArray)
        {
            $_SESSION["visited"][] = array();
            
            foreach ($categoryArray as $category => $valueArray)
            {
                $_SESSION["visited"][count($_SESSION["visited"])-1][$category] = array();
                
                foreach($valueArray as $values => $answerArray)
                {
                    $_SESSION["visited"][count($_SESSION["visited"])-1][$category][$values] = false;
                }
            }
        }
    }
    
    // check if all values have been visited
    $allVisited = true;
    foreach ($_SESSION["visited"] as $categoryArray)
    {
        foreach ($categoryArray as $category => $valueArray)
        {
            foreach ($valueArray as $value => $visited)
            {
                if (!$visited)
                {
                    $allVisited = false;
                    break 3;
                }
            }
        }
    }
    
    redirectToUrl("board_done.php", $allVisited);
?>
<!DOCTYPE html>

<html lang="en">
    <head>
        <title>Jeopardy - Board</title>

        <meta charset="UTF-8">

        <link rel="stylesheet" type="text/css" href="layout.css">
        
    </head>

    <body>
        <div id="turn_heading" class="heading"><h1>Player <?= $_SESSION["current_turn"] ?>'s turn!</h1></div>
        
        <div id="p1_score_tally" class="score_tally"><p>P1 Winnings: $<?= $_SESSION["p1_winnings"] ?></p></div>
        
        <div id="p2_score_tally" class="score_tally"><p>P2 Winnings: $<?= $_SESSION["p2_winnings"] ?></p></div>
        
        <div id="board_table">
            <table>
                <?= create_board($_SESSION["categories"]); ?>
            </table>
        
        </div>
    
    </body>
    
</html>
