<?php
require_once '../../BackEnd/User.php';
if (isset($_SESSION['customer_id']) && isset($_SESSION['email'])) {
    $user = new User($_SESSION['customer_id'], $_SESSION['email']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="icon" href="../Assets/img/adulislogo1000.png">
    <link rel="stylesheet" href="../style/style.css">
    <title>Detail Page</title>
</head>

<body>
    <?php
    include '../Components/header.php';
    require '../../BackEnd/config.php';
    $prid = $_GET['itemid'];
    $sql_prdetail = "SELECT * FROM product WHERE product_id = $prid";
    $result_prdetail = mysqli_query($conn, $sql_prdetail);
    $row_prdetail = $result_prdetail->fetch_assoc();
    ?>
    <main>

        <div class="detailpg-container">
            <div class="top-option">

            </div>
            <div class="col col-1">
                <?php
                $sql_img = "SELECT * FROM image WHERE product_id = $prid ORDER BY id";
                $img_res = mysqli_query($conn, $sql_img);
                $imgs = array();
                $imgcounter = 0;
                while ($row = $img_res->fetch_assoc()) {
                    $imgs[$imgcounter] = $row['url'];
                    $imgcounter++;
                }
                ?>
                <div class="row-1">
                    <img src="<?= $imgs[0] ?>" alt="" id="main-img">
                </div>
                <div class="row-2">
                    <img src="<?= $imgs[0] ?>" alt="" onclick="setImage('<?= $imgs[0] ?>')">
                    <img src="<?= $imgs[1] ?>" alt="" onclick="setImage('<?= $imgs[1] ?>')">
                    <img src="<?= $imgs[2] ?>" alt="" onclick="setImage('<?= $imgs[2] ?>')">
                    <img src="<?= $imgs[3] ?>" alt="" onclick="setImage('<?= $imgs[3] ?>')">
                </div>
            </div>
            <div class="col col-2">
                <div class="row-1">
                    <p class="product-name">
                        <?= $row_prdetail['product_name']; ?>
                    </p>
                    <p class="product-price">
                        <?= $row_prdetail['price']; ?> Birr
                    </p>
                </div>
                <div class="row-2">
                    <p class="rating">
                        <?php
                        $rating = $row_prdetail['rating'];
                        for ($i = 1; $i <= 5; $i++) {
                            if ($i <= $rating) {
                                echo '<span class="fa fa-star checked"></span>';
                            } else {
                                echo '<span class="fa fa-star"></span>';
                            }
                            
                        }
                        echo "<span> (".User::getTotalRatings($prid).")</span>";
                        ?>
                    </p>
                </div>
                <div class="row-3">
                    <ul>
                        <?php
                        $sql_desc = "SELECT * FROM productdescription WHERE product_id = $prid";
                        $desc_res = mysqli_query($conn, $sql_desc);
                        while ($row = $desc_res->fetch_assoc()) {
                            echo "<li>" . $row['description'] . "</li>";
                        }
                        ?>
                    </ul>
                </div>
                <div class="row-4">
                    <a href="../../BackEnd/Services/cartprocessor.php?request=add&item=<?= $prid ?>"
                        class="btn-addcart">Add to Cart</a>
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
        function setImage(dir) {
            document.getElementById("main-img").src = dir;
        }
    </script>
</body>

</html>