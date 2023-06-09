<?php
require 'Seller.php';
$id = $_GET['pid'];
Seller::removeProduct($id);
?>