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
      #b{margin: 0; position: absolute; top: 50%; left: 50%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);}
    </style>
    <title>Login Success</title>
    </head>
    <body>
        <h1> Login Success! Let's Start an Order. </h1>
        <input type="button" id="b" class="btn" onclick="window.location.href='../html/header.php';" value="Start Your Order">
    </body>
</html>