<?php

define("TOTAL_CATEGORY_COUNT", 7756);
define("QUESTIONS_USED", 5);
define("CATEGORIES_USED", 5);
/**
 * returns 5 categories. access the question and answer pairs through their values.
 * @return list [category1 => [100 => [answer => x, question => x], 
 *                             200 => [answer => x, question => x],
 *                             300 => [answer => x, question => x],
 *                             400 => [answer => x, question => x],
 *                             500 => [answer => x, question => x],
 *           category2 => [valueNumber => [answer => x, question => x], ... ] ...]
 */
function getRandomCategories(string $file_name = "filtered_csv.csv") {
    $categories = [];
    for ($i=0; $i < CATEGORIES_USED; $i++) { 
        $categories[] = getRandomCategory($file_name);
    }
    
    return $categories;
}
    
/** 
 * @return [category => [valueNumber => [answer => x, question => x] times 5]]
 * thats 1 category, with CATEGORIES_USED amount of value arrays containing the corresponding answer and question
 * enough to fill a single column.
 */
function getRandomCategory(string $file_name)
{
    $readin = file($file_name);
    // $fields = str_getcsv($readin[0], separator:"|", escape:"\\");

    $random_line = (rand(0, TOTAL_CATEGORY_COUNT) * 5) + 1;
    $category = str_getcsv($readin[$random_line], separator:"|", escape:"\\")[1];
    $categoryArray[$category] = array();
    for ($i=$random_line; $i < 5 + $random_line; $i++) { 
        $line = str_getcsv($readin[$i], separator:"|", escape:"\\");
        $categoryArray[$category][$line[0]] = array("Answer" => $line[2], "Question" => $line[3]);
    }
    
    return $categoryArray;
    //print_r($categoryArray);
}

function create_board($boardQuestions)
{
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
        
        foreach ($boardQuestions as $index => $categoryArray)
        {
            foreach ($categoryArray as $category => $valueArray)
            {
                $isVisited = isset($_SESSION["visited"][$index][$category][$i * 100]) && 
                            $_SESSION["visited"][$index][$category][$i * 100];
                $visitedClass = $isVisited ? " class=\"visited\"" : "";
                $returnString .= "<td> <a href=\"answer.php?cat=$category&val=" . (string) ($i * 100) . "\"$visitedClass>$" . (string) ($i * 100) . "</a></td>";
            }
        }
        
        $returnString .= "</tr>";
    }
    
    return $returnString;
}

function redirectToUrl(string $url, bool $shouldRedirect)
{
    if ($shouldRedirect)
    {
        header("Location: $url");
        exit;
    }
}

function getRandomWrongAnswer(string $file_name = "filtered_csv.csv")
{
    $readin = file($file_name);
    $random_line = (rand(0, TOTAL_CATEGORY_COUNT * 5));
    $line = str_getcsv($readin[$random_line], separator:"|", escape:"\\");
    return $line[3];
}

function is_visited()
    {
        foreach ($_SESSION["visited"] as $categoryArray)
        {
            if ($categoryArray[$_GET["cat"]])
            {
                if ($categoryArray[$_GET["cat"]][$_GET["val"]] == true)
                {
                    return true;
                }
                
                else
                {
                    return false;
                }
            }
        }
        
        return false;
    }