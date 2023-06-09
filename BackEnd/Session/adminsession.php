<?php
    session_start();
    if($_SESSION['role'] != 'admin'){
        session_destroy();
        header('location: ../../FrontEnd/View/login.php');
    }
?>