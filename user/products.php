<?php
include "../database/connect.php";
session_start();

$conn = (new Connection())->getConnection();

$name = "";
$price = "";
$quantity = "";
$cartNumber = "";

if(isset($_GET['pid'])){
    $id = $_GET['pid'];
    // var_dump($id);
    $query = "SELECT * FROM TEST_I.PRODUCT WHERE id_product = " . $id;
    $result = mysqli_query($conn, $query);
    
      if($result){
        $row = mysqli_fetch_assoc($result);
        $name =  $row['product_name'];
        $price = $row['product_price_id'];
        $quantity = $row['product_quantity_id'];
      } else {
        die("Error : ". mysqli_error($conn));
      }
}

function imageDisplay($id) {
    switch ($id) {
        case 1:
            return "pc.png";
        case 2:
            return "laptop.png";
        case 3:
            return "raspberry.png";
        default:
            return "default.png";
    }
}

if (isset($_POST['submit'])){
    $quantity = $_POST['qte_product'];

    $queryCart = "INSERT INTO TEST_I.CART(NAME_P,PRICE,QUANTITY)
                  VALUES ('$name', '$price', '$quantity')";
    
    $resultCart = mysqli_query($conn, $queryCart);
    
    
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cover - Free Bulma template</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.4/css/bulma.min.css" />
    <style type="text/css">
        html,
        body {
            font-family: 'Open Sans';
        }

        img {
            padding: 5px;
            border: 1px solid #ccc;
        }
    </style>
</head>

<body>
    <section class="hero is-fullheight is-default is-bold">
        <div class="hero-head">
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
                                <button class="button is-primary"><i class="fa-solid fa-cart-shopping"></i>&nbsp;Cart</button>
                            </a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="columns is-vcentered">
                    <div class="column is-5">
                        <figure class="image is-1by1">
                            <img src="../img/<?php echo imageDisplay($id); ?>" alt="Description">
                        </figure>
                    </div>
                    <div class="column is-6 is-offset-1">
                        <h1 class="title is-2">
                            <?php echo $name; ?>
                        </h1><br>
                        <h2 class="subtitle is-5">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id similique temporibus corrupti. Maxime exercitationem harum corporis quia totam, dignissimos incidunt fugit? Numquam, sint. Quisquam illo animi cupiditate. Minima, exercitationem dolorum.
                        </h2>
                        <h2 class="subtitle is-5">
                            Price : <?php echo $price . '&nbsp;'; ?>$
                        </h2>
                        <form action="" method="post">
                        <div class="field is-horizontal">
                            <h2 class="subtitle is-5" >
                                Quantity :&nbsp; 
                            </h2>
                            <div class="field-body">
                                <div class="field">
                                    <p class="control is-expanded">
                                        <input name="qte_product" class="input is-primary" type="text" placeholder="Quantity">
                                    </p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <p class="has-text-centered">
                            <button name="submit" type="submit" class="button is-medium is-primary "><i class="fa-solid fa-cart-shopping"></i>&nbsp; Add to cart</button>
                        </p>
                        </form>
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="../js/bulma.js"></script>
</body>

</html>
