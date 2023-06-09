<?php
require_once '../../BackEnd/Seller.php';
$seller = new Seller();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <title>Business Managment </title>
</head>

<body>
    <header class="business-man-header">
        <p class="business_name">Business Control Panel</p>
    </header>
    <main>
        <div class="business-man-container">
            <div class="menu-sec">
                <a class="menu-item active" id="order-btn" onclick="select('order-btn','opt-1')"><i
                        class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp; New Orders</a>
                <a class="menu-item" id="list-btn" onclick="select('list-btn','opt-2')"><i class="fa fa-book"
                        aria-hidden="true"></i> &nbsp; Items List</a>
                <a class="menu-item" id="add-btn" onclick="select('add-btn','opt-3')"><i class="fa fa-pencil-square"
                        aria-hidden="true"></i> &nbsp; Add Item</a>
                <a class="menu-item" id="stat-btn" onclick="select('stat-btn','opt-4')"><i class="fa fa-bar-chart"
                        aria-hidden="true"></i> &nbsp; Stats</a>
                <a class="menu-item" id="edit-btn" onclick="select('edit-btn','opt-5')"><i class="fa fa-user"
                        aria-hidden="true"></i> &nbsp; Edit Profile</a>
                <a class="menu-item" id="pss-btn" onclick="select('pss-btn','opt-6')"><i class="fa fa-key"
                        aria-hidden="true"></i>&nbsp; Change Password</a>
                <a href="contact.php" class="menu-item"> <i class="fa-solid fa-walkie-talkie"></i> &nbsp; Contact Adminstrator</a>
                <a class="menu-item"> <i class="fa-solid fa-right-from-bracket"></i>&nbsp; Logout</a>
            </div>
            <div class="opt-container">
                <!-- First Option-->
                <div class="new-order" id="opt-1">
                    <div class="order-wrapper">
                        <div class="orderd_item">
                            <img src="../Assets/img/iph.jpg" alt="">
                            <p class="product-name">iPhone 14 pro</p>
                            <p class="price">1000 Birr</p>
                            <p class="mark">Mark as Delivered</p>
                        </div>
                    </div>
                </div>
                <!-- Second Option-->
                <div class="opt-co" id="opt-2">
                    <div class="opt">
                        <?php
                        $itemlistres = $seller->getMyProducts(10);
                        while ($row = $itemlistres->fetch_assoc()) {
                            echo ' <div class="item">
                                <img src="' . $row['url'] . '" alt="">
                                <p class="item-name">' . $row['product_name'] . '</p>
                                <div class="lower"><p class="stock">' . $row['stock'] . ' Items </p>
                                <a href = "upproduct.php?pid='.$row['product_id'].'"class="edit"><i class="fas fa-edit"></i></a>
                            </div>
                        </div>';
                        }
                        ?>
                    </div>
                </div>

                <!-- Second Option-->
                <div class="add-item" id="opt-3">
                    <div class="add-item-container">
                        <p class="title">Add Product</p>
                        <form action="" method="POST" enctype="multipart/form-data">

                            <div class="row-1">
                                <input type="text" name="pname" id="" placeholder="Product Name" required>
                                <input type="number" name="pprice" id="" placeholder="Price" required>
                                <input type="text" name="pdesc" id="" placeholder="Main Description" required>
                            </div>

                            <div class="row-2">

                                <p class="label">Product Photo</p>

                                <div class="sub-row-1">
                                    <input type="file" name="img_1" id="img_1">
                                    <input type="file" name="img_2" id="img_1">
                                    <input type="file" name="img_3" id="img_1">
                                    <input type="file" name="img_4" id="img_1">
                                </div>

                            </div>
                            <div class="row-3">
                                <input type="text" name="desc_1" id="" placeholder="Description - 1" required>
                                <input type="text" name="desc_2" id="" placeholder="Description - 2" required>
                                <input type="text" name="desc_3" id="" placeholder="Description - 3" required>
                                <input type="text" name="desc_4" id="" placeholder="Description - 4" required>
                                <input type="text" name="desc_5" id="" placeholder="Description - 5" required>
                                <input type="text" name="desc_6" id="" placeholder="Description - 6" required>
                            </div>
                            <div class="row-4">
                                <input type="number" name="pstock" id="" placeholder="Stock">
                                <select name="type" id="" required>
                                    <option value="">Select Category</option>
                                    <option value="Phone n Tablets">Phone & Tablets</option>
                                    <option value="TV n Monitors">TV & Monitors</option>
                                    <option value="Desktop n Laptop Computers">Desktop & Laptop Computers</option>
                                    <option value="Accessories">Accessories</option>
                                    <option value="Shoes">Shoes</option>
                                    <option value="Books">Books</option>
                                    <option value="Personal Care n Beauty">Personal Care & Beauty</option>
                                    <option value="Unsorted">Unsorted</option>
                                </select>
                            </div>
                            <input type="submit" name="submit-1" value="Upload Product &#8594">
                            <?php
                            require_once 'inputcleaner.php';
                            if (isset($_POST['submit-1'])) {
                                $name = input_cleaner($_POST['pname']);
                                $price = input_cleaner($_POST['pprice']);
                                $main_desc = input_cleaner($_POST['pdesc']);
                                $stock = input_cleaner($_POST['pstock']);
                                $img_1 = $_FILES['img_1'];
                                $img_2 = $_FILES['img_2'];
                                $img_3 = $_FILES['img_3'];
                                $img_4 = $_FILES['img_4'];
                                $seller->addProduct(10, $name, $price, $main_desc, $stock, $img_1, $img_2, $img_3, $img_4, input_cleaner($_POST['desc_1']), input_cleaner($_POST['desc_2']), input_cleaner($_POST['desc_3']), input_cleaner($_POST['desc_4']), input_cleaner($_POST['desc_5']), input_cleaner($_POST['desc_6']),input_cleaner($_POST['type']));
                            }

                            ?>
                        </form>
                    </div>
                </div>

                <!-- Third Option -->
                <div class="stats" id="opt-4" style="display:none;">
                    <div class="stats-wrapper">
                        <div class="stat">
                            <p class="first">300</p>
                            <p class="second">Available Items</p>
                        </div>
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
                            <p class="second">Items Sold</p>
                        </div>
                        <div class="stat">
                            <p class="first">300</p>
                            <p class="second">Total Revenue</p>
                        </div>
                        <div class="stat">
                            <p class="first">300</p>
                            <p class="second">Average Rating</p>
                        </div>
                    </div>
                </div>
                <!-- Fourth Option-->
                <div class="profile" id="opt-5">
                    <div class="profile-wrapper">
                    <?php
                        $id = 34;
                        $usrResult = Seller::getUserInfo($id);
                        $row = $usrResult->fetch_assoc();
                        ?>
                        <form action="" method='POST'>
                            <input type="text" name="firstname" id="" placeholder="First Name" value="<?=$row['first_name']?>" required>
                            <input type="text" name="lastname" id="" placeholder="Last Name" value="<?=$row['last_name']?>" required>
                            <input type="text" name="bizname" id="" placeholder="Business Name" value="<?=$row['business_name']?>" required>
                            <input type="email" name="email" id="" placeholder="Email" value="<?=$row['email']?>" required>
                            <input type="number" name="phno" id="" placeholder="Phone Number" value="<?=$row['phone_number']?>" required>
                            <input type="text" name="address" id="" placeholder="Address" value="<?=$row['address']?>">
                            <a href="">Locate Me</a>
                            <input type="submit" name="submit-2" value="Update">
                            <?php 
                            if(isset($_POST['submit-2'])){
                                $fn = $_POST['firstname'];
                                $ln = $_POST['lastname'];
                                $bn = $_POST['bizname'];
                                $email = $_POST['email'];
                                $phnumber = $_POST['phno'];
                                $address = $_POST['address'];
                                Seller::updateSellerInfo($id,$fn,$ln,$email,$phnumber,$address,$bn);
                            }
                            ?>
                        </form>
                    </div>
                </div>

                <div class="password" id="opt-6">
                    <div class="password-wrapper">
                        <form action="" method="POST">
                            <input type="password" name="oldpass" id="" placeholder="Old Password">
                            <input type="password" name="newpass" id="" placeholder="New Password">
                            <input type="password" name="conpass" id="" placeholder="Confirm Password">
                            <input type="submit" name="submit-3" value="Update">
                            <?php
                            if (isset($_POST['submit-3'])) {
                                $oldPass = $_POST['oldpass'];
                                $newPass = $_POST['newpass'];
                                $conPass = $_POST['conpass'];
                                if ($newPass != $conPass) {
                                    echo "Password don't match!";
                                } else {
                                    $newPass = hash('sha256', $newPass);
                                    Seller::updatePassword($id,$oldPass,$newPass);
                                }
                            }
                            ?>
                        </form>
                    </div>
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
            document.getElementById('order-btn').style.backgroundColor = "white";
            document.getElementById('list-btn').style.backgroundColor = "white";
            document.getElementById('add-btn').style.backgroundColor = "white";
            document.getElementById('stat-btn').style.backgroundColor = "white";
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