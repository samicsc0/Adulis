<?php
require '../../BackEnd/User.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=eocuge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <title>Profile Page</title>
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
        <div class="pro-container">
            <p class="profile-title">Profile</p>
            <div class="horizontal-ruler"></div>
            <div class="pro-wrapper">
                <div class="col-1">
                    <a onclick="select('his-btn','row-1')" id="his-btn" class="selected">History</a>
                    <a onclick="select('pro-btn','row-2')" id="pro-btn">Edit Profile</a>
                    <a onclick="select('pass-btn','row-3')" id="pass-btn">Change Password</a>
                    <a href="contact.php">Contact Adminstrator</a>
                    <a href="">Logout</a>
                </div>
                <div class="col-2">
                    <div class="history" id="row-1">
                        <div class="hist-row">
                            <p class="title">iPhone 14 pro</p>
                            <p class="price">1000 Birr</p>
                            <p class="cart-id">Status</p>
                            <p class="rate-btn">Mark as Delivered</p>
                            <p class="rate-btn">Rate Product</p>
                        </div>
                    </div>
                    <div class="edit-profile" id="row-2">
                        <!-- Retriving data from the database -->
                        <?php
                        $id = 31;
                        $usrResult = User::getUserInfo($id);
                        $row = $usrResult->fetch_assoc();
                        ?>
                        <form action="" method="POST">
                            <input type="text" name="firstname" id="" placeholder="First Name"
                                value="<?= $row['first_name']; ?>" required>
                            <input type="text" name="lastname" id="" placeholder="Last Name"
                                value="<?= $row['last_name']; ?>" required>
                            <input type="email" name="email" id="" placeholder="Email" value="<?= $row['email']; ?>"
                                required>
                            <input type="number" name="phnumber" id="" placeholder="Phone Number"
                                value="<?= $row['phone_number']; ?>" required>
                            <input type="text" name="address" id="" placeholder="Address"
                                value="<?= $row['address']; ?>" required>
                            <a href="">Locate Me</a>
                            <input type="submit" name="submit-1" value="Update">
                            <?php
                            if (isset($_POST['submit-1'])) {
                                require_once 'inputcleaner.php';
                                $fn = input_cleaner($_POST['firstname']);
                                $ln = input_cleaner($_POST['lastname']);
                                $email = input_cleaner($_POST['email']);
                                $phnum = input_cleaner($_POST['phnumber']);
                                $add = input_cleaner($_POST['address']);
                                User::updateInfo($id, $fn, $ln, $email, $phnum, $add);
                            }
                            ?>
                        </form>
                    </div>

                    <div class="row password" id="row-3">
                        <form action="" method="POST">
                            <input type="password" name="oldpass" id="" placeholder="Old Password" required>
                            <input type="password" name="newpass" id="" placeholder="New Password" required>
                            <input type="password" name="conpass" id="" placeholder="Confirm Password" required>
                            <input type="submit" name="submit-2" value="Update">
                            <?php
                            if (isset($_POST['submit-2'])) {
                                $oldPass = $_POST['oldpass'];
                                $newPass = $_POST['newpass'];
                                $conPass = $_POST['conpass'];
                                if ($newPass != $conPass) {
                                    echo "Password don't match!";
                                } else {
                                    $newPass = hash('sha256', $newPass);
                                    User::updatePassword($id, $oldPass, $newPass);
                                }
                            }
                            ?>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </main>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
        function disableAll() {
            document.getElementById('row-1').style.display = 'none';
            document.getElementById('row-2').style.display = 'none';
            document.getElementById('row-3').style.display = 'none';
            document.getElementById('his-btn').style.backgroundColor = "white";
            document.getElementById('pro-btn').style.backgroundColor = "white";
            document.getElementById('pass-btn').style.backgroundColor = "white";
        }
        function select(opt, targ) {
            disableAll();
            document.getElementById(opt).style.backgroundColor = "#00000027";
            document.getElementById(targ).style.display = "block";
        }
    </script>
</body>

</html>