<?php
include('../database/connect.php');
include "../classes/Contact.php";
include "../classes/User.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Products</title>
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
                                <a href="login.php">
                                    <button class="button is-primary"><i class="fa-solid fa-cart-shopping"></i></i>&nbsp;Cart</button>
                                </a>&nbsp;
                                <a href="signup.php">
                                    <button class="button is-primary"> <i class="fa-solid fa-right-to-bracket"></i>&nbsp;Signout</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </nav><br><br>
                <div class="columns is-marginless">
                    <!-- First Card -->
                    <div class="column is-one-quarter is-4">
                        <div class="card">
                            <div class="card-image">
                                <figure class="image is-4by3">
                                    <img src="../img/pc2.png" alt="Placeholder image">
                                </figure>
                            </div>
                            <div class="card-content">
                                <div class="content">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Phasellus nec iaculis mauris.
                                </div>
                                <div class="content">
                                    <button class="button is-primary">Buy</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Second Card -->
                    <div class="column is-one-quarter is-4">
                        <div class="card">
                            <div class="card-image">
                                <figure class="image is-4by3">
                                    <img src="../img/laptop.png" alt="Placeholder image">
                                </figure>
                            </div>
                            <div class="card-content">
                                <div class="content">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Phasellus nec iaculis mauris.
                                </div>
                                <div class="content">
                                    <button class="button is-primary">Buy</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Third Card -->
                    <div class="column is-one-quarter is-4">
                        <div class="card">
                            <div class="card-image">
                                <figure class="image is-4by3">
                                    <img src="../img/raspberry.png" alt="Placeholder image">
                                </figure>
                            </div>
                            <div class="card-content">
                                <div class="content">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Phasellus nec iaculis mauris.
                                </div>
                                <div class="content">
                                    <button class="button is-primary">Buy</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
