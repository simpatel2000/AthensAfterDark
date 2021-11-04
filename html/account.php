<?php
    require('../php/database.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Bulldawg Eats </title>
    <link rel="shortcut icon" href="../logos/BE.ico">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/account.css">
    <link rel="stylesheet" href="../css/style.css">
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
        <input type="button" id="shopping-cart" onclick="window.location.href='./cart.php'">
	</header>

	<main>
		<form id="reset-pw-form" action="resetpassword.php" method="POST">
			<span class="form-header"> Reset Password </span>
			<!-- <span class="profile-link"><a href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer"> Link Facebook </a></span>
            <span class="profile-link"><a href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer"> Link Instagram </a></span> -->
            <fieldset id="reset-password">
                <div id="left-side-form">
                    <label for="old-password"> Old Password </label><br>
                        <input type="text" id="old-password" name="old_password" required><br>
                    <label for="new-password"> New Password </label><br>
                        <input type="text" id="new-password" name="new_password" required><br>
                    <label for="confirm-new-pw"> Confirm New Password </label><br>
                        <input type="text" id="confirm-new-pw" name="confirm_new_pw" required><br>
                    <input type="submit" name="submit" id="change-button" value="Change my password"><br>
                </div>

                <div id="right-side-guidance">
                    <p> We recommend choosing a password that: </p>
                    <ul>
                        <li> Is not being used by you already for another account / login </li>
                        <li> Is at least 8 characters in length </li>
                    </ul>
                </div>
            </fieldset>
		</form>
	</main>
</body>
</html>