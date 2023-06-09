<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="icon" href="../Assets/img/adulislogo1000.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adulis Login</title>
</head>

<body>
    <main>
        <div class="login-container">
            <img src="../Assets/img/adulislogo1000.png" alt="">
            <p class="login-title">Welcome back</p>
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
                <input type="email" name="email" id="email" placeholder="E-mail" required>
                <input type="password" name="password" id="password" placeholder="Password" required>
                <input type="submit" name="submit" value="Login &#8594" class="submit">
                <?php
                require_once 'inputcleaner.php';
                require '../../BackEnd/User.php';
                if (isset($_POST['submit'])) {
                    $email = input_cleaner($_POST['email']);
                    $password = hash("sha256", $_POST['password']);
                    User::login($email,$password);
                }
                ?>
            </form>
            <div class="additional-options">
                <p>Forget Password?&nbsp;&nbsp;<a href="./resetpassword.php">Reset</a></p>
                <p>Don't have an account?&nbsp;&nbsp;<a href="./registration.php">Register</a></p>
            </div>
        </div>
    </main>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>