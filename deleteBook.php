<?php
require_once("dbconnect.php");
if(!isset($_SESSION)) {
    session_start(); // to create success if not exist
}

if(isset($_GET['id'])){
    $book_id = $_GET['id'];
    $sql = "delete from book where bookId=?";
    $stmt = $connection->prepare($sql); 
    $status = $stmt->execute([$book_id]);

    if($status){
        $_SESSION['deleteSuccess'] = "Book with $book_id has been deleted.";
        header("Location:viewBook.php");
    }
}