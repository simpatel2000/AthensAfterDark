<?php

    $querycart = "SELECT * FROM cart WHERE userID = (SELECT userID FROM userinfo WHERE active=1) ORDER BY itemNum";

    $cstates = $db->prepare($querycart);
    $cstates->execute();
    $carts = $cstates->fetchAll();
    $cstates->closeCursor();

?>