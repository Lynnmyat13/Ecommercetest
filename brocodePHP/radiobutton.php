<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Radio Button</title>
</head>
<body>
    <form action="radiobutton.php" method="post">
        <input type="radio" name="credit_card" value="Visa">Visa<br>
        <input type="radio" name="credit_card" value="MasterCard">MasterCard<br>
        <input type="radio" name="credit_card" value="American Express">American Express<br>
        <input type="submit" name="confirm" value="confirm">
    </form>
</body>
</html>

<?php
if(isset($_POST["confirm"])){
    if(isset($_POST["credit_card"])){
        $credit_card = $_POST["credit_card"];
    }
    else{
        $credit_card = null;
    }
    switch($credit_card){
        case "Visa":
            echo "You selected Visa";
            break;
        case "MasterCard":
            echo "You selected MasterCard";
            break;
        case "American Express":
            echo "You selected American Express";
            break;
        default:
        echo "Please make a selection";
    }
    



    // if($credit_card == "Visa"){
    //     echo "You selected Visa";
    // }
    // elseif($credit_card == "MasterCard"){
    //     echo "You selected MasterCard";
    // }
    // elseif($credit_card == "American Express"){
    //     echo "You selected American Express";
    // }
    // else{
    //     echo "Please make a selection";
    // }
}
?>