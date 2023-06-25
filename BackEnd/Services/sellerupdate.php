<?php
require_once '../config.php';
require_once '../Seller.php';
require_once '../Session/sellersession.php';
$oid = $_GET['oid'];
$seller = new Seller($_SESSION['customer_id'], $_SESSION['email'], $_SESSION['seller_id']);
$ordetail = $seller->getOrProductDetail($oid);
$res_ordetail = $ordetail->fetch_assoc();
$seller_info = $seller->getUserInfo();
$res_userInfo = $seller_info->fetch_assoc();
echo $res_userInfo['first_name'];
$data = array(
    'firstname' => $res_userInfo['first_name'],
    'lastname' => $res_userInfo['last_name'],
    'phonenumber' => $res_userInfo['phone_number'],
    'email' => $res_userInfo['email'],
    'amount' => $res_ordetail['price']
);
if ($ordetail != false) {
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
        } else {
            $seller->updateDeliveryseller($oid);
            header('location: ../../FrontEnd/View/bizmanagment.php');
        }
    }
    curl_close($curl);
} else {
    header('location: ../../FrontEnd/View/bizmanagment.php');
}

?>