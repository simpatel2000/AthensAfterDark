<?php
  require("../php/database.php");

  $setinactive = "UPDATE userinfo
                  SET active=0;";
  $loginstatement2 = $db->prepare($setinactive);
  $loginstatement2->execute();

  include("../html/login.php");
?>