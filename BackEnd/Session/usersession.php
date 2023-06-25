<?php
    session_start();
    if($_SESSION['role'] != 'buyer'){
        session_destroy();
        header('location: ../../FrontEnd/View/login.php');
    }
?>