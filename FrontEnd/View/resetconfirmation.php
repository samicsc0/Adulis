<?php
session_start();
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
} else {
    header('location: login.php');
}
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
        <p class="reset-title">Enter Confirmation Code Sent To</p>
        <p class="reset-sub">
            <?= $email; ?>
        </p>
        <form action="" method="post">
            <input type="number" name="code" id="code" placeholder="Enter the code here" min="0001" max="9999">
            <input type="submit" name="submit" value="Continue" class="submit">
            <?php
            require '../../BackEnd/User.php';
            if (isset($_POST['submit'])) {
                $pin = $_POST['code'];
                if (User::checkResetCode($email, hash("sha256",$pin))) {
                    $_SESSION['verifed'] = true;
                    header('location: password.php');
                } else {
                    echo 'Incorrect confirmation code.';
                }
            }
            ?>
        </form>
        <p class="back"><a href="login.php">&#8592;&nbsp;Back to Login</a></p>
    </div>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>