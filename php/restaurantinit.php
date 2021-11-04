<?php

    include("database.php");

    $restcreate = "CREATE TABLE IF NOT EXISTS restaurantlist
                        (
                        restaurantID INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                        restaurantName VARCHAR(255) NOT NULL UNIQUE,
                        restaurantLocation VARCHAR(255) NOT NULL,
                        foodType VARCHAR(255) NOT NULL,
                        rating INT(6) NOT NULL,
                        price INT(6) NOT NULL
                        )
                    ";

    $db->exec($restcreate);

    $initlist = "INSERT IGNORE INTO restaurantlist
                    (restaurantName, restaurantLocation, foodType, rating, price)
                VALUES 
                    ('Little Italy', '33.9576506872989, -83.37718740161962', 'Pizza', 4, 1),
                    ('D.P. Dough', '33.95728261319902, -83.37794804491328', 'Pizza', 4, 1),
                    ('Shokitini', '33.95743521441173, -83.37937638587184', 'Japanese', 5, 2),
                    ('Insomnia Cookies', '33.95844548331415, -83.37508031650792', 'Cookies', 4, 2),
                    ('Fuzzys Taco Shop', '33.9587323795719, -83.37750720448342', 'Tex-Mex', 3, 1)
                ";
    
    $db->exec($initlist);

?>