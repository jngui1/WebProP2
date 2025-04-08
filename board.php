<?php
    require("randomizer.php");

    session_start();

    function create_board()
    {
        $readin = getRandomCategories("filtered_csv.csv");
        return $readin;
    }
    
    if (!($_SESSION["current_turn"]))
    {
        $_SESSION["current_turn"] = 1;
        
        $_SESSION["p1_winnings"] = 0;
        
        $_SESSION["p2_winnings"] = 0;
        
        $_SESSION["categories"] = create_board();
    }
    
    $categories_row = "";
    
    foreach ($_SESSION["categories"] as $index => $container)
    {
        foreach ($container as $name => $data)
        {
            $categories_row .= "<th>$name</th>\n                    \n                    ";
        }
    }
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
                <tr>
                    <?= $categories_row ?>
</tr>
                
                <tr>
                    <td><a href="answer.php?cat=1&val=100">$100</a></td>
                    
                    <td><a href="answer.php?cat=1&val=200">$200</a></td>
                    
                    <td><a href="answer.php?cat=1&val=300">$300</a></td>
                    
                    <td><a href="answer.php?cat=1&val=400">$400</a></td>
                    
                    <td><a href="answer.php?cat=1&val=500">$500</a></td>
                    
                </tr>
                
                <tr>
                    <td><a href="answer.php?cat=2&val=100">$100</a></td>
                    
                    <td><a href="answer.php?cat=2&val=200">$200</a></td>
                    
                    <td><a href="answer.php?cat=2&val=300">$300</a></td>
                    
                    <td><a href="answer.php?cat=2&val=400">$400</a></td>
                    
                    <td><a href="answer.php?cat=2&val=500">$500</a></td>
                    
                </tr>
                
                <tr>
                    <td><a href="answer.php?cat=3&val=100">$100</a></td>
                    
                    <td><a href="answer.php?cat=3&val=200">$200</a></td>
                    
                    <td><a href="answer.php?cat=3&val=300">$300</a></td>
                    
                    <td><a href="answer.php?cat=3&val=400">$400</a></td>
                    
                    <td><a href="answer.php?cat=3&val=500">$500</a></td>
                    
                </tr>
                
                <tr>
                    <td><a href="answer.php?cat=4&val=100">$100</a></td>
                    
                    <td><a href="answer.php?cat=4&val=200">$200</a></td>
                    
                    <td><a href="answer.php?cat=4&val=300">$300</a></td>
                    
                    <td><a href="answer.php?cat=4&val=400">$400</a></td>
                    
                    <td><a href="answer.php?cat=4&val=500">$500</a></td>
                    
                </tr>
                
                <tr>
                    <td><a href="answer.php?cat=5&val=100">$100</a></td>
                    
                    <td><a href="answer.php?cat=5&val=200">$200</a></td>
                    
                    <td><a href="answer.php?cat=5&val=300">$300</a></td>
                    
                    <td><a href="answer.php?cat=5&val=400">$400</a></td>
                    
                    <td><a href="answer.php?cat=5&val=500">$500</a></td>
                    
                </tr>
            
            </table>
        
        </div>
    
    </body>
    
</html>