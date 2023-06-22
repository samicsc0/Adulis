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
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="icon" href="../Assets/img/adulislogo1000.png">
    <title>Search Result</title>
</head>

<body>
    <?php
    require_once '../Components/header.php';
    ?>
    <main>
        <div class="search-container">
            <?php
            require 'inputcleaner.php';
            $search_query = input_cleaner($_GET['search']);
            $srt = '';
            if (isset($_GET['srt'])) {
                $srt = $_GET['srt'];
            }
            $res = User::search($search_query, $srt);
            ?>
            <p class="search-title">Results for
                <?= $search_query ?> ...
            </p>
            <div class="sort-choice">
                <form action="" id="sort-form" method="POST">
                    <p class="sort-desc">Sort By</p>
                    <div class="sort-option-area">
                        <input type="radio" name="search" id="sort-price" value="price">
                        <label for="sort-price">Price</label>
                        <input type="radio" name="search" id="sort-rate" value="rate">
                        <label for="sort-rate">Rating</label>
                    </div>
                </form>
            </div>
            <div class="search-wrapper">
                <?php
                if (mysqli_num_rows($res) > 0) {
                    while ($row = $res->fetch_assoc()) {
                        echo '<div class="search-result">
                    <img src="' . $row['url'] . '" alt="">
                    <a href="detail.php?itemid=' . $row['product_id'] . '"><p class="pr-name">' . $row['product_name'] . '</p></a>
                    <p class="rating">';
                        $rating = $row['rating'];
                        for ($i = 1; $i <= 5; $i++) {
                            if ($i <= $rating) {
                                echo '<span class="fa fa-star checked"></span>';
                            } else {
                                echo '<span class="fa fa-star"></span>';
                            }
                        }
                        echo '</p>
                    <p class="price">' . $row['price'] . ' Birr</p>
                    </div>';
                    }
                } else {
                    echo '<p>No matching product found.</p>';
                }
                ?>
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
    <?php
echo "<script>
    var sortForm = document.getElementById('sort-form');
    var radioButtons = sortForm.querySelectorAll('input[name=\"search\"]');
    radioButtons.forEach(function(radioButton) {
        radioButton.addEventListener('click', function(event) {
            var selectedOption = event.target.value;
            var searchQuery = '" . $search_query . "';
            var url;
            if (selectedOption === 'rate') {
                url = 'searchresult.php?search=' + searchQuery + '&srt=rate';
            } else if(selectedOption === 'price') {
                url = 'searchresult.php?search=' + searchQuery + '&srt=price';
            }
            window.location.href = url;
        });
    });
</script>";
?>

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