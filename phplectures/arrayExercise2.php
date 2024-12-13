<?php
$x = array(1, 2, 3, 4, 5);
unset($x[4]);
var_dump(array_keys($x));
echo "<br><br>";

$arr = array(1, 2, 3, 4, 5);
echo "Original array: ";
foreach ($arr as $key => $value) {
    echo $value . "\n";
}
echo "<br>";
array_splice($arr, 3, 0, '$');
echo "After inserting '$' array: ";
foreach ($arr as $key => $value) {
    echo $value . "\n";
}
echo "<br><br>";

$strings = ["abcd", "abc", "de", "hjjj", "g", "wer"];

$shortest = strlen($strings[0]);
$longest = strlen($strings[0]);

foreach ($strings as $string) {
    $length = strlen($string);
    if ($length < $shortest) {
        $shortest = $length;
    }
    if ($length > $longest) {
        $longest = $length;
    }
}

echo "The shortest array length is $shortest.\n";
echo "<br>";
echo "The longest array length is $longest.\n";

echo "<br><br>";
$names = array("John", "Jerry", "Ann", "Sanji", "Wen", "Paul", "Louise", "Peter");
echo $names[1];
echo "<br>";
$total = count($names);
echo "Total number of values in array: $total";
echo "<br>";
echo array_search("Ann", $names);
echo "<br>";
krsort($names);
foreach ($names as $x => $value) {
    echo $x . " is " . $value . "<br>";
}
