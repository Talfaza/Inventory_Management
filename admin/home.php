<?php
include "../database/connect.php";
session_start();
// $User = unserialize($_SESSION['User']);
// var_dump($User);

// if ($_SESSION["user"] != "admin") { header("Location:../login.php"); exit(); }


$conn = (new Connection())->getConnection();




?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <!-- Bulma Version 0.9.0-->
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.4/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>

<body>
    <br>
    <div class="container">
        <div class="columns">
            <div class="column is-3 ">
                <aside class="menu is-hidden-mobile">
                    <p class="menu-label">
                        General
                    </p>
                    <ul class="menu-list">
                        <li><a  class="is-active">Dashboard</a></li>
                    </ul>
                    <p class="menu-label">
                        Administration
                    </p>
                    <ul class="menu-list">
                        
                        <li>
                            <a>Manage</a>
                            <ul>
                                <li><a href="users/users.php">Users</a></li>
                                <li><a href="contact/contact.php">Contact</a></li>
                            </ul>
                            <li><a href="products/products.php">Manage Your Products</a></li>
                    <p class="menu-label">
                        Other
                    </p>
                    <ul class="menu-list">
                    <a href="../home.php">Signout <?php session_abort();?>
                    </ul>
                </aside>
            </div>
            <div class="column is-9">
                <nav class="breadcrumb" aria-label="breadcrumbs">
                    <ul>
                        <li><a href="">Admin</a></li>
                        <li><a href="">General</a></li>
                        <li class="is-active"><a href="#" aria-current="page">Dashboard</a></li>
                    </ul>
                </nav>
                <section class="hero is-info welcome is-small">
                    <div class="hero-body">
                        <div class="container">
                            <h1 class="title">
                                Hello, Admin.
                            </h1>
                            <br>
                        </div>
                    </div>
                </section>
                <section class="info-tiles">
                    <div class="tile is-ancestor has-text-centered">
                        <div class="tile is-parent">
                            <article class="tile is-child box">
                                <p class="title"><?php 
                                $queryCount = "SELECT COUNT(*) AS num_rows FROM TEST_I.USER";

                                if ($result = mysqli_query($conn, $queryCount)) {
                                    $row = mysqli_fetch_assoc($result);
                                    $numRows = $row['num_rows'];
                                
                                    echo $numRows-1;
                                } else {
                                    echo "Error executing query: " . mysqli_error($connection->getConnection());
                                }
                                
                                
                                
                                
                                
                                ?></p>
                                <p class="subtitle">Users</p>
                            </article>
                        </div>
                        <div class="tile is-parent">
                            <article class="tile is-child box">
                                <p class="title">00</p>
                                <p class="subtitle">Products</p>
                            </article>
                        </div>
                        <div class="tile is-parent">
                            <article class="tile is-child box">
                                <p class="title">00$</p>
                                <p class="subtitle">Profit</p>
                            </article>
                        </div>
                    </div>
                </section>
                <div class="columns">
                    <div class="column is-6 is-offset-3">
                        <div class="card events-card">
                            <header class="card-header">
                                <p class="card-header-title">
                                    Events
                                </p>
                                <a href="#" class="card-header-icon" aria-label="more options">
                                    <span class="icon">
                                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                                    </span>
                                </a>
                            </header>
                            <div class="card-table">
                                <div class="content">
                                    <table class="table is-fullwidth is-striped">
                                        <tbody>
                                        <?php 
                                          $stmt ="SELECT * FROM TEST_I.CONTACT";
                                          $result = mysqli_query($conn, $stmt);

                                          if ($result) {
                                          $newMessageFound = false;

                                          while ($row = mysqli_fetch_array($result)) {
                                                $user = $row['user'];
                                                
                                                if ($row['stat'] == 0 || $row['stat'] === "") {
                                                      echo '<tr>
                                                            <td width="5%"><i class="fa fa-bell-o"></i></td>
                                                            <td>New Message From '.$user.'</td>
                                                            <td class="level-right"><a class="button is-small is-info" href="contact/contact.php">Action</a></td>
                                                            </tr>';
                                                      $newMessageFound = true;
                                                }
                                          }

                                          if (!$newMessageFound) {
                                                echo "No new Message ! ";
                                          }
                                          }
                                          ?>

                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <footer class="card-footer">
                                <a href="#" class="card-footer-item"></a>
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script async type="text/javascript" src="../js/bulma.js"></script>
</body>

</html>
