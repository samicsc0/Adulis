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
    <link href="">
</head>

<body>
    <header>
        <div class="header">
            <div class="logo">
                <img src="../Assets/img/adulislogo1000.png" alt="Adulis Logo">
            </div>
            <div class="options">
                <a href="http://">Categories</a>
                <a href="http://">New Items</a>
                <a href="">My Wish List</a>
                <div class="search-bar">
                    <input type="text" name="search" id="searchbox" placeholder="Search Products">
                    <a href=""><i class="fa fa-search search-btn" aria-hidden="true"></i></a>
                </div>
                <a href=""><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                <a href=""><i class="fa fa-user" aria-hidden="true"></i></a>
            </div>
        </div>
    </header>
    <main>
        <?php
        $listing_type = $_GET['sender'];
        $listing = "";
        switch ($listing_type) {
            case 'first':
                $listing = "Phone & Tablets";
                break;
            case 'second':
                $listing = "TV & Monitors";
                break;
            case 'third':
                $listing = "Desktop & Laptop Computers";
                break;
            case 'fourth':
                $listing = "Accessories";
                break;
            case 'fifth':
                $listing = "Shoes";
                break;
            case 'sixth':
                $listing = "Books";
                break;
            case 'seventh':
                $listing = "Personal Care & Beauty";
                break;
            default:
                $listing = "";
                break;
        }
        ?>
        <p class="list-title"><?=$listing; ?> &nbsp;&nbsp;&nbsp;
        </p>


        <div class="list-container list-container-grid">
        <div class="item-desc">
              <img src="../Assets/img/iph.jpg" alt="item" class="item-img">
              <div class="desc-sec">
                <div class="row-1">
                  <p class="title">iPhone 14 Pro</p>
                  <p class="price">1000 Birr</p>
                </div>
                <div class="row-2">
                  <p class="desc">Unmatched performance, and sleek design that fits comfortably in your hand.</p>
                  <p class="rating"><span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span><span>(300)</span>
                  </p>
                  <a href="" class="btn-addcart">Add to Cart</a>
                </div>
              </div>
            </div>
        <div class="item-desc">
              <img src="../Assets/img/iph.jpg" alt="item" class="item-img">
              <div class="desc-sec">
                <div class="row-1">
                  <p class="title">iPhone 14 Pro</p>
                  <p class="price">1000 Birr</p>
                </div>
                <div class="row-2">
                  <p class="desc">Unmatched performance, and sleek design that fits comfortably in your hand.</p>
                  <p class="rating"><span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span><span>(300)</span>
                  </p>
                  <a href="" class="btn-addcart">Add to Cart</a>
                </div>
              </div>
            </div>
        <div class="item-desc">
              <img src="../Assets/img/iph.jpg" alt="item" class="item-img">
              <div class="desc-sec">
                <div class="row-1">
                  <p class="title">iPhone 14 Pro</p>
                  <p class="price">1000 Birr</p>
                </div>
                <div class="row-2">
                  <p class="desc">Unmatched performance, and sleek design that fits comfortably in your hand.</p>
                  <p class="rating"><span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span><span>(300)</span>
                  </p>
                  <a href="" class="btn-addcart">Add to Cart</a>
                </div>
              </div>
            </div>
        <div class="item-desc">
              <img src="../Assets/img/iph.jpg" alt="item" class="item-img">
              <div class="desc-sec">
                <div class="row-1">
                  <p class="title">iPhone 14 Pro</p>
                  <p class="price">1000 Birr</p>
                </div>
                <div class="row-2">
                  <p class="desc">Unmatched performance, and sleek design that fits comfortably in your hand.</p>
                  <p class="rating"><span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span><span>(300)</span>
                  </p>
                  <a href="" class="btn-addcart">Add to Cart</a>
                </div>
              </div>
            </div>
        </div>
    </main>
</body>

</html>