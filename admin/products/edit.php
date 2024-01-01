<?php
include "../../database/connect.php";

$conn = (new Connection())->getConnection();

$name = "";
$price = "";
$quantity = "";

if(isset($_GET['editid'])){
    $id = $_GET['editid'];
    $querySelect = "SELECT * FROM TEST_I.PRODUCT WHERE id_product =  $id";
    $result = mysqli_query($conn, $querySelect);
    $row = mysqli_fetch_array($result);

    $name = $row['product_name'];
    $price = $row['product_price_id'];
    $quantity = $row['product_quantity_id'];
    if (isset($_POST['submit'])) {

       $name = $_POST['p_name'];
       $price = $_POST['price'];
       $quantity = $_POST['quantity'];

       $query1 = "UPDATE TEST_I.PRODUCT SET product_name = '$name', product_price_id = '$price', product_quantity_id = '$quantity' WHERE id_product = $id";
       $result1 = mysqli_query($conn, $query1);

       $query2 = "UPDATE TEST_I.PRICE SET product_price = '$price' WHERE id = $id";
       $result2 = mysqli_query($conn, $query2);
       
       $query3 = "UPDATE TEST_I.QUANTITY SET product_quantity = '$quantity' WHERE id = $id";
       $result3 = mysqli_query($conn, $query3);
       if($result1 && $result2 && $result3){
           header("Location: products.php");
       } else {
           die("Error: ". mysqli_error($conn));
       }
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<body>
    <form action="" method="POST">
        <div class="hero is-fullheight">
            <h1 class="title is-1 has-text-centered">Edit</h1>
            <div class="hero-body is-justify-content-center is-align-items-center">
                <div class="columns is-flex is-flex-direction-column box">
                    <div class="column">
                        <label for="username">Product Name :</label>
                        <input id="p_name" class="input is-info" type="text" placeholder="Username" name="p_name" value="<?= $name ?>" required>
                    </div>
                    <div class="column">
                        <label for="email">Price :</label>
                        <input id="price" class="input is-info" type="text" placeholder="Email" name="price" value="<?= $price ?>" required>
                    </div>
                    <div class="column">
                        <label for="password">Quantity :</label>
                        <input id="quantity" class="input is-info" type="text" placeholder="Password" name="quantity" value="<?= $quantity ?>" required>
                    </div>
                    <div class="column">
                        <button class="button is-info is-fullwidth" type="submit" name="submit">Edit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
