<?php
$address["name"] = "Peter";
$address["occupation"] = "Actor";
$address["age"] = 30;
echo $address["name"] . " is " . $address["age"] . " years old.<br>";

$address = array("id => 1", "name => Peter", "age => 30");
foreach ($address as $key => $value) {
    echo "<b>$key:</b> $value<br>";
}
?>
