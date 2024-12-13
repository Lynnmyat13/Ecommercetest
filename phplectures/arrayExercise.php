<?php
$array = array("Sophia" => "31", "Jacob" => "41", "William" => "39", "Ramesh" => "40");


asort($array);
echo "Ascending order by value:\n";
foreach ($array as $x => $value) {
    echo $x . " is " . $value . "<br>";
}


ksort($array);
echo "Ascending order by key:\n";
foreach ($array as $x => $value) {
    echo $x . " is " . $value . "<br>";
}


arsort($array);
echo "Descending order by value:\n";
foreach ($array as $x => $value) {
    echo $x . " is " . $value . "<br>";
}

krsort($array);
echo "Descending order by key:\n";
foreach ($array as $x => $value) {
    echo $x . " is " . $value . "<br>";
}
