<?php
require_once '../../BackEnd/Session/sellersession.php';
require_once '../../BackEnd/Seller.php';
$seller = new Seller($_SESSION['customer_id'], $_SESSION['email'], $_SESSION['seller_id']);
$pid = $_GET['oid'];
$res = $seller->getOrProductDetail($pid);
$row = $res->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="icon" href="../Assets/img/adulislogo1000.png">
    <title>Order Detail</title>
</head>

<body>
    <header class="business-man-header">
        <p class="business_name">Business Control Panel</p>
        <p><a href="./bizmanagment.php"><i class="fa fa-arrow-left" aria-hidden="true"></i>
            </a></p>
    </header>
    <main>
        <div class="detail-info-container">
            <p class="info">Item Name:
                <?= $row['product_name']; ?>
            </p>
            <p class="info">Quantity:
                <?= $row['quantity']; ?>
            </p>
            <p class="info">Name:
                <?= $row['first_name'] . ' ' . $row['last_name']; ?>
            </p>
            <p class="info">Address:
                <?= $row['address']; ?>
            </p>
            <p class="info">Phone Number:
                <?= $row['phone_number']; ?>
            </p>
            <p class="info">Email:
                <?= $row['email']; ?>
            </p>
            <div class="action-btns">
                <?php
                if ($row['buyer_status'] == 1 && $row['seller_status'] == 0) {
                     echo '<a href="http://" class="activate" >Mark As Delivered</a>';
                }
                ?>
            </div>
        </div>
    </main>
</body>

</html>