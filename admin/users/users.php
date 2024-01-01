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
                                <li><a href="users.php" class="is-active">Users</a></li>
                                <li><a href="../contact/contact.php">Contact</a></li>
                            </ul>
                            <li><a href="../products/products.php">Manage Your Products</a></li>
                    <p class="menu-label">
                        Other
                    </p>
                    <ul class="menu-list">
                        <li><a>Signout</a></li>
                    </ul>
                </aside>
            </div>
            <div class="column is-9">
                <nav class="breadcrumb" aria-label="breadcrumbs">
                    <ul>
                        <li><a href="">Admin</a></li>
                        <li><a href="">Administration</a></li>
                        <li><a href="">Manage </a></li>
                        <li class="is-active"><a href="#" aria-current="page">Users</a></li>
                    </ul>
                </nav>
                <section class="hero is-light welcome is-small">
                    <div class="hero-body">
                    <table class="table is-fullwidth">
                            <thead>
                                <tr>
                                
                                <th>Id</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Register Date</th>
                                <th>Action</th>
                                
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $sql = "SELECT * FROM TEST_I.USER";
                                $result = mysqli_query($conn, $sql);
                                if ($result){
                                    while ($row = mysqli_fetch_array($result)) {

                                        $id = $row['id'];
                                        $username = $row['user'];
                                        $email = $row['email'];
                                        $password = $row['pass'];
                                        $registerDate = $row['register_date'];

                                        if ($id == 1) {
                                            echo "<tr>";
                                            echo "<td>".$id."</td>";
                                            echo "<td>".$username."</td>";
                                            echo "<td>".$email."</td>";
                                            echo "<td>".$password."</td>";
                                            echo "<td>".$registerDate."</td>";
                                            echo "<td>can't edit admin</td>";
                                            echo "<td>can't delete admin</td>";
                                            echo "</tr>";
                                        }else{
                                            echo "<tr>";
                                            echo "<td>".$id."</td>";
                                            echo "<td>".$username."</td>";
                                            echo "<td>".$email."</td>";
                                            echo "<td>".$password."</td>";
                                            echo "<td>".$registerDate."</td>";
                                            echo "<td><a href='edit.php?editid=".$id."' class='button is-info'>Edit</a></td>";
                                            echo "<td><a href='delete.php?deleteid=".$id."' class='button is-danger'>Delete</a></td>";
                                            echo "</tr>";
                                        }
                                        
                                    }
                                }
                                

                                
                                
                                ?>
                            
                              
                                
                            </tbody>
                            </table>
                        
                    </div>
                </section>
                  </div>
            </div>
        </div>
    </div>
</body>

</html>
