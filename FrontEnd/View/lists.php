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
  <link rel="icon" href="../Assets/img/adulislogo1000.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
  <title>Adulis | Ethiopian Ecommerce Website</title>
</head>

<body>
  <?php
  require_once '../Components/header.php';
  ?>
  <main>
    <?php
    $listing_type = $_GET['cat'];
    $listing = "";
    $res = "";
    switch ($listing_type) {
      case 1:
        $listing = "Phone & Tablets";
        $res = User::getProducts("Phone n Tablets");
        break;
      case 2:
        $listing = "TV & Monitors";
        $res = User::getProducts("TV n Monitors");
        break;
      case 3:
        $listing = "Desktop & Laptop Computers";
        $res = User::getProducts("Desktop n Laptop Computers");
        break;
      case 4:
        $listing = "Accessories";
        $res = User::getProducts("Accessories");
        break;
      case 5:
        $listing = "Shoes";
        $res = User::getProducts("Shoes");
        break;
      case 6:
        $listing = "Books";
        $res = User::getProducts("Books");
        break;
      case 7:
        $listing = "Personal Care & Beauty";
        $res = User::getProducts("Personal Care n Beauty");
        break;
      case 8:
        $listing = "Top Rated Items";
        $res = User::topRated();
        break;
      case 9:
        $listing = "Unsorted Items";
        $res = User::getProducts("Unsorted");
        break;
      default:
        header('location: index.php');
        break;
    }
    ?>
    <p class="list-title">
      <?= $listing; ?> &nbsp;&nbsp;&nbsp;
    </p>


    <div class="list-container list-container-grid">
      <?php
      while ($row = $res->fetch_assoc()) {
        echo '<div class="swiper-slide">
              <div class="item-desc">
              <img src="' . $row['url'] . '"alt="item" class="item-img">
              <div class="desc-sec">
                <div class="row-1">
                <a href="detail.php?itemid=' . $row['product_id'] . '"><p class="title">' . $row['product_name'] . '</p></a>
                  <p class="price">' . $row['price'] . '</p>
                </div>
                <div class="row-2">
                    <p class="desc">' . $row['main_description'] . '</p>
                    <p class="rating">';
        $rating = $row['rating'];
        for ($i = 1; $i <= 5; $i++) {
          if ($i <= $rating) {
            echo '<span class="fa fa-star checked"></span>';
          } else {
            echo '<span class="fa fa-star"></span>';
          }
        }
        echo '</span><span>(300)</span>
                    </p>
                    <a href="../../BackEnd/Services/cartprocessor.php?request=add&item=' . $row['product_id'] . '" class="btn-addcart">Add to Cart</a>
                </div>
                  </div>
                </div>
                </div>';
      }
      ?>
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