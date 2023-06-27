<?php
require_once '../../BackEnd/Admin.php';
require '../../BackEnd/Session/adminsession.php';
$admin = new Admin($_SESSION['customer_id'], $_SESSION['email']);
require 'inputcleaner.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="icon" href="../Assets/img/adulislogo1000.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <title>Admin Panel</title>
    <script>
        function isMobileDevice() {
            return (typeof window.orientation !== "undefined") || (navigator.userAgent.indexOf('IEMobile') !== -1);
        }
        function handleScreenSizeChange() {
            var screenWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
            var screenHeight = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
            if (screenWidth <= 768) {
                blockMobileDevices();
            } else {
                location.reload();
            }
        }

        function blockMobileDevices() {
            if (isMobileDevice() || window.innerWidth <= 768) {
                document.body.innerHTML = '';
                document.write('Sorry, this page is not available on mobile devices.');
                document.close();
            }
        }
        window.onload = blockMobileDevices;
    </script>
</head>

<body>
    <header class="business-man-header">
        <p class="business_name">Admin Control Panel</p>
    </header>
    <main>
        <div class="business-man-container">
            <div class="menu-sec">
                <a class="menu-item active" id="seller-btn" onclick="select('seller-btn','opt-2')"><i
                        class="fa fa-user-tie" aria-hidden="true"></i>
                    &nbsp; Sellers</a>
                <a class="menu-item" id="newseller-btn" onclick="select('newseller-btn','opt-8')"><i class="fa fa-store"
                        aria-hidden="true"></i>
                    &nbsp; New Sellers</a>
                <a class="menu-item" id="buyer-btn" onclick="select('buyer-btn','opt-3')"><i
                        class="fa fa-shopping-basket" aria-hidden="true"></i> &nbsp; Buyers</a>
                <a class="menu-item" id="delivery-btn" onclick="select('delivery-btn','opt-1')"><i
                        class="fa fa-shipping-fast" aria-hidden="true"></i> &nbsp; Service Price</a>
                <a class="menu-item" id="stat-btn" onclick="select('stat-btn','opt-4')"><i class="fa fa-bar-chart"
                        aria-hidden="true"></i> &nbsp; Stats</a>
                <a class="menu-item" id="message-btn" onclick="select('message-btn','opt-7')"><i class="fa fa-comments"
                        aria-hidden="true"></i> &nbsp; Inquiries</a>
                <a class="menu-item" id="edit-btn" onclick="select('edit-btn','opt-5')"><i class="fa fa-user"
                        aria-hidden="true"></i> &nbsp; Edit Profile</a>
                <a class="menu-item" id="pss-btn" onclick="select('pss-btn','opt-6')"><i class="fa fa-key"
                        aria-hidden="true"></i>&nbsp; Change Password</a>
                <a href="../../BackEnd/Services/logout.php" class="menu-item"> <i
                        class="fa-solid fa-right-from-bracket"></i>&nbsp; Logout</a>
            </div>
            <div class="opt-container">
                <!-- Second Option -->
                <div class="seller-man" id="opt-2">
                    <div class="seller-wrapper">
                        <?php
                        $data = $admin->listSellers();
                        while ($row = $data->fetch_assoc()) {
                            echo '<div class="seller">
                                <p class="biz_name">' . $row['business_name'] . '</p>
                                <p class="full_name">' . $row['first_name'] . ' ' . $row['last_name'] . '</p>
                                <p class="phno">' . $row['phone_number'] . '</p>
                                <p class="location">' . $row['address'] . '</p>
                                <p class="deactive">';
                            if ($row['acct_status'] == 1) {
                                echo '<a href="../../BackEnd/Services/accountmanager.php?req=deac&id=' . $row['customer_id'] . '">Deactivate Account</a>';
                            } else {
                                echo '<a href="../../BackEnd/Services/accountmanager.php?req=act&id=' . $row['customer_id'] . '">Activate Account</a>';
                            }
                            echo '</p></div>';
                        }
                        ?>

                    </div>
                </div>
                <!-- Third Option -->
                <div class="buyer-man" id="opt-3">
                    <div class="buyer-wrapper">
                        <?php
                        $data = $admin->listBuyers();
                        while ($row = $data->fetch_assoc()) {
                            echo '<div class="seller">
                                <p class="full_name">' . $row['first_name'] . ' ' . $row['last_name'] . '</p>
                                <p class="phno">' . $row['phone_number'] . '</p>
                                <p class="location">' . $row['email'] . '</p>
                                <p class="deactive">';
                            if ($row['acct_status'] == 1) {
                                echo '<a href="../../BackEnd/Services/accountmanager.php?req=deac&id=' . $row['customer_id'] . '">Deactivate Account</a>';
                            } else {
                                echo '<a href="../../BackEnd/Services/accountmanager.php?req=act&id=' . $row['customer_id'] . '">Activate Account</a>';
                            }
                            echo '</p></div>';
                        }
                        ?>
                    </div>
                </div>
                <!-- Fourth Option -->
                <div class="stats" id="opt-4">
                    <div class="stats-wrapper">
                        <div class="stat">
                            <p class="first">
                                <?= $admin->totalItems(); ?>
                            </p>
                            <p class="second">Items Sold</p>
                        </div>
                        <div class="stat">
                            <p class="first">
                                <?= $admin->numberOfBuyers() ?>
                            </p>
                            <p class="second">Number of Buyers</p>
                        </div>
                        <div class="stat">
                            <p class="first">
                                <?= $admin->numberOfSellers() ?>
                            </p>
                            <p class="second">Number of Sellers</p>
                        </div>
                    </div>
                </div>
                <!-- Fifth Option-->
                <div class="profile" id="opt-5">
                    <div class="profile-wrapper">
                        <?php
                        $admResult = $admin->getUserInfo();
                        $row = $admResult->fetch_assoc();
                        ?>
                        <form action="" method="POST">
                            <input type="text" name="firstname" id="" placeholder="First Name"
                                value="<?= $row['first_name']; ?>" required>
                            <input type="text" name="lastname" id="" placeholder="Last Name"
                                value="<?= $row['last_name']; ?>" required>
                            <input type="email" name="email" id="" placeholder="Email" value="<?= $row['email']; ?>"
                                required>
                            <input type="number" name="phno" id="" placeholder="Phone Number"
                                value="<?= $row['phone_number']; ?>" required>
                            <input type="submit" name='submit-0' value="Update">
                            <?php
                            if (isset($_POST['submit-0'])) {
                                $fn = input_cleaner($_POST['firstname']);
                                $ln = input_cleaner($_POST['lastname']);
                                $email = input_cleaner($_POST['email']);
                                $phnumber = input_cleaner($_POST['phno']);
                                if (validateEmail($email)) {
                                    $admin->updateInfo($fn, $ln, $email, $phnumber, " ");
                                } else {
                                    echo 'Invalid email';
                                }
                            }
                            ?>
                        </form>
                    </div>
                </div>

                <!-- Sixth Option-->

                <div class="password" id="opt-6">
                    <div class="password-wrapper">
                        <form action="" method="POST">
                            <input type="password" name="oldpass" id="" placeholder="Old Password">
                            <input type="password" name="newpass" id="" placeholder="New Password">
                            <input type="password" name="conpass" id="" placeholder="Confirm Password">
                            <input type="submit" name='submit-1' value="Update">
                            <?php
                            if (isset($_POST['submit-1'])) {
                                $oldPass = $_POST['oldpass'];
                                $newPass = $_POST['newpass'];
                                $conPass = $_POST['conpass'];
                                if (validatePassword($newPass)) {
                                    if ($newPass != $conPass) {
                                        echo "Password don't match!";
                                    } else {
                                        $newPass = hash('sha256', $newPass);
                                        $admin->updatePassword($oldPass, $newPass);
                                    }
                                } else {
                                    echo 'Password must be at least 8 characters.';
                                }

                            }
                            ?>
                        </form>
                    </div>
                </div>

                <!-- Sevent Option-->
                <div class="enquires" id="opt-7">
                    <div class="enquires-wrapper">
                        <?php
                        $messageRes = $admin->getMessages();
                        while ($row = $messageRes->fetch_assoc()) {
                            echo '<div class="enquiry">
                                <div class="row-1">
                                    <p class="email-account">' . $row['email'] . '</p>
                                    <p class="user-type">' . $row['role'] . '</p>
                                    <p class="time">' . date_format(date_create($row['date']), 'd-m-Y') . '</p>
                                    </div>
                                    <div class="row-2">
                                        <p class="message">' . $row['message'] . '</p>
                                    </div>
                                </div>';
                        }
                        ?>
                    </div>

                </div>

                <!-- Eigth Option-->
                <div class="newsell" id="opt-8">
                    <div class="seller-wrapper">
                        <?php
                        $data = $admin->newSellers();
                        while ($row = $data->fetch_assoc()) {
                            echo '<div class="seller">
                                <p class="biz_name">' . $row['business_name'] . '</p>
                                <p class="full_name">' . $row['first_name'] . ' ' . $row['last_name'] . '</p>
                                <p class="phno">' . $row['phone_number'] . '</p>
                                <p class="location">' . $row['address'] . '</p>
                                <a href="../../BackEnd/Services/accountmanager.php?req=rev&id=' . $row['customer_id'] . '">Review</a>';
                        }
                        ?>
                    </div>
                </div>

                <!-- First Option-->
                <div class="delivery" id="opt-1">
                    <?php
                    $res = $admin->getDeliveryPrice();
                    $row = $res->fetch_assoc();
                    $price = $row['price'];
                    ?>
                    <form action="" class="delivery-form" method="POST">
                        <p class="update-price">Update Delivery Price</p>
                        <input type="number" name="price" id="" placeholder="Delivery Price" value="<?= $price; ?>"
                            required>
                        <input type="submit" name="submit-2" value="Update">
                        <?php
                        if (isset($_POST['submit-2'])) {
                            $price = $_POST['price'];
                            $admin->updateDeliveryPrice($price);
                        }
                        ?>
                    </form>
                </div>

            </div>
        </div>
        </div>
    </main>
    <script>
        function disableAll() {
            document.getElementById('opt-1').style.display = 'none';
            document.getElementById('opt-2').style.display = 'none';
            document.getElementById('opt-3').style.display = 'none';
            document.getElementById('opt-4').style.display = 'none';
            document.getElementById('opt-5').style.display = 'none';
            document.getElementById('opt-6').style.display = 'none';
            document.getElementById('opt-7').style.display = 'none';
            document.getElementById('opt-8').style.display = 'none';
            document.getElementById('delivery-btn').style.backgroundColor = "white";
            document.getElementById('newseller-btn').style.backgroundColor = "white";
            document.getElementById('seller-btn').style.backgroundColor = "white";
            document.getElementById('buyer-btn').style.backgroundColor = "white";
            document.getElementById('stat-btn').style.backgroundColor = "white";
            document.getElementById('message-btn').style.backgroundColor = "white";
            document.getElementById('edit-btn').style.backgroundColor = "white";
            document.getElementById('pss-btn').style.backgroundColor = "white";
        }
        function select(opt, targ) {
            disableAll();
            document.getElementById(targ).style.display = "block";
            document.getElementById(opt).style.backgroundColor = "#00000027";
        }
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>