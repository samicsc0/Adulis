<?php
    session_start();
    if($_SESSION['role'] != 'buyer' && $_SESSION['status'] != 'logged'){
        session_destroy();
        header('location: ../../FrontEnd/View/login.php');
    }
?>