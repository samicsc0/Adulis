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

    <div class="mobile-header">
      <img src="../Assets/img/adulislogo1000.png" alt="">
      <a onclick="toggler()"><i class="fa fa-bars toggle-btn" aria-hidden="true"></i></a>
    </div>
    <div class="content-mobile-header" id="mobmen">
      <a href="http://">Categories</a>
      <a href="http://">New Items</a>
      <a href="">My Wish List</a>
      <div class="search-bar">
        <input type="text" name="search" id="searchbox" placeholder="Search Products">
        <a href=""><i class="fa fa-search search-btn" aria-hidden="true"></i></a>
      </div>
      <a href=""><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp; Cart</a>
      <a href=""><i class="fa fa-user" aria-hidden="true"></i>&nbsp; Profile</a>
    </div>
  </header>
  <main>
    <div class="swiper mySwiper banner">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <img src="../Assets/img/phonebanner-1.jpg" alt="" class="swiper-img">
        </div>
        <div class="swiper-slide">
          <img src="../Assets/img/accessories.png" alt="" class="swiper-img">
        </div>
        <div class="swiper-slide">
          <img src="../Assets/img/bookbanner.png" alt="" class="swiper-img">
        </div>
        <div class="swiper-slide">
          <img src="../Assets/img/laptopbanner.jpg" alt="" class="swiper-img">
        </div>
        <div class="swiper-slide">
          <img src="../Assets/img/shoes banner.jpg" alt="" class="swiper-img">
        </div>
        <div class="swiper-slide">
          <img src="../Assets/img/tvbanner.jpg" alt="" class="swiper-img">
        </div>
        <div class="swiper-slide">
          <img src="../Assets/img/" alt="" class="swiper-img">
        </div>
      </div>
      <div class="swiper-pagination"></div>
    </div>

    <div class="phone-sec list-sec">
      <p class="sec-title">Phone & Tablets &nbsp;&nbsp;&nbsp;<a href="./lists.php?sender=first"><i
            class="fa fa-arrow-right" aria-hidden="true"></i>
        </a>
      </p>

      <div class="swiper mySwipersec items-slider">
        <div class="swiper-wrapper">
          <div class="swiper-slide">

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
          <div class="swiper-slide">
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
          <div class="swiper-slide">
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
          <div class="swiper-slide">
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
          <div class="swiper-slide">
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
        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>

    <!---->

    <div class="phone-sec list-sec">
      <p class="sec-title">TV & Monitors &nbsp;&nbsp;&nbsp;<a href="./lists.php?sender=second"><i
            class="fa fa-arrow-right" aria-hidden="true"></i>
        </a>
      </p>

      <div class="swiper mySwipersec items-slider">
        <div class="swiper-wrapper">
          <div class="swiper-slide">

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
          <div class="swiper-slide">
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
          <div class="swiper-slide">
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
          <div class="swiper-slide">
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
          <div class="swiper-slide">
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
        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
    <!---->

    <div class="phone-sec list-sec">
      <p class="sec-title">Desktop & Laptop Computers &nbsp;&nbsp;&nbsp;<a href="./lists.php?sender=third"><i
            class="fa fa-arrow-right" aria-hidden="true"></i>
        </a>
      </p>

      <div class="swiper mySwipersec items-slider">
        <div class="swiper-wrapper">
          <div class="swiper-slide">

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
          <div class="swiper-slide">
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
          <div class="swiper-slide">
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
          <div class="swiper-slide">
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
          <div class="swiper-slide">
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
        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
    <!---->

    <div class="phone-sec list-sec">
      <p class="sec-title">Accessories &nbsp;&nbsp;&nbsp;<a href="./lists.php?sender=fourth"><i
            class="fa fa-arrow-right" aria-hidden="true"></i>
        </a>
      </p>

      <div class="swiper mySwipersec items-slider">
        <div class="swiper-wrapper">
          <div class="swiper-slide">

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
          <div class="swiper-slide">
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
          <div class="swiper-slide">
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
          <div class="swiper-slide">
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
          <div class="swiper-slide">
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
        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
    <!---->

    <div class="phone-sec list-sec">
      <p class="sec-title">Shoes &nbsp;&nbsp;&nbsp;<a href="./lists.php?sender=fifth"><i class="fa fa-arrow-right"
            aria-hidden="true"></i>
        </a>
      </p>

      <div class="swiper mySwipersec items-slider">
        <div class="swiper-wrapper">
          <div class="swiper-slide">

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
          <div class="swiper-slide">
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
          <div class="swiper-slide">
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
          <div class="swiper-slide">
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
          <div class="swiper-slide">
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
        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
    <!---->

    <div class="phone-sec list-sec">
      <p class="sec-title">Books &nbsp;&nbsp;&nbsp;<a href="./lists.php?sender=sixth"><i class="fa fa-arrow-right"
            aria-hidden="true"></i>
        </a>
      </p>

      <div class="swiper mySwipersec items-slider">
        <div class="swiper-wrapper">
          <div class="swiper-slide">

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
          <div class="swiper-slide">
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
          <div class="swiper-slide">
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
          <div class="swiper-slide">
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
          <div class="swiper-slide">
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
        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
    <!---->

    <div class="phone-sec list-sec">
      <p class="sec-title">Personal Care & Beauty&nbsp;&nbsp;&nbsp;<a href="./lists.php?sender=seventh"><i
            class="fa fa-arrow-right" aria-hidden="true"></i>
        </a>
      </p>

      <div class="swiper mySwipersec items-slider">
        <div class="swiper-wrapper">
          <div class="swiper-slide">

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
          <div class="swiper-slide">
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
          <div class="swiper-slide">
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
          <div class="swiper-slide">
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
          <div class="swiper-slide">
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
        985:{
      slidesPerView: 3,
      spaceBetween: 30,
        },
        500:{
      slidesPerView: 2,
      spaceBetween: 20,
        },
        100:{
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