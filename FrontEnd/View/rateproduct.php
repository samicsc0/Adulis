<?php
require_once '../../BackEnd/Session/usersession.php';
require_once '../../BackEnd/User.php';
$user = new User($_SESSION['customer_id'], $_SESSION['email']);
$prid;
if (isset($_GET['id'])) {
    $prid = $_GET['id'];
} else {
    header('location: profile.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rate Product</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="icon" href="../Assets/img/adulislogo1000.png">
</head>

<body>
    <div class="rating-container">
        <P class="title">Rate <?= $user->getProductById($prid)['product_name']; ?></P>
        <img src="<?= $user->getProductById($prid)['url'] ?>" alt="">
        <form action="" method="POST" oninput="res.value = slider.value">
            <input type="range" name="rate" id="slider" max="5" min="0" step="1" value="0">
            <output name="res" for="slider">0</output>
            <input type="submit" name="submit" value="Submit">
            <?php
            if (isset($_POST['submit'])) {
                $rate = $_POST['rate'];
                $user->rateproduct($prid, $rate);
            }
            ?>
        </form>
    </div>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>