<?php

    require("database.php");

    $query0 = "USE athens_after_dark";
    $db->exec($query0);

    $query1 = "CREATE TABLE IF NOT EXISTS billinginfo
                (
                    billingID INT(6) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    fullName VARCHAR(55) NOT NULL,
                    email VARCHAR(55) NOT NULL UNIQUE,
                    street VARCHAR (255) NOT NULL,
                    city VARCHAR(55) NOT NULL,
                    stateID VARCHAR(20) NOT NULL,
                    zip INT(255) UNSIGNED NOT NULL
                )
                ";
    
    $db->exec($query1);

    $query2 = "CREATE TABLE IF NOT EXISTS paymentinfo
                (
                    paymentID INT(6) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    cardNum VARCHAR(55) NOT NULL,
                    cardName VARCHAR(55) NOT NULL,
                    expMon VARCHAR(55) NOT NULL,
                    expYear INT (4) UNSIGNED NOT NULL,
                    cvv INT(3) UNSIGNED NOT NULL
                )
                ";
    
    $db->exec($query2);

    $fullName = filter_input(INPUT_POST, 'name');
    $email = filter_input(INPUT_POST, 'email');
    $street = filter_input(INPUT_POST, 'address');
    $city = filter_input(INPUT_POST, 'city');
    $stateID = filter_input(INPUT_POST, 'state');
    $zip = filter_input(INPUT_POST, 'zip');

    $cardNum = filter_input(INPUT_POST, 'cardnumber');
    $cardName = filter_input(INPUT_POST, 'cardname');
    $expMon = filter_input(INPUT_POST, 'expmon');
    $expYear = filter_input(INPUT_POST, 'expyear');
    $cvv = filter_input(INPUT_POST, 'cvv');

    $query3 = "INSERT IGNORE INTO billinginfo(fullName, email, street, city, stateID, zip)
                VALUES ('$fullName', '$email', '$street', '$city', '$stateID', '$zip')";
    $db->exec($query3);

    $query4 = "INSERT INTO paymentinfo(cardNum, cardName, expMon, expYear, cvv)
                VALUES ('$cardNum', '$cardName', '$expMon', '$expYear', '$cvv')";
    $db->exec($query4);

    $clearcart = "DELETE FROM cart WHERE userID = (SELECT userID FROM userinfo WHERE active=1)";
    $db->exec($clearcart);

    include("../html/checkout-success.php")
    
?>