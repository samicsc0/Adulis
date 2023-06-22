<?php
session_start();
if (isset($_SESSION['email']) && isset($_SESSION['verifed'])) {
    if ($_SESSION['verifed']) {
        $email = $_SESSION['email'];
    } else {
        header('location: login.php');
    }
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
    <title>New Password</title>
</head>

<body>
    <main>
        <div class="new-password">
            <img src="../Assets/img/key-chain.png" alt="">
            <p class="pass-title">Enter your new Password</p>
            <form action="" method="POST">
                <input type="password" name="newpass" id="" placeholder="New Password">
                <input type="password" name="conpass" id="" placeholder="Confirm Password">
                <input type="submit" name="submit" value="Submit">
                <?php
                require 'inputcleaner.php';
                require_once '../../BackEnd/User.php';
                if (isset($_POST['submit'])) {
                    $newPassword = $_POST['newpass'];
                    $conPassword = $_POST['conpass'];
                    if(validatePassword($newPassword)){
                        if($newPassword == $conPassword){
                            $pass = hash("sha256",$newPassword);
                            User::updateForgPassword($email,$pass);
                            session_destroy();
                        }
                    }else{
                        echo 'Password must be atleast 8 characters';
                    }
                }
                ?>
            </form>
        </div>
    </main>
</body>

</html>