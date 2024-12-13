<?php
$people = array("Peter", "Joe", "Glenn", "Cleveland");

echo current($people) . "<br>";
echo next($people) . "<br>";
echo reset($people) . "<br>";
echo "using asort<br>";
asort($people) . "<br>";
foreach ($people as $x => $value) {
    echo $x . " is " . $value . "<br>";
}
echo "................<br>";
echo "using arsort<br>";
arsort($people) . "<br>";
foreach ($people as $x => $value) {
    echo $x . " is " . $value . "<br>";
}
echo "................<br>";
echo "using ksort<br>";
ksort($people) . "<br>";
foreach ($people as $x => $value) {
    echo $x . " is " . $value . "<br>";
}
echo "................<br>";
echo "using krsort<br>";
krsort($people) . "<br>";
foreach ($people as $x => $value) {
    echo $x . " is " . $value . "<br>";
}
echo "................<br>";
echo "using sort<br>";
sort($people) . "<br>";
foreach ($people as $x => $value) {
    echo $x . " is " . $value . "<br>";
}
echo "................<br>";
echo "using rsort<br>";
rsort($people) . "<br>";
foreach ($people as $x => $value) {
    echo $x . " is " . $value . "<br>";
}
echo "................<br>";
echo "using uasort<br>";
function my_sort($a, $b)
{
    if ($a == $b) return 0;
    return ($a < $b) ? -1 : 1;
}
$arr = array("a" => 4, "b" => 2, "c" => 8, "d" => 6);
uasort($arr, "my_sort");

foreach ($arr as $key => $value) {
    echo "[" . $key . "] => " . $value;
    echo "<br>";
}
echo "................<br>";
echo "using uasort<br>";
uksort($arr, "my_sort");

foreach ($arr as $key => $value) {
    echo "[" . $key . "] => " . $value;
    echo "<br>";
}
echo "................<br>";
echo "using uasort<br>";
usort($arr, "my_sort");

foreach ($arr as $key => $value) {
    echo "[" . $key . "] => " . $value;
    echo "<br>";
}
echo "................<br>";
$a = array("fruits" => "orange", "juiice" => "lemon", "snack" => "burger");
print_r(array_keys($a));

echo "<br>................<br>";
$a1 = array(1, 4, 5, 8);
$b1 = array("one", "two", "three");
print_r(array_merge($a1, $b1));

echo "<br>................<br>";
$a3 = array("a" => "one", "b" => "two", "c" => "three");
$a4 = array("c" => "four", "d" => "five", "e" => "six");
print_r(array_merge($a3, $a4));

echo "<br>................<br>";
$arr1 = array(5 => 1, 12 => 2);
foreach ($arr1 as $key => $value) {
    echo "$key=>$value ";
}
$arr1[] = 56;
$arr1["x"] = 42;
unset($arr1[5]);
unset($arr1);
$a5 = array(1 => 'one', 2 => 'two', 3 => 'three');
unset($a5[2]);
echo "<br>................<br>";
$b2 = array_values($a5);
foreach ($b2 as $x => $value) {
    echo $x . " is " . $value . "<br>";
}

echo "<br>................<br>";
function printRow($value, $key)
{
    printf("<table style='border: 2px solid black'>
    <tr>
    <td style='width:100px'>$key</td>
    <td style='width:100px'>$value</td>
    </tr>
    </table>\n");
}
$color = array("Red" => "#FF0000", "Green" => "#00FF00", "Blue" => "#0000FF", "Yellow" => "#FFFF00");
array_walk($color, "printRow");
