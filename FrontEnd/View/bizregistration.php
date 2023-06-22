<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="icon" href="../Assets/img/adulislogo1000.png">
    <title>Business Registration</title>
</head>

<body>
    <main>
        <div class="reg-container">
            <div class="col col-1">
                <p class="reg-title">Sign Up</p>
                <p class="reg-subtitle">Shop Smart, Save Time, Discover Endless Possibilities</p>
                <div class="signup-container">
                    <form action="" method="POST">
                        <input type="text" name="fname" id="fname" placeholder="First Name" required>
                        <input type="text" name="lname" id="lname" placeholder="Last Name" required>
                        <input type="text" name="biz_name" id="lname" placeholder="Business Name" required>
                        <input type="tel" name="phonenumber" id="phonenumber" placeholder="Phone Number" required>
                        <input type="email" name="email" id="email" placeholder="E-mail" required>
                        <input type="text" name="address" id="address" placeholder="Address" required>
                        <input type="password" name="password" id="password" placeholder="Password" required>
                        <input type="password" name="confirm_password" id="confirm_password"
                            placeholder="Confirm Password" required>
                        <input type="submit" name="submit" value="Sign Up &#8594" class="submit">
                        <?php
                        require_once 'inputcleaner.php';
                        require '../../BackEnd/Seller.php';
                        if (isset($_POST['submit'])) {
                            $firstname = input_cleaner($_POST['fname']);
                            $lastname = input_cleaner($_POST['lname']);
                            $biz_name = input_cleaner($_POST['biz_name']);
                            $phnumber = input_cleaner($_POST['phonenumber']);
                            $email = input_cleaner($_POST['email']);
                            $address = input_cleaner($_POST['address']);
                            $password = $_POST['password'];
                            $conpassword = $_POST['confirm_password'];
                            $role = "seller";
                            if (validateEmail($email)) {
                                if ($password != $conpassword) {
                                    echo "Password Don't Match!";
                                } else {
                                    if (validatePassword($password)) {
                                        $password = hash("sha256", $password);
                                        Seller::registerbiz($firstname, $lastname, $phnumber, $email, $address, $password, $biz_name,$role);
                                    }else{
                                        echo 'Password must be atleast 8 characters.';
                                    }
                                }
                            } else {
                                echo 'Invalid Email';
                            }
                        }
                        ?>
                    </form>
                    <div class="additional-options">
                        <p>Already have an account?&nbsp;&nbsp;<a href="./login.php">Sign in</a></p>
                        <p>Customer Registration?&nbsp;&nbsp;<a href="./registration.php">Click here</a></p>
                    </div>
                </div>
            </div>
            <div class="col col-2"></div>

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
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>