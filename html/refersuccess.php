<?php 
  require("../php/database.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/main.js"></script>
    <style>
      h1{text-align: center; margin-top: 8em; font-size: 250%;}
      #b{margin: 0; position: absolute; top: 50%; left: 55%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);}
      #c{margin: 0; position: absolute; top: 50%; left: 45%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);}
    </style>
    <title>Refer a Friend</title>
    </head>
    <body>
        <h1> Thanks for Referring a Friend! </h1>
        <input type="button" id="b" class="btn" onclick="window.location.href='../html/header.php';" value="Start an Order">
        <input type="button" id="c" class="btn" onclick="window.location.href='../html/refer.html';" value="Refer Another Friend">
    </body>
</html>