<?php 

   include("database.php");

   $productsCreate = "CREATE TABLE IF NOT EXISTS productlist
                        (
                            productID INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                            restID INT(6) NOT NULL,
                            prodName VARCHAR(255) NOT NULL UNIQUE,
                            price DECIMAL(10,2) NOT NULL
                        )
                        ";

    $db->exec($productsCreate);

    $initProds = "INSERT IGNORE INTO productlist
                    (restID, prodName, price)
                  VALUES
                    (1, 'Thin Crust Slice', 3.20),
                    (1, 'Thick Crust Slice', 3.40),
                    (1, 'Small 12\" Pizza', 14.00),
                    (1, 'Large 16\" Pizza', 18.00),
                    (1, 'Water', 1.00),
                    (2, 'Cheese Calzone', 7.25),
                    (2, 'Cheeseburger Calzone', 7.50),
                    (2, 'Chicken Parmasean Calzone', 7.75),
                    (2, '6 Wings', 6.95),
                    (2, '12 wings', 11.95),
                    (3, 'Hawaiian Chicken', 14.95),
                    (3, 'Shrimp Tempura Udong', 13.95),
                    (3, 'Gyoza', 4.95),
                    (3, 'Dynamite Mussel', 7.95),
                    (3, 'Fried Rice', 2.95),
                    (4, 'Traditional Cookie', 1.65),
                    (4, 'Deluxe Cookie', 3.30),
                    (4, 'Pint of Ice Cream', 7.85),
                    (4, 'Cookie Sandwich', 5.90),
                    (4, 'Brownie', 3.25),
                    (5, 'Chips and Queso', 3.99),
                    (5, 'Bacon Egg and Cheese Taco', 2.19),
                    (5, 'Grilled Mahi Taco', 4.35),
                    (5, 'Shredded Brisket Burrito', 7.69),
                    (5, 'Chicken Quesadilla', 6.99)
                    ";

    $db->exec($initProds);

?>