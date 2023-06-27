<!DOCTYPE html>
<html lang="en">
<?php
require_once '../../BackEnd/Session/usersession.php';
require_once '../../BackEnd/User.php';
require_once '../../BackEnd/Cart.php';
$user = new User($_SESSION['customer_id'], $_SESSION['email']);
$cart = new Cart($user->user_id);
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="icon" href="../Assets/img/adulislogo1000.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <title>Checkout</title>
</head>

<body>
    <?php
    require_once '../Components/header.php';
    require_once '../../BackEnd/Cart.php';
    ?>
    <main>
        <div class="checkout-container">
            <p class="checkout-title">Check Out</p>
            <div class="checkout-wrapper">
                <div class=" col col-1">
                    <?php
                        $res = $user->getUserInfo();
                        $row = $res->fetch_assoc(); 
                        $cart->checkCart($cart->returnCartId());
                        $_SESSION['total_price'] = $cart->getCartPrice($cart->returnCartId());
                    ?>
                    <p class="title">Delivery Information</p>
                    <p class="detail"><span>Name: </span><?=$row['first_name'] . ' ' .$row['last_name'];?></p>
                    <p class="detail"><span>Address: </span><?=$row['address']?></p>
                    <p class="detail"><span>Mobile: </span><?=$row['phone_number']?></p>
                    <p class="detail"><span>Email: </span><?=$row['email']?></p>
                </div>
                <div class="col col-2">
                    <div class="row-1">
                        <p class="tot-title">Total Price</p>
                        <p class="total-price"><?=$_SESSION['total_price'];?> Birr</p>
                    </div>
                    <div class="row-1">
                        <p class="tot-title">Service Price</p>
                        <p class="total-price"><?=$user->getServicePrice()?> Birr</p>
                    </div>
                    <div class="row-2">
                        <a href="../../BackEnd/Services/finishordering.php" class="pay-btn">Process Payment</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div class="foot-container">
            <div class="col col-1">
                <p class="footer-title">Adulis Ecommerce Platform</p>
                <p class="footer-desc">
                    Adulis is an e-commerce platform designed to give online shopping a seamless experience, providing
                    sellers
                    with an efficient way to showcase their products and buyers with a reliable and convenient platform
                    for making
                    their purchases. With its advanced features, Adulis provides a secure environment for all
                    transactions while
                    facilitating quick and hassle-free delivery.
                </p>
            </div>
            <div class="col col-1">
                <p class="footer-title">Important Links</p>
                <ul>
                    <li><a href="">Login</a></li>
                    <li><a href="">Sign Up</a></li>
                    <li><a href="">Terms of Service</a></li>
                    <li><a href="">Main Page</a></li>
                </ul>
            </div>
            <div class="col col-2">
                <p class="footer-title">Contact Us</p>
                <ul>
                    <li><a href="tel:"><i class="fa fa-mobile" aria-hidden="true"></i>
                            &nbsp;&nbsp;+251 911 121314</a></li>
                    <li><a href="mailto:"><i class="fa fa-envelope" aria-hidden="true"></i>
                            &nbsp;&nbsp;contact@adulis.com</a></li>
                    <li><a href="" target="_blank"><i class="fa fa-map-marker" aria-hidden="true"></i>
                            &nbsp;&nbsp;Around Addis Ababa</a></li>
                </ul>
            </div>
        </div>
    </footer>
    <script>
        let menustate = false;

        function toggler() {
            if (menustate === false) {
                document.getElementById("mobmen").style.display = "flex";
                menustate = true;
            } else {
                document.getElementById("mobmen").style.display = "none";
                menustate = false;
            }
        }
    </script>
</body>

</html>