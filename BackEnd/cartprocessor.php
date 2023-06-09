<?php
require_once 'config.php';
require_once 'Seller.php';
require_once 'Session/usersession.php';
require_once 'Cart.php';
$req = $_GET['request'];
$itemid = $_GET['item'];
$user_id = $_SESSION['customer_id'];
$cart = new Cart();
$cartid = $cart->returnCartId($user_id);
switch ($req) {
    case 'add':
        if (!$cart->cartItemExist($user_id, $itemid)) {
            $result = Seller::getProduct($itemid);
            $row = $result->fetch_assoc();
            $price = $row['price'];
            $cart->addToCart($user_id, $itemid, $price);
        } else {
            header('location: ../FrontEnd/View/index.php');
        }
        break;
    case 'rem':
        $cart->removeCartItem($itemid);
        header('location: ../FrontEnd/View/cart.php');
        break;
    case 'inc':
        $current_quant = $cart->cartItem($itemid);
        $pr_quant = $cart->getProductInfo($itemid)['stock'];
        $pr_price = $cart->getProductInfo($itemid)['price'];
        $new_quan = 0;
        if ($current_quant < $pr_quant) {
            $new_quan = $current_quant + 1;
            $new_price = $pr_price * $new_quan;
            $cart->updateCart($itemid, $new_quan, $new_price);
            header('location: ../FrontEnd/View/cart.php');
        } else {
            header('location: ../FrontEnd/View/cart.php');
        }
        break;
    case 'dec':
        $current_quant = $cart->cartItem($itemid);
        $pr_price = $cart->getProductInfo($itemid)['price'];
        $new_quan = 0;
        if ($current_quant > 1) {
            $new_quan = $current_quant - 1;
            $new_price = $pr_price * $new_quan;
            $cart->updateCart($itemid, $new_quan, $new_price);
            header('location: ../FrontEnd/View/cart.php');
        } else {
            header('location: ../FrontEnd/View/cart.php');
        }
        break;
}
?>