<header>
    <div class="header">
      <div class="logo">
        <img src="../Assets/img/adulislogo1000.png" alt="Adulis Logo">
      </div>
      <div class="options">
        <a href="categories.html">Categories</a>
        <a href="lists.php">Top Rated Items</a>
        <form class="search-bar" action="searchresult.php" method="POST">
          <input type="text" name="search" id="searchbox" placeholder="Search Products" required>
          <button type="submit" name="" id="" class="search-btn"><i class="fa fa-search" aria-hidden="true"></i></button>
          <!-- <a href="searchresult.php?search="><i class="fa fa-search search-btn" aria-hidden="true"></i></a> -->
        </form>
        <a href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
        <a href="profile.php"><i class="fa fa-user" aria-hidden="true"></i></a>
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