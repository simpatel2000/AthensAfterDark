<?php

    $queryRestaurants = "SELECT * FROM restaurantlist ORDER BY restaurantID";

    $namestatement = $db->prepare($queryRestaurants);
    $namestatement->execute();
    $restaurants = $namestatement->fetchAll();
    $numRow = $namestatement->rowCount();
    $namestatement->closeCursor();

?>