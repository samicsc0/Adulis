<?php
require_once '../config.php';
require_once '../Seller.php';
require_once '../Session/usersession.php';
require_once '../Cart.php';
require_once '../User.php';
$req = $_GET['request'];
$itemid = $_GET['item'];
$user = new User($_SESSION['customer_id'], $_SESSION['email']);
$cart = new Cart($user->user_id);
$cartid = $cart->returnCartId();
switch ($req) {
    case 'add':
        if (!$cart->cartItemExist($itemid)) {
            $row = Seller::getProduct($itemid);
            $price = $row['price'];
            $cart->addToCart($itemid, $price);
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        } else {
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        }
    case 'rem':
        $cart->removeCartItem($itemid);
        header("Location: " . $_SERVER['HTTP_REFERER']);
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
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } else {
            header("Location: " . $_SERVER['HTTP_REFERER']);
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
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } else {
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }
        break;
}
?>