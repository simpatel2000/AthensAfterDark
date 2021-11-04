<?php

    $queryprods = "SELECT * FROM productlist ORDER BY restID";

    $pstates = $db->prepare($queryprods);
    $pstates->execute();
    $products = $pstates->fetchAll();
    $pstates->closeCursor();

?>