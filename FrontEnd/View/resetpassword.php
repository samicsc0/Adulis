<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="icon" href="../Assets/img/adulislogo1000.png">
    <title>Reset Password</title>
</head>

<body>
    <div class="reset-container">
        <img src="../Assets/img/key-chain.png" alt="">
        <p class="reset-title">Forgot password?</p>
        <p class="reset-sub">No worries, We'll help you to reset it.</p>
        <form action="" method="post">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="submit" name="submit" value="Continue" class="submit">
            <?php
            require 'inputcleaner.php';
            require_once '../../BackEnd/User.php';
            if (isset($_POST['submit'])) {
                $email = input_cleaner($_POST['email']);
                if (validateEmail($email)) {
                    if (User::checkEmail($email)) {
                        if (User::insertIntoreset($email,rand(1000, 9999))) {
                            $_SESSION['email'] = $email;
                            header('location: resetconfirmation.php');
                        }
                    }
                }

            }
            ?>
        </form>
        <p class="back"><a href="./login.php">&#8592; Back to Login</a></p>
    </div>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

</body>

</html>