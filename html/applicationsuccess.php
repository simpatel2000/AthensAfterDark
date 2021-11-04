<?php 
  require("../php/database.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/style.css">
    <script src="./js/main.js"></script>
    <style>
      h1{text-align: center; margin-top: 8em; font-size: 250%;}
      h2{text-align: center; font-size: 200%;}
      #b{margin: 0; position: absolute; top: 50%; left: 50%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);}
    </style>
    <title>Application Sent!</title>
    </head>
    <body>
        <h1> Thanks for applying to be on our team! </h1>
        <h2> We'll be in touch with you soon. </h2>
        <input type="button" id="b" class="btn" onclick="window.location.href='./header.php';" value="Start an Order">
    </body>
</html>