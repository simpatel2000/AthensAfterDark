<?php

    require("database.php");

    $query0 = "USE athens_after_dark";
    $db->exec($query0);

    $query1 = "CREATE TABLE IF NOT EXISTS userinfo
                (
                    userID INT(6) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    email VARCHAR(55) NOT NULL,
                    pass VARCHAR(55) NOT NULL,
                    street VARCHAR (255) NOT NULL,
                    city VARCHAR(55) NOT NULL,
                    stateID VARCHAR(20) NOT NULL,
                    zip INT(255) UNSIGNED NOT NULL,
                    active BOOLEAN NOT NULL
                )
                ";
    
    $db->exec($query1);

    $email = filter_input(INPUT_POST, 'cEmail');
    $pword = filter_input(INPUT_POST, 'cPass');
    $streetadd = filter_input(INPUT_POST, 'streets');
    $city = filter_input(INPUT_POST, 'cities');
    $state = filter_input(INPUT_POST, 'st');
    $zipcode = filter_input(INPUT_POST, 'zip');
    $active = 0;

    $querycheck = "SELECT * FROM userinfo WHERE email = :Email";
    $emailcheckstatement = $db->prepare($querycheck);
    $emailcheckstatement->bindValue(':Email', $email);
    $emailcheckstatement->execute();
    $already = $emailcheckstatement->rowCount();
    $emailcheckstatement->closeCursor(); 

    if ($already != 0) {
        include("../html/login.php");
        echo "<h5>An account with this email already exist<h5>";
        exit();
    }

    $query2 = "INSERT INTO userinfo
                    (email, pass, street, city, stateID, zip, active)
                VALUE
                    (:e_mail, :p_word, :street_add, :cty, :state_id, :zip_code, :active)
                ";
    $insertinfo = $db->prepare($query2);
    $insertinfo->bindValue(':e_mail', $email);
    $insertinfo->bindValue(':p_word', $pword);
    $insertinfo->bindValue(':street_add', $streetadd);
    $insertinfo->bindValue(':cty', $city);
    $insertinfo->bindValue(':state_id', $state);
    $insertinfo->bindValue(':zip_code', $zipcode);
    $insertinfo->bindValue(':active', $active);
    $insertinfo->execute();
    $insertinfo->closeCursor();

    include("../html/login.php")
    
?>