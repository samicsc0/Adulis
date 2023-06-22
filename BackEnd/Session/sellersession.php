<?php
    session_start();
    if($_SESSION['role'] != 'seller' && $_SESSION['status'] != 'logged'){
        session_destroy();
        header('location: ../../FrontEnd/View/login.php');
    }
?>