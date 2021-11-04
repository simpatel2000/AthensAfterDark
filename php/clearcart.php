<?php 

    include("database.php");

    $clearcart = "DELETE FROM cart";

    $db->exec($clearcart);

    header("Location: http://localhost/CSCI4300-FinalProject/html/login.php")
?>