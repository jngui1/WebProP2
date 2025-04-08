<?php

define("TOTAL_CATEGORY_COUNT", 18688);
define("QUESTIONS_USED", 5);
define("CATEGORIES_USED", 5);
/**
 * returns 5 categories. access the question and answer pairs through their values.
 * @return list [category1 => [valueNumber => [answer => x, question => x], valueNumber => [answer => x, question => x] ...],
 *           category2 => [valueNumber => [answer => x, question => x], ... ] ...]
 */
function getRandomCategories() {
    $categories = [];
    for ($i=0; $i < CATEGORIES_USED; $i++) { 
        $categories[] = getRandomCategory();
    }
    //print_r($categories);
    return $categories;
}
    
/** 
 * @return [category => [valueNumber => [answer => x, question => x] times 5]]
 * thats 1 category, with CATEGORIES_USED amount of value arrays containing the corresponding answer and question
 * enough to fill a single column.
 */
function getRandomCategory()
{
    $file_name = "filtered_csv.csv";
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
// if (!isset($_COOKIE['CREATED_BOARD'])) {
//     $readin = create_board();
//     setcookie("CREATE_BOARD");
// }
//getRandomCategories();