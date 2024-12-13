<?php
$Celsius = 0;
while( $Celsius <= 100){
    $Fehrenheit = ($Celsius * 9/5) +32;
    // echo "Celsius: {$Celsius}°C " . " Fehrenheit: " .round($Fehrenheit). "°F <br>";
    echo "<table width=100%><tr><td width=200px>Celsius: {$Celsius}°C</td><td>Fehrenheit: " .round($Fehrenheit). "°F</td></tr></table>";
    $Celsius++;
}
?>