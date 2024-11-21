<?php
$Fehrenheit = 0;
$Celsius = ($Fehrenheit - 32) * 5/9;
for ($Fehrenheit = 0; $Fehrenheit <=100; $Fehrenheit++ ){
    $Celsius = ($Fehrenheit - 32) * 5/9;
    // echo "Fehrenheit: {$Fehrenheit} ", "Celsius:" .round($Celsius) ."<br>";
    echo "<table width=100%><tr><td width=200px>Fehrenheit: {$Fehrenheit}°F</td><td>Celsius: " .round($Celsius). "°C</td></tr></table>";
}
?>