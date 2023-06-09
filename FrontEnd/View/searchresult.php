<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <title>Search Result</title>
</head>

<body>
    <?php
        require_once  '../Components/header.php';
    ?>
    <main>
        <div class="search-container">
            <?php 
                 $search_query = $_POST['search'];
            ?>
            <p class="search-title">Results For <?=$search_query?> ...</p>
            <div class="sort-choice">
                <form action="">
                    <p class="sort-desc">Sort By</p>
                    <div class="sort-option-area">
                        <input type="radio" name="search" id="sort-price">
                        <label for="sort-price">Price</label>
                        <input type="radio" name="search" id="sort-rate">
                        <label for="sort-rate">Rating</label>
                    </div>
                </form>
            </div>
            <div class="search-wrapper">
                <div class="search-result">
                    <img src="../Assets/img/iph.jpg" alt="">
                    <p class="pr-name">iPhone 14 Pro Max</p>
                    <p class="rating"><span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span><span>(300)</span>
                    </p>
                    <p class="price">1000 Birr</p>
                </div>

                <div class="search-result">
                    <img src="../Assets/img/iph.jpg" alt="">
                    <p class="pr-name">iPhone 14 Pro Max</p>
                    <p class="rating"><span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span><span>(300)</span>
                    </p>
                    <p class="price">1000 Birr</p>
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
</body>

</html>