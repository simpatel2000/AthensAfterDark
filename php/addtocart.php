<?php 

    include_once("database.php");
    include_once("cartinit.php");

    $productname = filter_input(INPUT_POST, 'pname');
    $productprice = filter_input(INPUT_POST, 'pprice');

    $addtocartq = "INSERT INTO cart
                    (productName, prodPrice)
                    VALUES
                    ('$productname', '$productprice')
                    ";
    $db->exec($addtocartq);

    $activecart = "UPDATE cart
                    SET userID = (SELECT userID FROM userinfo WHERE active=1)
                    WHERE itemNum= (SELECT MAX(itemNum) FROM cart)";
    $db->exec($activecart);

    header("Location: http://localhost/CSCI4300-FinalProject/html/header.php");
    //include_once("../html/header.php");

?>