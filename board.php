<?php
    require("randomizer.php");

    session_start();

    /*function create_board()
    {
        $readin = getRandomCategories("filtered_csv.csv");
        return $readin;
    }*/
    
    function create_board($boardQuestions)
    {
        // TODO: CREATE COOKIE so the board is reset only when the button is pressed. This code should be made in index.php ans wherever else reset is created.
        // Set the cookie to have the value of $boardQuestions, for access inside answer.php and other files
        
        // $boardQuestions = getRandomCategories("filtered_csv.csv");

        // Creates the heading
        $returnString = "<tr>";
        foreach ($boardQuestions as $categoryArray)
        {
            foreach ($categoryArray as $category => $valueArray)
            {
                $returnString .= "<th> $category </th>";
            }
        }
        
        $returnString .= "</tr>";

        // Creates the corresponding rows for the categories.
        for ($i = 1; $i < 6; $i++) {
            $returnString .= "<tr>";
            
            foreach ($boardQuestions as $categoryArray)
            {
                foreach ($categoryArray as $category => $valueArray)
                {
                    $returnString .= "<td> <a href=\"answer.php?cat=$category&val=" . (string) ($i * 100) . "\">" . (string) ($i * 100) . "</a></td>";
                }
            }
            
            $returnString .= "</tr>";
        }
        
        return $returnString;
    }
    
    if (!($_SESSION["current_turn"]))
    {
        $_SESSION["current_turn"] = 1;
        
        $_SESSION["p1_winnings"] = 0;
        
        $_SESSION["p2_winnings"] = 0;
        
        $_SESSION["categories"] = getRandomCategories("filtered_csv.csv");
    }
    
    /*$categories_row = "";
    
    foreach ($_SESSION["categories"] as $index => $container)
    {
        foreach ($container as $name => $data)
        {
            $categories_row .= "<th>$name</th>\n                    \n                    ";
        }
    }*/
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
            
                <!--<tr>
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
                    
                </tr>--!>
            
            </table>
        
        </div>
    
    </body>
    
</html>