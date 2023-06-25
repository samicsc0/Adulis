<?php
    session_start();
    if($_SESSION['role'] != 'seller'){
        session_destroy();
        header('location: ../../FrontEnd/View/login.php');
    }
    
?>