<?php 

    require_once("database.php");
    
    $item = $_POST['remove-item'];
    $removecart = "DELETE FROM cart WHERE itemNum='$item'";
    $db->exec($removecart);

    header("Location: http://localhost/CSCI4300-FinalProject/html/cart.php");

?>