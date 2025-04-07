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
        <div id="turn_heading" class="heading"><h1>Player #'s turn!</h1></div>
        
        <div id="p1_score_tally" class="score_tally"><p>P1 Winnings: $0</p></div>
        
        <div id="p2_score_tally" class="score_tally"><p>P2 Winnings: $0</p></div>
        
        <div id="board_table">
            <table>
                <tr>
                    <th>Category 1</th>
                    
                    <th>Category 2</th>
                    
                    <th>Category 3</th>
                    
                    <th>Category 4</th>
                    
                    <th>Category 5</th>
                    
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