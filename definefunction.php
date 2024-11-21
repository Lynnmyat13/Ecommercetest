<?php
function writeMyName(){
    echo"Hello Rein John";
}
writeMyName();
echo "<br>";

function hello( $name ) {
    echo $name;
}
hello("Myo Aung");
echo "<br>";

function add($a, $b) {
    $total= $a + $b;
    return $total;
}
$a=7;
$b= 8;
echo "The sum of {$a} and {$b} is: ".add($a,$b);
echo "<br>";

$x=5; 
function myTest($y){
    
    echo ++$y."<br>";
}
myTest($x);
myTest($x);
echo "<br>";


$x=5;
$y=10;
function test2(){
    global $x,$y;
    $y=$x+$y;
}
test2();
echo $y;
echo "<br>";

//using globals
$x=12;
$y=31;
function test3(){
    $GLOBALS['y']=$GLOBALS['x']+$GLOBALS['y'];
}
test3();
echo $y;
echo "<br>";

//using static
function callstatic(){
    static $x=4; 
    echo $x;
    $x++;
}
callstatic();
callstatic();
callstatic();
echo "<br>";

$numX = 1;
function byvalue ($numX){
    $numX = $numX + 1;
    return $numX;
}
echo "The change after send data by value = ". byvalue ($numX)."<br />";
echo "The change after send data by value = ". $numX ."<br />";

//function returning values
function fruit($type = "cherry"){
    return "Fruit you like is $type.";
}
echo fruit()."<br>"; 
echo fruit("Strawberry");

?>