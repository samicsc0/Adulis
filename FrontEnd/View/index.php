<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
  <title>Adulis | Ethiopian Ecommerce Website</title>
</head>

<body>
  <?php
    require_once '../../BackEnd/Session/usersession.php';
    require_once '../Components/header.php'; 
    require_once '../../BackEnd/User.php';
    require_once '../../BackEnd/Cart.php';
    $user = new User($_SESSION['customer_id'],$_SESSION['email']);
  ?>
  <main>
    <div class="swiper mySwiper banner">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <img src="../Assets/img/Computer.png" alt="" class="swiper-img">
        </div>
        <div class="swiper-slide">
          <img src="../Assets/img/Mobile.png" alt="" class="swiper-img">
        </div>
        <div class="swiper-slide">
          <img src="../Assets/img/Accessories.png" alt="" class="swiper-img">
        </div>
        <div class="swiper-slide">
          <img src="../Assets/img/Shoe.png" alt="" class="swiper-img">
        </div>
        <div class="swiper-slide">
          <img src="../Assets/img/Book's.png" alt="" class="swiper-img">
        </div>
        <div class="swiper-slide">
          <img src="../Assets/img/Care and Beauty.png" alt="" class="swiper-img">
        </div>
      </div>
      <div class="swiper-pagination"></div>
    </div>

    <div class="phone-sec list-sec">
      <p class="sec-title">Phone & Tablets &nbsp;&nbsp;&nbsp;<a href="./lists.php?cat=1"><i
            class="fa fa-arrow-right" aria-hidden="true"></i>
        </a>
      </p>

      <div class="swiper mySwipersec items-slider">
        <div class="swiper-wrapper">


          <?php
          require '../../BackEnd/config.php';
          $sql = "SELECT p.product_id,p.product_name, p.price,p.main_description,p.rating, i.url FROM product AS p
            INNER JOIN(
                        SELECT product_id, url
                        FROM image
                        GROUP BY product_id
            ) AS i ON p.product_id = i.product_id
            WHERE cat = 'Phone n Tablets' AND p.stock > 1 AND p.active = 1 ORDER BY p.product_id DESC LIMIT 10";
          $result = mysqli_query($conn, $sql);
          while ($row = $result->fetch_assoc()) {
            echo '<div class="swiper-slide">
              <div class="item-desc">
              <img src="' . $row['url'] . '"alt="item" class="item-img">
              <div class="desc-sec">
                <div class="row-1">
                  <p class="title">' . $row['product_name'] . '</p>
                  <p class="price">' . $row['price'] . ' Birr</p>
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
        <div class="swiper-pagination"></div>
      </div>

    </div>



    <div class="phone-sec list-sec">
      <p class="sec-title">TV & Monitors &nbsp;&nbsp;&nbsp;<a href="./lists.php?cat=2"><i
            class="fa fa-arrow-right" aria-hidden="true"></i>
        </a>
      </p>

      <div class="swiper mySwipersec items-slider">
        <div class="swiper-wrapper">
          <?php
          require '../../BackEnd/config.php';
          $sql = "SELECT p.product_id,p.product_name, p.price,p.main_description,p.rating, i.url FROM product AS p
            INNER JOIN(
                        SELECT product_id, url
                        FROM image
                        GROUP BY product_id
            ) AS i ON p.product_id = i.product_id
            WHERE cat = 'TV n Monitors' AND p.stock > 1 AND p.active = 1 ORDER BY p.product_id DESC LIMIT 10";
          $result = mysqli_query($conn, $sql);
          while ($row = $result->fetch_assoc()) {
            echo '<div class="swiper-slide">
              <div class="item-desc">
              <img src="' . $row['url'] . '"alt="item" class="item-img">
              <div class="desc-sec">
                <div class="row-1">
                  <p class="title">' . $row['product_name'] . '</p>
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
                    <a href="' . $row['product_id'] . '" class="btn-addcart">Add to Cart</a>
                </div>
                  </div>
                </div>
                </div>';
          }
          ?>
        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>

    <div class="phone-sec list-sec">
      <p class="sec-title">Desktop & Laptop Computers &nbsp;&nbsp;&nbsp;<a href="./lists.php?cat=3"><i
            class="fa fa-arrow-right" aria-hidden="true"></i>
        </a>
      </p>

      <div class="swiper mySwipersec items-slider">
        <div class="swiper-wrapper">

          <?php
          require '../../BackEnd/config.php';
          $sql = "SELECT p.product_id,p.product_name, p.price,p.main_description,p.rating, i.url FROM product AS p
            INNER JOIN(
                        SELECT product_id, url
                        FROM image
                        GROUP BY product_id
            ) AS i ON p.product_id = i.product_id
            WHERE cat = 'Desktop n Laptop Computers' AND p.stock > 1 AND p.active = 1 ORDER BY p.product_id DESC LIMIT 10";
          $result = mysqli_query($conn, $sql);
          while ($row = $result->fetch_assoc()) {
            echo '<div class="swiper-slide">
              <div class="item-desc">
              <img src="' . $row['url'] . '"alt="item" class="item-img">
              <div class="desc-sec">
                <div class="row-1">
                  <p class="title">' . $row['product_name'] . '</p>
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
                    <a href="' . $row['product_id'] . '" class="btn-addcart">Add to Cart</a>
                </div>
                  </div>
                </div>
                </div>';
          }
          ?>


        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>

    <div class="phone-sec list-sec">
      <p class="sec-title">Accessories &nbsp;&nbsp;&nbsp;<a href="./lists.php?cat=4"><i
            class="fa fa-arrow-right" aria-hidden="true"></i>
        </a>
      </p>

      <div class="swiper mySwipersec items-slider">
        <div class="swiper-wrapper">

          <?php
          require '../../BackEnd/config.php';
          $sql = "SELECT p.product_id,p.product_name, p.price,p.main_description,p.rating, i.url FROM product AS p
            INNER JOIN(
                        SELECT product_id, url
                        FROM image
                        GROUP BY product_id
            ) AS i ON p.product_id = i.product_id
            WHERE cat = 'Accessories' AND p.stock > 1 AND p.active = 1 ORDER BY p.product_id DESC LIMIT 10";
          $result = mysqli_query($conn, $sql);
          while ($row = $result->fetch_assoc()) {
            echo '<div class="swiper-slide">
              <div class="item-desc">
              <img src="' . $row['url'] . '"alt="item" class="item-img">
              <div class="desc-sec">
                <div class="row-1">
                  <p class="title">' . $row['product_name'] . '</p>
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
                    <a href="' . $row['product_id'] . '" class="btn-addcart">Add to Cart</a>
                </div>
                  </div>
                </div>
                </div>';
          }
          ?>


        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
    <!---->

    <div class="phone-sec list-sec">
      <p class="sec-title">Shoes &nbsp;&nbsp;&nbsp;<a href="./lists.php?cat=5"><i class="fa fa-arrow-right"
            aria-hidden="true"></i>
        </a>
      </p>

      <div class="swiper mySwipersec items-slider">
        <div class="swiper-wrapper">
          <?php
          require '../../BackEnd/config.php';
          $sql = "SELECT p.product_id,p.product_name, p.price,p.main_description,p.rating, i.url FROM product AS p
            INNER JOIN(
                        SELECT product_id, url
                        FROM image
                        GROUP BY product_id
            ) AS i ON p.product_id = i.product_id
            WHERE cat = 'Shoes' AND p.stock > 1 AND p.active = 1 ORDER BY p.product_id DESC LIMIT 10";
          $result = mysqli_query($conn, $sql);
          while ($row = $result->fetch_assoc()) {
            echo '<div class="swiper-slide">
              <div class="item-desc">
              <img src="' . $row['url'] . '"alt="item" class="item-img">
              <div class="desc-sec">
                <div class="row-1">
                  <p class="title">' . $row['product_name'] . '</p>
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
                    <a href="' . $row['product_id'] . '" class="btn-addcart">Add to Cart</a>
                </div>
                  </div>
                </div>
                </div>';
          }
          ?>
        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
    <!---->

    <div class="phone-sec list-sec">
      <p class="sec-title">Books &nbsp;&nbsp;&nbsp;<a href="./lists.php?cat=6"><i class="fa fa-arrow-right"
            aria-hidden="true"></i>
        </a>
      </p>

      <div class="swiper mySwipersec items-slider">
        <div class="swiper-wrapper">
          <?php
          require '../../BackEnd/config.php';
          $sql = "SELECT p.product_id,p.product_name, p.price,p.main_description,p.rating, i.url FROM product AS p
            INNER JOIN(
                        SELECT product_id, url
                        FROM image
                        GROUP BY product_id
            ) AS i ON p.product_id = i.product_id
            WHERE cat = 'Books' AND p.stock > 1 AND p.active = 1 ORDER BY p.product_id DESC LIMIT 10";
          $result = mysqli_query($conn, $sql);
          while ($row = $result->fetch_assoc()) {
            echo '<div class="swiper-slide">
              <div class="item-desc">
              <img src="' . $row['url'] . '"alt="item" class="item-img">
              <div class="desc-sec">
                <div class="row-1">
                  <p class="title">' . $row['product_name'] . '</p>
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
                    <a href="' . $row['product_id'] . '" class="btn-addcart">Add to Cart</a>
                </div>
                  </div>
                </div>
                </div>';
          }
          ?>
        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
    <!---->

    <div class="phone-sec list-sec">
      <p class="sec-title">Personal Care & Beauty&nbsp;&nbsp;&nbsp;<a href="./lists.php?cat=7"><i
            class="fa fa-arrow-right" aria-hidden="true"></i>
        </a>
      </p>

      <div class="swiper mySwipersec items-slider">
        <div class="swiper-wrapper">
          <?php
          require '../../BackEnd/config.php';
          $sql = "SELECT p.product_id,p.product_name, p.price,p.main_description,p.rating, i.url FROM product AS p
            INNER JOIN(
                        SELECT product_id, url
                        FROM image
                        GROUP BY product_id
            ) AS i ON p.product_id = i.product_id
            WHERE cat = 'Personal Care n Beauty' AND p.stock > 1 AND p.active = 1 ORDER BY p.product_id DESC LIMIT 10";
          $result = mysqli_query($conn, $sql);
          while ($row = $result->fetch_assoc()) {
            echo '<div class="swiper-slide">
              <div class="item-desc">
              <img src="' . $row['url'] . '"alt="item" class="item-img">
              <div class="desc-sec">
                <div class="row-1">
                  <p class="title">' . $row['product_name'] . '</p>
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
                    <a href="' . $row['product_id'] . '" class="btn-addcart">Add to Cart</a>
                </div>
                  </div>
                </div>
                </div>';
          }
          ?>
        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
    <!---->

    <div class="phone-sec list-sec">
      <p class="sec-title">Unsorted Items&nbsp;&nbsp;&nbsp;<a href="./lists.php?cat=9"><i
            class="fa fa-arrow-right" aria-hidden="true"></i>
        </a>
      </p>

      <div class="swiper mySwipersec items-slider">
        <div class="swiper-wrapper">
          <?php
          require '../../BackEnd/config.php';
          $sql = "SELECT p.product_id,p.product_name, p.price,p.main_description,p.rating, i.url FROM product AS p
            INNER JOIN(
                        SELECT product_id, url
                        FROM image
                        GROUP BY product_id
            ) AS i ON p.product_id = i.product_id
            WHERE cat = 'Unsorted' AND p.stock > 1 AND p.active = 1 ORDER BY p.product_id DESC LIMIT 10";
          $result = mysqli_query($conn, $sql);
          while ($row = $result->fetch_assoc()) {
            echo '<div class="swiper-slide">
              <div class="item-desc">
              <img src="' . $row['url'] . '"alt="item" class="item-img">
              <div class="desc-sec">
                <div class="row-1">
                  <p class="title">' . $row['product_name'] . '</p>
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
                    <a href="' . $row['product_id'] . '" class="btn-addcart">Add to Cart</a>
                </div>
                  </div>
                </div>
                </div>';
          }
          ?>
        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </main>
  <footer>
    <div class="foot-container">
      <div class="col col-1">
        <p class="footer-title">Adulis Ecommerce Platform</p>
        <p class="footer-desc">
          Adulis is an e-commerce platform designed to give online shopping a seamless experience, providing sellers
          with an efficient way to showcase their products and buyers with a reliable and convenient platform for making
          their purchases. With its advanced features, Adulis provides a secure environment for all transactions while
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


    /* Swiper js for the home page slide show */

    var swiper = new Swiper(".mySwiper", {
      autoplay: {
        delay: 3000,
        disableOnInteraction: false
      },
      pagination: {
        el: ".swiper-pagination",
      },
    });

    /* Swiper for featured items*/
    var secswiper = new Swiper(".mySwipersec", {
      breakpoints: {
        985: {
          slidesPerView: 3,
          spaceBetween: 30,
        },
        500: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        100: {
          slidesPerView: 1,
          spaceBetween: 10
        }
      },
      freeMode: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
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