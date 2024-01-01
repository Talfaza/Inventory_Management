<!-- signup.php -->
<?php
include_once "database/connect.php";
include_once "classes/User.php";

session_start();
$conn = (new Connection())->getConnection();


if (isset($_POST['submit'])) {
    $username = $_POST['user'];
    $email = $_POST['email'];
    $password = $_POST['pass'];

    $User = new User($username,$email,$password);

    $User->setUsername($username);
    $User->setEmail($email);
    $User->setPassword($password);

    $_SESSION['User'] = serialize($User);


    $username = $User->getUsername();
    $email = $User->getEmail();
    $password = $User->getPassword();

    $check_query = $conn->prepare("SELECT * FROM TEST_I.USER WHERE email = ?");
    $check_query->bind_param("s",$email);
    $check_query->execute();
    $check_result = $check_query->get_result();

    if ($check_result->num_rows > 0) {
        echo "Error: Email is already in use. Please choose a different email.";
    } else {
        $insert_query = $conn->prepare("INSERT INTO TEST_I.USER (user, email, pass) VALUES (?, ?, ?)");
        $insert_query->bind_param("sss", $username, $email, $password);

        if ($insert_query->execute()) {
      
            header('Location: login.php');
            exit;
        } else {
            echo "Error: " . $insert_query->error;
        }

        $insert_query->close();
    }

    $check_query->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css" integrity="sha384-BY+fdrpOd3gfeRvTSMT+VUZmA728cfF9Z2G42xpaRkUGu2i3DyzpTURDo5A6CaLK" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <script src="js/pass.js"></script>
</head>
<body>
    <form action="" method="POST">
        <!-- Your signup form here -->
        <div class="hero is-fullheight">
            <h1 class="title is-1 has-text-centered">Sign Up</h1>
            <div class="hero-body is-justify-content-center is-align-items-center">
                <div class="columns is-flex is-flex-direction-column box">
                    <div class="column">
                        <label for="username">Username:</label>
                        <input id="username" class="input is-primary" type="text" placeholder="Username" name="user" required>
                    </div>
                    <div class="column">
                        <label for="username">Email:</label>
                        <input id="email" class="input is-primary" type="email" placeholder="Username" name="email" required>
                    </div>
                    <div class="column">
                        <label for="password">Password:</label>
                        <input id="pass" class="input is-primary" type="password" placeholder="Password" name="pass" required>
                        <label class="checkbox">
                            <input id="showPassword" type="checkbox">
                            Show Password
                        </label><br><br>
                        Already have an account ?
                        <a href="login.php" class="has-text-primary">Login</a>
                    </div>
                    <div class="column">
                        <button class="button is-primary is-light is-fullwidth" type="submit" name="submit">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        let showPasswordCheckbox = document.getElementById('showPassword');

        showPasswordCheckbox.addEventListener('change', () => {
            let passwordInput = document.getElementById('pass');

            if (showPasswordCheckbox.checked) {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        });
    </script>
</body>
</html>
