<?php
echo'Today \'s the day ';
echo"Today 's the day <br>";
echo "Bro\nCode <br>";
$i = 0;
$array[$i] = "Ha Ha";
echo"hello! the result is $array[$i]  <br>";
echo <<<THE_END
PHP stands for "PHP: Hypertext Proprocessor"
The acronym "PHP" is therefore, usually referred to as a recursive acronym because the long form contains the acronym itself. <br>
As this text is being written in a here-doc there is no need to escape the double quotes. <br><br>
THE_END;

$name = "Max";
$str = <<<DEMO
Hello $name!<br>
This is a demo message with heredoc. <br><br>
DEMO;
echo $str;

// $str = "A";
// $str{2} = "d";
// $str{1} = "n";
// $str = $str. "i"; 
// print $str;

$number = "John";
print $number;
$$number = "Hello";
print $John;

$num1 = 2;
echo $num1++. "<br><br>";

$a = (True or True);
$b = (True or False);
$c = (False or True);
$d = (False or False);
var_dump($a, $b, $c, $d);
echo "<br><br>";

echo 'a'<'b';
echo "<br>";
echo 'a is:', ord('a')."<br>";
echo 'b is:', ord('b');
// ord is used to return ASCII value of a character.
echo "<br><br>";


$investment = 30;
if(empty($investment)){
    $message = 'Investment is required field.';
}
else if(!is_numeric($investment)){
    $message = 'Investment must be a valid number.';
}
else if($investment <= 0){
    $message = 'Investment must be greater than zero';
}
else{
    $message = 'Investment is valid!';
}
echo $message;
echo "<br><br>";

//Comparison and Conditional Operator
$BlackjackPlayer1 = 20;
$BlackjackPlayer1 <= 21?
$Result = "Player 1 is still in the game": 
$Result = "Player 1 is out of the action";
echo "<p>", $Result, "</p";
echo "<br><br>";
echo "<br><br>";

//Switch Case
$product_name = "Processors";
switch ($product_name){
    case "Video Cards":
        echo "Video cards range from $50 to $500";
        break;
    case "Processors":
        echo "Processors range from $100 to $1000";
        break;
    default: 
        echo "Sorry, we don't carry $product_name in our catalog";
        break;
}
echo "<br><br>";


//Decision Loops
//while loop
$count = 1;
while($count <= 5){
    echo "$count <br>";
    ++ $count;
}
echo "<p>You have printed 5 numbers.</p>";
echo "<br><br>";

//do while loop
$DaysOfWeek = array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");
$count = 0;
do{
    echo $DaysOfWeek[$count], "<br>";
    ++ $count;
}while ($count < 7);
echo "<br><br>";

for($i = 1; $i <=10; $i++){
    echo $i . "<br>";
}
?>