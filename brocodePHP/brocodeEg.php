<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action = "brocodeEg.php" method="post">
        <label>x: </label>
        <input type="text" name="x"><br>
        <label>y: </label>
        <input type="text" name="y"><br><br>
        <input type="submit" value="total">
    </form>
</body>
</html>
<?php
    $x = $_POST["x"];
    $y = $_POST["y"];
    $total = null;
    // $total = abs($x);
    // $total = round($x);
    // $total = floor($x);
    // $total = ceil($x);
    // $total = sqrt($x);    //square root function
    $total = pow($x,$y);  //power function
    // $total = max($x,$y);  //maximum function
    // $total = min($x,$y);  //minimum function
    // $total = pi();
    // $total = rand(1,6);   //random number between 1 and 6
    echo $total;
?>