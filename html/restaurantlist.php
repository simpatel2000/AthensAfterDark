<?php

    include("../php/restaurantinit.php");
    include("../php/getrestaurants.php");
    include("../php/productinit.php");
    include("../php/getproducts.php");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/style.css">
    <title>Restaurant List</title>
    <script src="../js/main.js"></script>
    
    <script>
      var bigcount = 0; 
      function hideRestaurants(ind) {
        var allr = document.getElementsByClassName("restaurantdiv");
        for (var i = 0; i < allr.length; i++) {
          allr[i].style.display = 'none';
        }

        var allr = document.getElementsByClassName("menudiv");
        for (var i = 0; i < allr.length; i++) {
          allr[i].style.display = 'none';
        }

        var str = "menu" + ind.toString();
        document.getElementById(str).style.display = 'block';
      }

      function showRestaurants() {
        var allr = document.getElementsByClassName("restaurantdiv");
        for (var i = 0; i < allr.length; i++) {
          allr[i].style.display = 'flex';
        }
        var allr = document.getElementsByClassName("menudiv");
        for (var i = 0; i < allr.length; i++) {
          allr[i].style.display = 'none';
        }
      }

      

      function initMap() {
        const athens = { lat: 33.958326363480275, lng: -83.37654242370961 };
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 16,
          center: athens,
        });

        var counter = 0; 
        var num = "<?php echo $numRow; ?>";
        
        var stringloc = "<?php 

            foreach ($restaurants as $restaurant) {
              echo $restaurant['restaurantLocation'], ' ';
            }

        ?>"

        var scords = stringloc.split(" ");
        for(i = 0; i < scords.length; i++){
          document.write(scords[i], "<br>");
        }
        
        var off1 = 0;
        var off2 = 1;
        var lati = parseFloat(scords[off1]);
        var longi = parseFloat(scords[off2]);

        var marknames = "<?php 

            foreach ($restaurants as $restaurant) {
              echo $restaurant['restaurantName'], '$';
            }

        ?>"

        var labelind = 0;
        
        var marklabs = marknames.split("$");
        var markerlabel = marklabs[labelind];
        
        while (counter < num) {

          const infowindow = new google.maps.InfoWindow({
            content: markerlabel,
          });

          const r1 = {lat: lati , lng: longi };
          const marker1 = new google.maps.Marker({
            position: r1, 
            map: map,
            
          });

          

          marker1.addListener("click", () => {
            infowindow.open(map, marker1);
          });

          counter++;
          document.write(counter);

          off1 = off1 + 2;
          off2 = off2 + 2;

          labelind++;
          markerlabel = marklabs[labelind];
          lati = parseFloat(scords[off1]);
          longi = parseFloat(scords[off2]);
        } 
      }

    </script>
    <style type="text/css">

      body {
        margin-top: 150px;
      }

      #restaurantlist {
        display: flex;
        float: left;
        flex-direction: column;
        width: 50%;
        text-align: center;
        align-items: center;
      }

      .restaurantdiv {
        float: left;
        display: flex;
        flex-direction: column;
        width:50%;
        text-align: center;
        justify-content: center;
        align-items: center;
        margin: 10px;
        box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
        padding: 10px;
        border: 1px solid lightgrey;
      }

      .innerdiv {       
        display: flex;
        width: 80%;
        text-align: center;
        justify-content: center;
      }

      .innerdiv h3 {
        margin: auto;
        text-align: center;
      }

      #map {
        position: absolute;
        display: flex;
        float: right;
        height: 400px;
        width: 40%;
        margin-left: 50%;
      }

      .menuitems form {
        display: flex;
      }

      .menuitems {
        margin: 8px;
      }

      .menudiv {
        box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
        padding: 10px;
        border: 1px solid lightgrey;
      }

      .menudiv h2 {
        margin-bottom: 10px;
      }

      h2 {
        color: #da0000;
        margin-bottom: 8px;
      }

      .smallbtn {
        background: #da0000;
        border: none;
        color: #f1f1f1;
        padding: 5px 10px;
        font-size: 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
      }

      .smallbtn:hover {
	      background: #af0000;
      }

      .list-svg {
        width: 25%;
        margin-bottom: 10px;
      }

    </style>
  </head>
<body>
  <div id="restaurantlist">
    <h1 onclick="showRestaurants();">Restaurants</h1><br>

    <?php $count = 0; ?>
    <?php foreach ($restaurants as $restaurant) : ?>
    <div class="restaurantdiv">
      
      <h2 onclick="hideRestaurants(<?php echo $count; ?>);"><?php echo $restaurant['restaurantName']; ?></h2>
      <div class="innerdiv">
      <h3><?php echo $restaurant['foodType']; ?></h3>
      <h3>Rating: <?php echo $restaurant['rating']; ?></h3>
      <h3>Price <?php echo $restaurant['price']; ?></h3>
      <p id="loc<?php echo $count ?>" hidden>menu<?php echo $count; ?></p>
      
      </div>
    </div>

    <div id="menu<?php echo $count ?>" class="menudiv" style="display:none">
        <h2><?php echo $restaurant['restaurantName']?> Menu</h2>

        <?php foreach ($products as $product) : ?>
          <div class="menuitems">
                       
            <?php 
              if ($count == $product['restID'] - 1) {
                  echo '<form action="../php/addtocart.php" method="POST">';
                  echo $product['prodName'];
                  $hold = $product['prodName'];
                  $out = '\'';
                  $hold = $out.$hold.$out;
                  $in11 = '<input type="hidden" name="pname" value='; 
                  $in12 = ' >';
                  $in1 = $in11.$hold.$in12;
                  echo $in1;

                  $in13 = '  ';
                  echo $in13;
                  echo $product['price'];
                  $hold2 = $product['price'];
                  
                  $in21 = '<input type="hidden" name="pprice" value="'; 
                  $in22 = '">';
                  $in2 = $in21.$hold2.$in22;
                  echo $in2;

                  echo '<input type=submit value="Add to Cart" class="smallbtn">';
                  echo '</form>';
              }
              ?>

          </div>

        <?php endforeach; ?>

        <input type="button" value="Back" onclick="showRestaurants();" class="btn">

    </div>
      
    <?php $count++; ?>

    <?php endforeach; ?>

  </div>

  <img src="../images/food-plate.svg" alt="List" class="list-svg">

  <div id="map">
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC97ie-69DNX41KHmLYQoNvVame7nWIckE&callback=initMap&libraries=&v=weekly"
      async
    ></script>
  </div>
</body>
</html>
