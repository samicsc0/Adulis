<?php 
require_once '../../BackEnd/Session/usersession.php';
require_once '../../BackEnd/User.php';
$user = new User($_SESSION['customer_id'],$_SESSION['email']);
$item_id;
    if(isset($_GET['id'])){
        $item_id = $_GET['id'];
    }
    $user->markasDelivered($item_id);
    header('location: ../../FrontEnd/View/profile.php');
?>