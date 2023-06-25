<?php
require_once '../Session/usersession.php';
require_once '../User.php';
require_once '../Cart.php';
require '../config.php';
$user = new User($_SESSION['customer_id'], $_SESSION['email']);
$userinfo = $user->getUserInfo();
$row = $userinfo->fetch_assoc();
$cart = new Cart($user->user_id);

$data = array(
    'firstname' => $row['first_name'],
    'lastname' => $row['last_name'],
    'phonenumber' => $row['phone_number'],
    'email' => $row['email'],
    'amount' => $_SESSION['total_price']
);

if ($data['amount'] != 0) {
    $url = 'localhost/Adulis/BackEnd/Services/chapa.php';
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    if ($response === false) {
        echo 'Error: ' . curl_error($curl);
    }else{
        $amount = $data['amount'];
        $cart_id = $cart->returnCartId();
        $sql = "INSERT INTO invoice (customer_id,cart_id, total_price)
                            VALUES($user->user_id,$cart_id,$amount)";
        if(mysqli_query($conn,$sql)){
            $user->order($cart_id);
            $cart->close_cart($cart_id);
            unset($_SESSION['total_price']);
            header('location: ../../FrontEnd/View/resultsuccess.php');
        }else{
            
        }
    }
    curl_close($curl);
} else {
    header('location: ../../FrontEnd/View/checkout.php');
}
?>
