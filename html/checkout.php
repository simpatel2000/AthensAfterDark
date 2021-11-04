<?php 
  require("../php/database.php");
  include("../php/getcart.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="shortcut icon" href="../logos/BE.ico">
    <script src="../js/checkout.js"></script>
    <style>
      body {
        margin-left: 50px;
        margin-right: 50px;
        margin-top: 100px;
      }

      h3 {
        color: #da0000;
        margin-bottom: 8px;
      }
        .row {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-left: -16px;
        }

        .column-xsmall {
            -ms-flex: 25%;
            flex: 25%;
        }

        .column-small,
        .column2 {
            -ms-flex: 50%;
            flex: 50%;
        }

        .column1 {
            -ms-flex: 70%;
            flex: 70%;
        }

        .column1,
        .column2,
        .column-small,
        .column-xsmall {
            padding: 0 16px;
        }

        .container {
            padding: 20px;
            border: 1px solid;
            border-color: lightgrey;
        }

        .container * {
            margin-top: 2px;
        }

        @media (max-width: 800px) {
            .row {
                flex-direction: column-reverse;
            }
            .col-25 {
                margin-bottom: 20px;
            }
        }

        input,textarea {
          width: 20%;
          padding: 0.9em;
          margin-top: 0.25em;
          margin-bottom: 0.25em;
          background-color: rgb(240, 239, 239);
          border: none;
          border-radius: 5px;
        }

        input.btn {
          margin-top: 20px;
          margin-left: 0px;
        }

        .item-total {
          color: #da0000;
          font-weight: bold;
          font-size: 15pt;
          margin-left: 2px;
          margin-top: 7px;
        }

        .list-svg {
          width: 90%;
          margin-bottom: 10px;
        }

    </style>
    <title>Checkout</title>
    <script src="./js/main.js"></script>
  </head>
<main>
<body onload="stylePage();">
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
                <input type="search" id="search-bar" placeholder="What are you craving?">
            </form>
            <input type="button" id="shopping-cart" onclick="window.location.href='../html/cart.php'">
        </header>
    <div class="row">
        <div class="column1">
          <div class="container">
            <form action="../php/addbillinginfo.php" method="POST" onsubmit="return checkout();">
              <div class="row">
                <div class="column2">
                  <h3>Billing Address</h3>
                  <p id="nameValidity"> Name is invalid</p>
                  <p id="emailValidity"> Email is invalid</p>
                  <p id="adrValidity"> Address is invalid</p>
                  <p id="cityValidity"> City is invalid</p>
                  <p id="stateValidity"> State is invalid</p>
                  <p id="zipValidity"> Zip Code is invalid</p>
                  <label for="name"> Full Name</label>
                  <input type="text" id="name" name="name" placeholder="John Doe">
                  <label for="email"> Email</label>
                  <input type="email" id="email" name="email" placeholder="john@example.com"><br>
                  <label for="adr"> Address</label>
                  <input type="text" id="adr" name="address" placeholder="123 W. Broad St">
                  <label for="city"> City</label>
                  <input type="text" id="city" name="city" placeholder="Athens">
      
                  <div class="row">
                    <div class="column2">
                      <label for="state">State</label>
                      <input type="text" id="state" name="state" placeholder="GA">
                      <label for="zip">Zip Code</label>
                      <input type="text" id="zip" name="zip" placeholder="30606">
                    </div>
                  </div>
                </div>

                <div class="column2">
                  <!-- note when adding cc num add dashes automatically?? -->
                  <h3>Payment</h3>
                  <p id="cardNameValidity"> Name on Card is invalid</p>
                  <p id="cardNumberValidity"> Card Number is invalid</p>
                  <p id="expMonthValidity"> Expiration Month is invalid</p>
                  <p id="expYearValidity"> Expiration Year is invalid</p>
                  <p id="cvvValidity"> CVV is invalid</p>
                  <label for="cardname">Name on Card</label>
                  <input type="text" id="ccname" name="cardname" placeholder="John Doe">
                  <label for="cardnumber">Credit card number</label>
                  <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                  
                  <div class="row">
                      <div class="column-small">
                          <label for="expmon">Exp Month</label>
                          <input type="text" id="expm" name="expmon" placeholder="August">
                          <label for="expyear">Exp Year</label>
                          <input type="text" id="expy" name="expyear" placeholder="2030">
                      </div>
                      <div class="column-small">
                          <label for="cvv">CVV</label>
                          <input type="text" id="cvv" name="cvv" placeholder="111">
                      </div>
                  </div>
                </div>
              </div>
              <input type="submit" value="Checkout" class="btn">
            </form>
          </div>
        </div>
      
        <div class="column-xsmall">
        <img src="../images/holding-card.svg" alt="List" class="list-svg">
          <div class="container">
            <div class="totals">
              <?php
                $subtotal = 0;
                number_format(floor($subtotal*100)/100,2, '. ', '');
                $taxamt = 0;
                $shipping = 5.00;
                $total = 0; ?>
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
                                </div></div>
                        </div>
                        <div class="item-total">
                            <label>Grand Total</label>
                            <?php 
                                $total = $subtotal + $taxamt + $shipping;
                            ?>
                            <div class="num" id="cart-total"><?php echo number_format(floor($total*100)/100,2, '.', ''); ?></div>
                        </div>
                    </div>
          </div>
        </div>
      </div>
    </body>
      </main>
</html>