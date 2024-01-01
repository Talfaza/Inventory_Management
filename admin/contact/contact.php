<?php
include "../../database/connect.php";
session_start();
// $User = unserialize($_SESSION['User']);
// var_dump($User);

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
    <link rel="stylesheet" type="text/css" href="../../css/userAdmin.css">
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
                        <li><a href="../home.php">Dashboard</a></li>
                    </ul>
                    <p class="menu-label">
                        Administration
                    </p>
                    <ul class="menu-list">
                        
                        <li>
                            <a >Manage</a>
                            <ul>
                                <li><a href="../users/users.php" >Users</a></li>
                                <li><a class="is-active">Contact</a></li>
                            </ul>
                            <li><a href="../products/products.php">Manage Your Products</a></li>
                    <p class="menu-label">
                        Other
                    </p>
                    <ul class="menu-list">
                        <li><a href="../../home.php">Signout <?php session_abort();?></a></li>
                    </ul>
                </aside>
            </div>
            <div class="column is-9">
                <nav class="breadcrumb" aria-label="breadcrumbs">
                    <ul>
                        <li><a href="">Admin</a></li>
                        <li><a href="">Administration</a></li>
                        <li><a href="">Manage </a></li>
                        <li class="is-active"><a href="#" aria-current="page">Contact</a></li>
                    </ul>
                </nav>
                <section class="hero is-light welcome is-small">
                    <div class="hero-body">
                    <?php
                            
                            $query = "SELECT * FROM TEST_I.CONTACT";
                            $result = mysqli_query($conn,$query);

                            if ($result) {
                                while($row = mysqli_fetch_array($result)){
                                    $id = $row['id'];
                                    $user = $row['user'];
                                    $email = $row['email'];
                                    $message = $row['msg'];
                                    $messageDate = $row['msg_date'];
                                    echo'<br> <br>';
                                    echo  "<strong>id : </strong>" . $id . '<br>' .
                                          "<strong>User : </strong>" . $user . '<br>' .
                                          "<strong>Email: </strong>" . $email . '<br>' .
                                          "<strong>Message : </strong>" . $message . '<br>' .
                                           "<strong>Message Date : </strong>" . $messageDate . '<br><br>';
                                    echo '<br> <br>'.'  <a href="delete.php?deleteid='.$id.'"><button class="button is-danger">Delete</button></a>';
                                }
                            }

                            
                            
                            
                            
                            
                            ?>
                        
                    </div>
                </section>
                  </div>
            </div>
        </div>
    </div>
</body>

</html>
