<?php
include "../../database/connect.php";

$conn = (new Connection())->getConnection();

$username = "";
$email = "";
$pass = "";

if(isset($_GET['editid'])){
    $id = $_GET['editid'];
    $querySelect = "SELECT * FROM TEST_I.USER WHERE id =  $id";
    $result = mysqli_query($conn, $querySelect);
    $row = mysqli_fetch_array($result);

    $username = $row['user'];
    $email = $row['email'];
    $pass = $row['pass'];
    if (isset($_POST['submit'])) {

       $username = $_POST['username'];
       $email = $_POST['email'];
       $pass = $_POST['pass'];

       $query = "UPDATE TEST_I.USER SET user = '$username', email = '$email', pass = '$pass' WHERE id = $id";
       $result = mysqli_query($conn, $query);
       if($result){
           header("Location: users.php");
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
                        <label for="username">Username :</label>
                        <input id="username" class="input is-info" type="text" placeholder="Username" name="username" value="<?= $username ?>" required>
                    </div>
                    <div class="column">
                        <label for="email">Email :</label>
                        <input id="email" class="input is-info" type="email" placeholder="Email" name="email" value="<?= $email ?>" required>
                    </div>
                    <div class="column">
                        <label for="password">Password :</label>
                        <input id="password" class="input is-info" type="text" placeholder="Password" name="pass" value="<?= $pass ?>" required>
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
