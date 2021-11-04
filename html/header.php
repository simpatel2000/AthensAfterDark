<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Bulldawg Eats </title>
    <link rel="shortcut icon" href="../logos/BE.ico">
    <link rel="stylesheet" href="../css/header.css">
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
            <input type="search" id="search-bar" name="searchTerm" placeholder="What are you craving?">
        </form>
        <input type="button" id="shopping-cart" onclick="window.location.href='../html/cart.php'">
	</header>
    <?php include("restaurantlist.php");?>
</body>
</html>