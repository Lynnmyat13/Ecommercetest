<?php
// array
//$foods = array("apple","orange","grape","mango");

// $foods[0] ="pineapple";
// array_push($foods,"coconut");  //push function
// array_pop($foods);  //pop function, to remove last element
// array_shift($foods);  //to remove first element in array
// $foods = array_reverse($foods);  //to reverse array
// echo count($foods);  //to count the number of array
// foreach ($foods as $food) {
//     echo $food ."<br>";
// }
// echo "<br>";
// echo "<br>";

// ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="arrayeg.php" method="post">
        <label>Enter a country: </label>
        <input type="text" name="country">
        <input type="submit" value="Submit">
    </form>
</body>
</html>


<?php
// associative array
// associative array = an array made of key=>value pairs

$capitals = array("USA"=>"Washington D.C","UK"=>"London","Japan"=>"Tokyo","South Korea"=>"Seoul");

$capital = $capitals[$_POST["country"]];
echo "The capital is {$capital}";

// $capitals["USA"];  // to display the capital of USA
// $capitals["China"] = "Beijing";  // to add new key and value
// $keys = array_keys($capitals);  // to display keys 
// $values = array_values($capitals);  // to display values
// $capitals = array_flip($capitals);  // to flip key and value

// foreach ($capitals as $key => $value) {
//     echo "{$key} = {$value} <br>";
// }

?>