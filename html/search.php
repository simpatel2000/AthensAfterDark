<?php
    require("../php/database.php");
    include("../php/productinit.php");
    include("../php/getproducts.php");

    $searchTerm = filter_input(INPUT_GET, 'searchTerm');

    $querySearch = "SELECT DISTINCT *
                    FROM restaurantlist 
                    INNER JOIN productlist
                        ON restaurantlist.restaurantID = productlist.restID
                    WHERE restaurantName LIKE '%".$searchTerm."%' 
                    OR foodType LIKE '%".$searchTerm."%'
                    OR prodName LIKE '%".$searchTerm."%'
                    GROUP BY restaurantName
                    ";
    $results = $db->query($querySearch);
    $rowCount = $results->rowCount();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Bulldawg Eats </title>
    <link rel="shortcut icon" href="../logos/BE.ico">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/style.css">
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
    </script>

    <style>
        body {
            margin-top: 7em;
        }
        header {
            padding-bottom: 1.1em;
        }
        #nav-menu button {
            padding-top: 0.9em;					
        }
        #main-logo {
            padding-bottom: 0.5em;
        }
        #shopping-cart {
            padding: 0.9em;
        }

        #left-side-search {
            display: flex;
            float: left;
            margin-left: 80px;
            margin-top: 20px;
            width: 20%;
        }

        #restaurantlist {
            display: flex;
            float: right;
            flex-direction: column;
            width: 70%;
            text-align: center;
            align-items: center;
            margin-left: 70px;
        }
        #restaurantlist h2 {
            color: #da0000;
            margin-bottom: 8px;
        }
        .restaurantdiv {
            float: right;
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
    </style>
</head>

<body>
    <header> 
        <div id="nav-menu">
            <ul class="one">
                <li><button><img src="../logos/Hamburger-Button.png" alt="No image" height="30"></button>
                    <ul class="two"> 
                        <li><a href="./header.php"> Home </a></li>
                        <li><a href="./account.php"> Account Settings </a></li>
                        <li><a href="./refer.html"> Refer a Friend </a></li>
                        <li><a href="./coupon.html"> Coupons </a></li>
                        <li><a href="./application.html"> Careers </a></li>
                        <li><a href="./logout.php"> Logout </a></li>
                    </ul>
                </li>
            </ul>
        </div>

		<a href="./header.php"><img src="../logos/logo.png" alt="No image" height="65" id="main-logo"></a>
        <form id="search-form" action="search.php" method="GET">
            <input type="search" id="search-bar" name="searchTerm" value="<?php echo $searchTerm; ?>">
        </form>
        <input type="button" id="shopping-cart" onclick="window.location.href='../html/cart.php'">
	</header>

    <main>
        <div id="left-side-search">
            <h2> "<?php echo $searchTerm; ?>" </h2>
        </div>

        <div id="restaurantlist">
            <?php if ($rowCount == 0) {
                    echo '<h2> No Results </h2>';
                } else {
                    echo '<h1 onclick="showRestaurants();">Results</h1><br>';
                }
            ?>
            <?php $count = 0; ?>
            <?php foreach ($results as $result) : ?>
            <div class="restaurantdiv">
                <h2 onclick="hideRestaurants(<?php echo $count; ?>);"><?php echo $result['restaurantName']; ?></h2>
                <div class="innerdiv">
                    <h3><?php echo $result['foodType']; ?></h3>
                    <h3>Rating: <?php echo $result['rating']; ?></h3>
                    
                    <p id="loc<?php echo $count ?>" hidden>menu<?php echo $count; ?></p>
                </div>
            </div>

            <div id="menu<?php echo $count ?>" class="menudiv" style="display:none">
                <h2><?php echo $result['restaurantName']?> Menu</h2>
                <?php foreach ($products as $product) : ?>
                <div class="menuitems">       
                    <?php 
                        if ($result['restaurantID'] == $product['restID']) {
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
    </main>
</body>
</html>