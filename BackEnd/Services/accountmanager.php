<?php
require '../Session/adminsession.php';
require '../Admin.php';
$req = $_GET['req'];
$id = $_GET['id'];
switch ($req) {
    case 'deac':
        Admin::deactivate($id);
        header('location: ../../FrontEnd/View/adminpanel.php');
        break;
    case 'act':
        Admin::activate($id);
        header('location: ../../FrontEnd/View/adminpanel.php');
        break;
    case 'rev':
        Admin::review($id);
        header('location: ../../FrontEnd/View/adminpanel.php');
        break;
    default:
        break;
}
?>