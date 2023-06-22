<?php
require_once '../../BackEnd/Session/usersession.php';
require_once '../../BackEnd/User.php';
$user = new User($_SESSION['customer_id'],$_SESSION['email']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="icon" href="../Assets/img/adulislogo1000.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <title>Cart</title>
</head>

<body>
    <?php
    require_once '../Components/header.php';
    ?>
    <main>
        <div class="cart-container">
            <p class="cart-title">Your Cart</p>
            <div class="cart-wrapper">
                <?php
                require_once '../../BackEnd/Cart.php';
                $cart = new Cart($user->user_id);
                $res = $cart->getMyCart();
                while($row = $res->fetch_assoc()){
                    echo '<div class="cart-detail">
                    <img src="'.$row['url'].'"alt="">
                    <p class="product-name">'.$row['product_name'].'</p>
                    <div class="quantity-sec">
                        <a href="../../BackEnd/Services/cartprocessor.php?request=dec&item='.$row['item_id'].'" class="increase">&minus;</a>
                        <p class="quantity">'.$row['quantity'].'</p>
                        <a href="../../BackEnd/Services/cartprocessor.php?request=inc&item='.$row['item_id'].'" class="decrease">&plus;</a>
                    </div>
                    <p class="price">'.$row['price'].'</p>
                    <a href="../../BackEnd/Services/cartprocessor.php?request=rem&item='.$row['item_id'].'" class="remove-cart">&#10761;</a>
                </div>';
                }
                ?>
                <a href="checkout.php" class="checkout">Check Out</a>
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
        /* Menu Event Listener for mobile devices */
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