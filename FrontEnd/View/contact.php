<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if ($_SESSION['status'] == 'logged') {
  require_once '../../BackEnd/User.php';
  $user = new User($_SESSION['customer_id'], $_SESSION['email']);
} else {
  header('location: ../../FrontEnd/View/login.php');
}
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
  <title>Contact</title>
</head>

<body>
  <main>
    <div class="contact-container">
      <p class="contact-title">Reach Us For Any Complain...</p>
      <div class="contact-wrapper">
        <form action="" method='POST'>
          <input type="email" name="email" id="" placeholder="Email" required>
          <input type="text" name="message" id="" placeholder="Your Message Here..." required>
          <input type="submit" name='submit' value="Send &nbsp;&nbsp;&#8594;" class="Send">
          <?php
          require 'inputcleaner.php';
          if (isset($_POST['submit'])) {
            $email = input_cleaner($_POST['email']);
            $mess = input_cleaner($_POST['message']);
            $user->contactAdmin($email, $mess);
          }
          ?>
        </form>
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
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
</body>

</html>