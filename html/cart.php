<?php
    require("../php/database.php");
    include("../php/getcart.php");

    $subtotal = 0;
    $taxamt = 0;
    $shipping = 5.00;
    $total = 0; 
    $count = 0;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">

        <link rel="stylesheet" href="../css/header.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="shortcut icon" href="../logos/BE.ico">
        <script src="../js/cart.js"></script>
        <title>Shopping Cart</title>

        <style>

            body {
                margin-left: 50px;
                margin-top: 100px;
            }

            .outer-container {
                display: flex;  
                flex-direction: row;
            }

            .shopping-cart {
                display: grid;
                align-items: left;
                margin: 10px;
                width: 70%;
                border: 1px solid lightgrey;
            }

            .product {
                padding: 15px;
                margin: 10px;
                box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
            }

            .cost-checkout {
                align-items: right;
                width: 20%;
                margin-top: 20px;
                margin-bottom: 20px;
                border: 1px solid lightgrey;
                padding: 10px;
            }

            .num {
                font-weight: bold;
            }

            h1 {
                margin-left: 18px;
                color: #da0000;
            }

            button {
                margin-left: 4px;
                margin-top: 15px;
            }

            button.continue-shopping{
                background: #575757;
            }
            button.continue-shopping:hover{
                background: #3d3d3d;
            }

            input.small-btn{
                background-color: #575757;
                border: none;
                color: #f1f1f1;
                padding: 10px 15px;
                font-size: 12px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                border: none;
                border-radius: 5px;
            }
            input.small-btn:hover{
                background: #3d3d3d;
            }
            .product-title {
                font-weight: bold;
            }

            input.coupon,textarea.coupon {
            width: 70%;
            padding: 0.9em;
            margin-top: 2em;
            margin-bottom: .5em;
            background-color: rgb(240, 239, 239);
            border: none;
            border-radius: 5px;
            }

        </style>

        <script src="./js/main.js">
            
        </script>
    </head>
    <body onload = "stylePage();">
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

        <main>
            <h1>Shopping Cart</h1>

            <div class="outer-container">

                <div class="shopping-cart">
                    <?php foreach ($carts as $cart) : ?>
                        <div class="product">
                            <div class="product-title"><?php echo $cart['productName']; ?></div>
                            <div class="product-price"><?php echo $cart['prodPrice']; ?></div>
                            <div class="product-removal">
                                <form action="../php/removefromcart.php" method="post">
                                    <input type="hidden" name="remove-item" 
                                            value=<?php echo $cart['itemNum']?>>
                                    <input type="submit" value="Remove" class="small-btn">
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div> <!-- products -->

                <div class="cost-checkout">

                    <div class="totals">
                        <div class="item">
                            <label>Subtotal</label>
                            <?php 
                                foreach($carts as $cart) {
                                    $subtotal += $cart['prodPrice'];
                                }
                            ?>
                            <div class="num" id="cart-subtotal"><?php echo number_format(floor($subtotal*100)/100,2, '.', ''); ?></div>
                        </div>
                        <div class="item">
                            <label>Tax (4%)</label>
                            <?php 
                                $taxamt = $subtotal * 0.04;
                            ?>
                            <div class="num" id="cart-tax"><?php echo number_format(floor($taxamt*100)/100,2, '.', ''); ?></div></div>
                        </div>
                        <div class="item">
                            <label>Shipping</label>
                            <div class="num" id="cart-shipping">
                                <?php echo number_format(floor($shipping*100)/100,2, '.', ''); ?>
                            </div>
                        </div>
                        <div class="grand-total">
                            <label>Grand Total</label>
                            <?php 
                                $total = $subtotal + $taxamt + $shipping;
                            ?>
                            <div class="num" id="cart-total"><?php echo number_format(floor($total*100)/100,2, '.', ''); ?></div>
                            <button class="checkout" onclick="window.location.href='./checkout.php'">Checkout</button>
                            <button class="continue-shopping" onclick="window.location.href='./header.php'">Add Items</button>
                        </div>
                        <form action="../php/coupon.php" method="POST" onsubmit="return applyCoupon();">
                            <br>
                            <p>Enter Coupon Code Below:<p>
                            <p id="couponValidity"> Coupon code is invalid</p>
                            <input class = "coupon" type="text" name="coupon" id="coupon"><br>
                            <input class = "coupon" type="hidden" name="shipping" id="shipping" value = "<?php echo $shipping?>">
                            <input class= "btn" type="submit" id = "button" value="Apply">
                        <form>
                    </div>
                </div> <!-- checkout button and totals -->
            </div> <!-- outer container -->
        </main>
    </body>
</html>