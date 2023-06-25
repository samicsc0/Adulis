<?php
require_once '../../BackEnd/Session/usersession.php';
require_once '../../BackEnd/User.php';
$user = new User($_SESSION['customer_id'], $_SESSION['email']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=eocuge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="icon" href="../Assets/img/adulislogo1000.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <title>Profile Page</title>
</head>

<body>
    <?php
    require_once '../Components/header.php';
    ?>
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
                    <a href="../../BackEnd/Services/logout.php">Logout</a>
                </div>
                <div class="col-2">
                    <div class="history" id="row-1">
                        <?php
                        $hist_res = $user->getMyOrders();
                        while ($row = $hist_res->fetch_assoc()) {
                            echo '<div class="hist-row">
                                <p class="title">' . $row['product_name'] . '</p>
                                <p class="quan">' . $row['quantity'] . ' items</p>
                                <p class="price">' . $row['price'] . ' Birr</p>';
                                if($row['buyer_status'] == 0){
                                    echo '<a href="../../BackEnd/Services/deliveryupdate.php?id=' . $row['order_id'] . '" class="rate-btn">Mark as Delivered</a>';
                                }else{
                                    echo '<p>Delivered</p>';
                                }
                                echo '<a href="rateproduct.php?id=' . $row['product_id'] . '"class="rate-btn">Rate Product</a>
                                </div>';
                        }
                        ?>
                    </div>
                    <div class="edit-profile" id="row-2">
                        <!-- Retriving data from the database -->
                        <?php
                        $usrResult = $user->getUserInfo();
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
                                if (validateEmail($email)) {
                                    $user->updateInfo($fn, $ln, $email, $phnum, $add);
                                } else {
                                    echo 'Invalid email';
                                }
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
                            require 'inputcleaner.php';
                            if (isset($_POST['submit-2'])) {
                                $oldPass = $_POST['oldpass'];
                                $newPass = $_POST['newpass'];
                                $conPass = $_POST['conpass'];
                                if (validatePassword($newPass)) {
                                    if ($newPass != $conPass) {
                                        echo "Password don't match!";
                                    } else {
                                        $newPass = hash('sha256', $newPass);
                                        $user->updatePassword($oldPass,$newPass);
                                    }
                                } else {
                                    echo 'Password must be at least 8 characters.';
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