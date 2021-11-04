<?php 
  require("../php/database.php");

  $oldpass = filter_input(INPUT_POST, 'old_password');

  $changequery = "SELECT pass FROM userinfo
                    WHERE active = 1
                    AND pass = :pass_word
                    ";
  $changestatement = $db->prepare($changequery);
  $changestatement->bindValue(':pass_word', $oldpass);
  $changestatement->execute();
  $rowcount = $changestatement->rowCount();

  if ($rowcount == 1) {
    $pass = filter_input(INPUT_POST, 'new_password');
    $changepass = "UPDATE userinfo
                    SET pass = '$pass' WHERE active=1";
    $db->exec($changepass);
    echo "<h1> Password Successfully Reset! </h1>";
  } else {
    echo "<h5> Wrong Password Entered! <h5>";
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/main.js"></script>
    <style>
      h1{text-align: center; margin-top: 8em; font-size: 250%;}
      h5{text-align: center; margin-top: 8em; font-size: 250%;}
      #b{margin: 0; position: absolute; top: 50%; left: 49%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);}
      #c{margin: 0; position: absolute; top: 50%; left: 45%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);}
    </style>
    <title>Refer a Friend</title>
    </head>
    <body>
        <input type="button" id="b" class="btn" onclick="window.location.href='../html/header.php';" value="Back to Home">
    </body>
</html>