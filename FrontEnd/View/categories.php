<!DOCTYPE html>
<html lang="en">
<?php
require_once '../../BackEnd/User.php';
if (isset($_SESSION['customer_id']) && isset($_SESSION['email'])) {
    $user = new User($_SESSION['customer_id'], $_SESSION['email']);
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="icon" href="../Assets/img/adulislogo1000.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
</head>

<body>
    <?php
    require_once '../Components/header.php';
    ?>
    <main>
        <div class="cat-container">
            <p class="cat-title">Categories</p>
            <div class="cat-wrapper">
                <div class="cat-detail">
                    <img src="../Assets/img/iph.jpg" alt="">
                    <a href="lists.php?cat=1" class="product-cat">Phones & Tablets</a>
                </div>
                <div class="cat-detail">
                    <img src="../Assets/img/tv.jpg" alt="">
                    <a href="lists.php?cat=2" class="product-cat">TV & Monitors</a>
                </div>
                <div class="cat-detail">
                    <img src="../Assets/img/desktop.jpg" alt="">
                    <a href="lists.php?cat=3" class="product-cat">Desktop & Laptop Computers</a>
                </div>
                <div class="cat-detail">
                    <img src="../Assets/img/access.jpg" alt="">
                    <a href="lists.php?cat=4" class="product-cat">Accessories</a>
                </div>
                <div class="cat-detail">
                    <img src="../Assets/img/shoe.jpg" alt="">
                    <a href="lists.php?cat=5" class="product-cat">Shoes</a>
                </div>
                <div class="cat-detail">
                    <img src="../Assets/img/books.jpg" alt="">
                    <a href="lists.php?cat=6" class="product-cat">Books</a>
                </div>
                <div class="cat-detail">
                    <img src="../Assets/img/beauty.jpg" alt="">
                    <a href="lists.php?cat=7" class="product-cat">Personal Care & Beauty</a>
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