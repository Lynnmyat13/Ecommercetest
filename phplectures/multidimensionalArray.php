<?php
$multiD = array(
    "fruits" => array("myfavorite" => "orange", "yuck" => "banana", "yum" => "apple"),
    "numbers" => array(1, 4, 5, 6, 8),
    "holes" => array("first", 5 => "second", "third"),

);
echo $multiD["fruits"]["myfavorite"] . "<br>";
echo $multiD["holes"][6] . "<br>";
echo $multiD["fruits"]["yuck"] . "<br>";
echo $multiD["fruits"]["yum"] . "<br>";
echo $multiD["numbers"][3] . "<br>";
echo $multiD["holes"][5] . "<br>";
print_r($multiD);
echo "<br>";
var_dump($multiD);
