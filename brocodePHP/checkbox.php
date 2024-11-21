<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CheckBox</title>
</head>
<body>
<form action="checkbox.php" method="post">
        <input type="checkbox" name="pizza" value="Pizza">Pizza<br>
        <input type="checkbox" name="burger" value="Burger">Burger<br>
        <input type="checkbox" name="hotdog" value="Hotdog">Hotdog<br>
        <input type="submit" name="confirm" value="confirm">
    </form>
</body>
</html>

<?php
if(isset($_POST["confirm"])){
    if(isset($_POST["pizza"])){
        echo "You like pizza. <br>";
    }
    if(isset($_POST["burger"])){
        echo "You like burger. <br>";
    }
    if(isset($_POST["hotdog"])){
        echo "You like hotdog.";
    }
    if(empty($_POST["pizza"])){
        echo "You don't like pizza. <br>";
    }
    if(empty($_POST["burger"])){
        echo "You don't like burger. <br>";
    }
    if(empty($_POST["hotdog"])){
        echo "You don't like hotdog.";
    }
}

?>