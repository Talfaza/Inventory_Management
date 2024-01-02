<?php
session_start();

include "../database/connect.php";
include "../classes/Cart.php";

$conn = (new Connection())->getConnection();
$userId = $_SESSION["id"];

$id = NULL;
$name = NULL;
$quantity = NULL;
$price = NULL;

$cart = new Cart($name, $price ,$quantity,$conn,$userId);









?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventory Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.4/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/home.css">
</head>

<body>
    <section class="hero is-medium">
        <div class="hero-head">
            <div class="container">
                <nav class="navbar" role="navigation" aria-label="main navigation">
                    <div id="navbarBasicExample" class="navbar-menu">
                        <div class="navbar-start">
                            <a class="navbar-item">
                                Home
                            </a>
                            <a class="navbar-item">
                                Blog Posts
                            </a>
                        </div>

                        <div class="navbar-end">
                            <div class="navbar-item">
                                <a href="cart.php">
                                    <button class="button is-primary"><i class="fa-solid fa-cart-shopping"></i>&nbsp; Cart</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </section>
    <br><br>
    <div class="container has-text-centered">
        <table class="table" style="margin-left: auto; margin-right: auto;">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $cumulativeTotal = NULL;
                $querySelection = "SELECT * FROM TEST_I.CART WHERE user_id = '$userId'";
                $result = mysqli_query($conn, $querySelection);
                if ($result) {
                    while ($row = mysqli_fetch_array($result)) {
                        $id = $row['id'];
                        $name = $row['NAME_P'];
                        $quantity = $row['QUANTITY'];
                        $price = $row['PRICE'];

                        $cart->setId($id);
                        $cart->setName($name);
                        $cart->setQuantity($quantity);
                        $cart->setPrice($price);
                        
                        $cumulativeTotal += $quantity * $price; 
                        if (empty($id)){
                          echo "<tr>";
                          echo "<td>" . $name . "</td>";
                          echo "<td>" . $quantity . "</td>";
                          echo "<td>" . $price . "</td>";
                          echo "<td>" . $quantity * $price . "</td>";
                          echo "<td><a href='deleteCard.php?deleteid=" . $id . "' class='button is-danger'>Delete</a></td></td>";
                          echo "</tr>";
                        }else {
                          echo "<tr>";
                          echo "<td>" . $name . "</td>";
                          echo "<td>" . $quantity . "</td>";
                          echo "<td>" . $price . "$" . "</td>";
                          echo "<td>" . $quantity * $price . "</td>";
                          echo "<td><a href='deleteCard.php?deleteid=" . $id . "' class='button is-danger'>Delete</a></td></td>";
                          echo "</tr>";
                          

                        }

                     
                    }
                    
                }
                ?>
            </tbody>
        </table><br>
        <?php 
          if (!empty($id)) {
            echo "Total : $cumulativeTotal"."$";
          }
        ?>
    </div>
</body>

</html>
