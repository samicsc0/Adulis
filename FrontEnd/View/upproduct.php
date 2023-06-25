<!DOCTYPE html>
<html lang="en">
<?php
require_once '../../BackEnd/Session/sellersession.php';
require_once '../../BackEnd/Seller.php';
$seller = new Seller($_SESSION['customer_id'], $_SESSION['email'],$_SESSION['seller_id']);
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="icon" href="../Assets/img/adulislogo1000.png">
    <title>Update Product</title>
</head>

<body>
    <div class="update-product-head">
        <a href="bizmanagment.php"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp; Back to Products</a>
    </div>
    <hr>
    <main>
        <div class="update-product-container">
            <?php

            require 'inputcleaner.php';
            $prid = $_GET['pid'];
            $row = Seller::getProduct($prid);
            ?>
            <div class="col-1">
                <img src="<?= $row['url'] ?>" alt="">
            </div>
            <div class="col-2">
                <form action="" method="POST">
                    <div class="row-1">
                        <input type="text" name='pname' placeholder="Product Name" value="<?= $row['product_name'] ?>"
                            required>
                        <a href="../../BackEnd/Services/removeitem.php?pid=<?= $prid ?>"><i class="fa fa-trash"
                                aria-hidden="true"></i></a>
                    </div>
                    <input type="text" name="main_desc" id="" placeholder="Product Description"
                        value="<?= $row['main_description'] ?>" required>
                    <input type="number" name="stock" id="" placeholder="Stock" value="<?= $row['stock'] ?>" required>
                    <input type="number" name="price" id="" placeholder="Price" value="<?= $row['price'] ?>" required>
                    <input type="submit" name="submit" value="Update &rarr;">
                    <?php
                    if (isset($_POST['submit'])) {
                        $prname = input_cleaner($_POST['pname']);
                        $prdesc = input_cleaner($_POST['main_desc']);
                        $prstock = input_cleaner($_POST['stock']);
                        $prprice = input_cleaner($_POST['price']);
                        Seller::updateProduct($prid, $prname, $prdesc, $prstock, $prprice);
                    }
                    ?>
                </form>
            </div>
        </div>
    </main>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>