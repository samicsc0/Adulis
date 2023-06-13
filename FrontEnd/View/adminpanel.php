<?php
require_once '../../BackEnd/Admin.php';
$admin = new Admin();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
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

        window.addEventListener('resize', handleScreenSizeChange);


        function blockMobileDevices() {
            if (isMobileDevice() || window.innerWidth <= 768) {
                document.body.innerHTML = '';
                document.write('Sorry, this page is not available on mobile devices.');
                document.close();
            }
        }

        // Call the blockMobileDevices function when the page loads
        window.onload = blockMobileDevices;
        window.onresize = handleScreenSizeChange;

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
                        class="fa fa-shipping-fast" aria-hidden="true"></i> &nbsp; Delivery Price</a>
                <a class="menu-item" id="stat-btn" onclick="select('stat-btn','opt-4')"><i class="fa fa-bar-chart"
                        aria-hidden="true"></i> &nbsp; Stats</a>
                <a class="menu-item" id="message-btn" onclick="select('message-btn','opt-7')"><i class="fa fa-comments"
                        aria-hidden="true"></i> &nbsp; Inquiries</a>
                <a class="menu-item" id="edit-btn" onclick="select('edit-btn','opt-5')"><i class="fa fa-user"
                        aria-hidden="true"></i> &nbsp; Edit Profile</a>
                <a class="menu-item" id="pss-btn" onclick="select('pss-btn','opt-6')"><i class="fa fa-key"
                        aria-hidden="true"></i>&nbsp; Change Password</a>
                <a class="menu-item"> <i class="fa-solid fa-right-from-bracket"></i>&nbsp; Logout</a>
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
                                echo '<a href="../../BackEnd/deactivate.php">Deactivate Account</a>';
                            } else {
                                echo '<a href="../../BackEnd/activate.php">Activate Account</a>';
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
                                <p class="location">' . $row['address'] . '</p>
                                <p class="deactive">';
                            if ($row['acct_status'] == 1) {
                                echo '<a href="../../BackEnd/deactivate.php">Deactivate Account</a>';
                            } else {
                                echo '<a href="../../BackEnd/activate.php">Activate Account</a>';
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
                            <p class="first">300</p>
                            <p class="second">Today's Sales</p>
                        </div>
                        <div class="stat">
                            <p class="first">300</p>
                            <p class="second">Today's Revenue</p>
                        </div>
                        <div class="stat">
                            <p class="first">300</p>
                            <p class="second">Total Transaction</p>
                        </div>
                        <div class="stat">
                            <p class="first">300</p>
                            <p class="second">Number of Buyers</p>
                        </div>
                        <div class="stat">
                            <p class="first">300</p>
                            <p class="second">Number of Sellers</p>
                        </div>
                    </div>
                </div>
                <!-- Fifth Option-->
                <div class="profile" id="opt-5">
                    <div class="profile-wrapper">
                        <form action="">
                            <input type="text" name="" id="" placeholder="First Name" required>
                            <input type="text" name="" id="" placeholder="Last Name" required>
                            <input type="text" name="" id="" placeholder="Business Name" required>
                            <input type="email" name="" id="" placeholder="Email" required>
                            <input type="number" name="" id="" placeholder="Phone Number" required>
                            <input type="text" name="" id="" placeholder="Address">
                            <input type="submit" name='submit-0' value="Update">
                        </form>
                    </div>
                </div>

                <!-- Sixth Option-->

                <div class="password" id="opt-6">
                    <div class="password-wrapper">
                        <form action="">
                            <input type="password" name="" id="" placeholder="Old Password">
                            <input type="password" name="" id="" placeholder="New Password">
                            <input type="password" name="" id="" placeholder="Confirm Password">
                            <input type="submit" name='submit-1' value="Update">
                        </form>
                    </div>
                </div>

                <!-- Sevent Option-->
                <div class="enquires" id="opt-7">
                    <div class="enquires-wrapper">
                        <?php
                            $messageRes = $admin->getMessages();
                            while($row = $messageRes->fetch_assoc()){
                                echo '<div class="enquiry">
                                <div class="row-1">
                                    <p class="email-account">'.$row['email'].'</p>
                                    <p class="user-type">'.$row['role'].'</p>
                                    <p class="time">'.date_format(date_create($row['date']), 'd-m-Y') .'</p>
                                    </div>
                                    <div class="row-2">
                                        <p class="message">'.$row['message'].'</p>
                                    </div>
                                </div>';
                            }
                        ?>
                        <!-- <div class="enquiry">
                            <div class="row-1">
                                <p class="email-account">samuelzewde29@gmail.com</p>
                                <p class="user-type">Buyer</p>
                                <p class="time">5/30/2023</p>
                            </div>
                            <div class="row-2">
                                <p class="message">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam,
                                    dolorum placeat eligendi quam soluta dolores nemo voluptatum laudantium, libero aut
                                    inventore possimus alias eos blanditiis obcaecati cum harum fugiat. Nam, illo
                                    perferendis.</p>
                            </div>
                        </div> -->
                    </div>

                </div>

                <!-- Eigth Option-->
                <div class="newsell" id="opt-8">
                    <div class="seller-wrapper">
                        <!-- <div class="seller">
                            <p class="biz_name">kaldi's Coffe</p>
                            <p class="full_name">Samuel Zewde</p>
                            <p class="phno">+251944263239</p>
                            <p class="location">Bethel Square</p>
                            <p class="deactive">Activate Account</p>
                        </div> -->
                        <?php
                        $data = $admin->newSellers();
                        while ($row = $data->fetch_assoc()) {
                            echo '<div class="seller">
                                <p class="biz_name">' . $row['business_name'] . '</p>
                                <p class="full_name">' . $row['first_name'] . ' ' . $row['last_name'] . '</p>
                                <p class="phno">' . $row['phone_number'] . '</p>
                                <p class="location">' . $row['address'] . '</p>
                                <p class="deactive">';
                            if ($row['acct_status'] == 1) {
                                echo '<a href="../../BackEnd/deactivate.php">Deactivate Account</a>';
                            } else {
                                echo '<a href="../../BackEnd/activate.php">Activate Account</a>';
                            }
                            echo '</p></div>';
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