<?php
require("randomizer.php");


function create_board()
{
    // TODO: CREATE COOKIE so the board is reset only when the button is pressed. This code should be made in index.php ans wherever else reset is created.
    // Set the cookie to have the value of $boardQuestions, for access inside answer.php and other files
    $boardQuestions = getRandomCategories("filtered_csv.csv");

    // Creates the heading
    echo "<tr>";
    foreach ($boardQuestions as $categoryArray) {
        foreach ($categoryArray as $category => $valueArray) {
            echo "<th> $category </th>";
        }
    }
    echo "</tr>";

    // Creates the corresponding rows for the categories.
    for ($i = 1; $i < 6; $i++) {
        echo "<tr>";
        foreach ($boardQuestions as $categoryArray) {
            foreach ($categoryArray as $category => $valueArray) {
                echo "<td> <a href=\"answer.php?cat=$category&val=", $i * 100, "\">", $i * 100, "</a></td>";
            }
        }
        echo "</tr>";
    }
}

if (!($_SESSION["current_turn"])) {
    $_SESSION["current_turn"] = 1;

    $_SESSION["p1_winnings"] = 0;

    $_SESSION["p2_winnings"] = 0;
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
    <div id="turn_heading" class="heading">
        <h1>Player #'s turn!</h1>
    </div>

    <div id="p1_score_tally" class="score_tally">
        <p>P1 Winnings: $<?= $_SESSION["p1_winnings"] ?></p>
    </div>

    <div id="p2_score_tally" class="score_tally">
        <p>P2 Winnings: $<?= $_SESSION["p2_winnings"] ?></p>
    </div>
    <div id="board_table">
        <table>

            <?php create_board() ?>
        </table>

    </div>

</body>

</html>