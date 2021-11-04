<?php 

    include_once("database.php");

    $cartcreate = "CREATE TABLE IF NOT EXISTS cart 
                    (
                        itemNum INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        productName VARCHAR(255), 
                        prodPrice DECIMAL(10,2),
                        userID INT(6) UNSIGNED
                    )
                    ";
    $db->exec($cartcreate);

?>