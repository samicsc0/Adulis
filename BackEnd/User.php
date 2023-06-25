<?php
class User
{
    public $user_id;
    public $email;
    function __construct($user_id = null, $email = null)
    {
        $this->user_id = $user_id;
        $this->email = $email;
    }
    public static function register($first_name, $last_name, $phone_number, $email, $address, $password, $role)
    {
        require 'config.php';
        $sql = "INSERT INTO customer (first_name, last_name, phone_number, email, address, password, role) VALUES (?, ?, ?, ?, ?, ?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssss", $first_name, $last_name, $phone_number, $email, $address, $password, $role);
        if ($stmt->execute()) {
            echo "Registration Successful!";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
        $conn->close();
    }
    public static function checkEmail($email)
    {
        require 'config.php';
        $sql = "SELECT * FROM customer WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if (mysqli_num_rows($result) === 1) {
            return true;
        } else {
            echo "Couldn't find your email account.";
            return false;
        }
    }
    public static function insertIntoreset($email, $pin)
    {
        require 'config.php';
        $encpin = hash("sha256", $pin);
        $sql = "INSERT INTO passwordrest (email, pin) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $email, $encpin);
        $result = $stmt->execute();
        if ($result) {
            if (User::sendemail($email, "Adulis: Password reset code", "Your reset pin is: $pin")) {
                return true;
            }
            return true;
        } else {
            return false;
        }
    }
    public static function sendemail($email, $subject, $content)
    {
        if (mail($email, $subject, $content)) {
            return true;
        } else {
            return false;
        }
    }
    public static function checkResetCode($email, $pin)
    {
        require 'config.php';
        $sql = "SELECT * FROM passwordrest WHERE email = '$email' ORDER BY id DESC LIMIT 1";
        $res = mysqli_query($conn, $sql);
        if ($res == false) {
            return false;
        } else {
            $row = $res->fetch_assoc();
            if (hash_equals($pin,$row['pin'])) {
                return true;
            } else {
                return false;
            }
        }
    }

    public static function updateForgPassword($email, $passwd)
    {
        require 'config.php';
        $sql = "UPDATE customer 
                SET password = '$passwd'
                WHERE email = '$email'";
        if (mysqli_query($conn, $sql)) {
            echo 'Password updated successfully.<a href="login.php">Click here to login</a>';
        } else {
            echo 'Password reset failed, Please try again later';
        }
    }
    public static function login($email, $password)
    {
        require 'config.php';
        require 'Seller.php';
        $sql = "SELECT * FROM customer WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if (mysqli_num_rows($result) === 1) {
            $row = $result->fetch_assoc();
            $passwd = $row['password'];
            $newpass = $password;
            if (hash_equals($passwd, $newpass)) {
                if ($row['acct_status'] === 1) {
                    session_start();
                    if ($row['role'] == 'buyer') {
                        $_SESSION['status'] = 'logged';
                        $_SESSION['customer_id'] = $row['customer_id'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['role'] = 'buyer';
                        header("location: ../../FrontEnd/View/index.php");
                        exit();
                    } else if ($row['role'] == 'seller') {
                        $_SESSION['status'] = 'logged';
                        $_SESSION['customer_id'] = $row['customer_id'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['role'] = 'seller';
                        $_SESSION['seller_id'] = Seller::getSellerId($row['customer_id']);
                        header("location: ../../FrontEnd/View/bizmanagment.php");
                        exit();
                    } else if ($row['role'] == 'admin') {
                        $_SESSION['status'] = 'logged';
                        $_SESSION['customer_id'] = $row['customer_id'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['role'] = 'admin';
                        header("location: ../../FrontEnd/View/adminpanel.php");
                        exit();
                    }
                } else {
                    echo "Your account is deactive, please contact the administrator.";
                }
            } else {
                echo "Incorrect password!";
            }
        } else {
            echo "User not found!";
        }
    }



    public function getUserInfo()
    {
        require 'config.php';
        $sql = 'SELECT * FROM customer WHERE customer_id =' . $this->user_id . '';
        $result = mysqli_query($conn, $sql);
        return $result;
    }
    public function updateInfo($fn, $ln, $email, $phno, $add)
    {
        require 'config.php';
        $sql = "UPDATE customer 
        SET first_name = ?,
            last_name = ?,
            phone_number = ?,
            email = ?,
            address = ?
        WHERE customer_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssissi', $fn, $ln, $phno, $email, $add, $this->user_id);
        if ($stmt->execute()) {
            echo 'Information updated successfully. Reload the page to confirm';
        }
    }
    public function updatePassword($oldPass, $newPass)
    {
        require 'config.php';
        $sql = 'SELECT password FROM customer WHERE customer_id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $this->user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $oldPass = hash("sha256", $oldPass);
        if (hash_equals($row['password'], $oldPass)) {
            $sql = 'UPDATE customer 
            SET password = ?
            WHERE customer_id = ?';
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('si', $newPass, $this->user_id);
            if ($stmt->execute()) {
                echo 'Password updated successfully.';
            } else {
                echo 'Failed, Please try again later.';
            }
        } else {
            echo 'The old password is not correct.';
        }
    }
    public function contactAdmin($email, $message)
    {
        require 'config.php';
        $sql = 'INSERT INTO message (customer_id,email,message)
                            VALUES(?,?,?)';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('iss', $this->user_id, $email, $message);
        if ($stmt->execute()) {
            echo 'Message sent.';
        } else {
            echo 'Failed to send your message, Please try again later.';
        }
    }
    public static function getProducts($category)
    {
        require 'config.php';
        $sql = "SELECT p.product_id,p.product_name, p.price,p.main_description,p.rating, i.url FROM product AS p
        INNER JOIN(
                    SELECT product_id, url
                    FROM image
                    GROUP BY product_id
        ) AS i ON p.product_id = i.product_id
        WHERE cat = '$category' AND p.stock > 0 AND p.active = 1 ORDER BY p.product_id DESC";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
    public static function topRated()
    {
        require 'config.php';
        $sql = "SELECT p.product_id,p.product_name, p.price,p.main_description,p.rating, i.url FROM product AS p
        INNER JOIN(
                    SELECT product_id, url
                    FROM image
                    GROUP BY product_id
        ) AS i ON p.product_id = i.product_id
        WHERE p.rating > 3 AND p.stock > 0 AND p.active = 1 ORDER BY p.product_id DESC";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
    public static function search($search, $srt)
    {
        require 'config.php';
        $sql = '';
        switch ($srt) {
            case '':
                $sql = "SELECT p.product_id, p.product_name, p.price, p.rating, i.url
                FROM product AS p
                INNER JOIN (
                    SELECT product_id, url
                    FROM image
                    GROUP BY product_id
                ) AS i ON p.product_id = i.product_id
                WHERE MATCH(p.product_name) AGAINST('$search') AND p.stock > 0 AND p.active = 1";
                break;
            case 'price':
                $sql = "SELECT p.product_id, p.product_name, p.price, p.rating, i.url
                FROM product AS p
                INNER JOIN (
                    SELECT product_id, url
                    FROM image
                    GROUP BY product_id
                ) AS i ON p.product_id = i.product_id
                WHERE MATCH(p.product_name) AGAINST('$search') AND p.stock > 0 AND p.active = 1
                 ORDER BY price ASC";
                break;
            case 'rate':
                $sql = "SELECT p.product_id, p.product_name, p.price, p.rating, i.url
                FROM product AS p
                INNER JOIN (
                    SELECT product_id, url
                    FROM image
                    GROUP BY product_id
                ) AS i ON p.product_id = i.product_id
                WHERE MATCH(p.product_name) AGAINST('$search') AND p.stock > 0 AND p.active = 1
                 ORDER BY rating DESC";
                break;
        }
        $result = mysqli_query($conn, $sql);
        return $result;
    }
    public function order($cart_id)
    {
        require 'config.php';
        $sql_cart = "SELECT * FROM cartitem WHERE cart_id = $cart_id";
        $result = mysqli_query($conn, $sql_cart);
        while ($row = $result->fetch_assoc()) {
            $prid = $row['product_id'];
            $quan = $row['quantity'];
            $price = $row['price'];
            $sql_insert = "INSERT INTO orders(customer_id,product_id,cart_id,quantity, price)
                                       VALUES($this->user_id,$prid,$cart_id,$quan,$price)";
            mysqli_query($conn, $sql_insert);
            $this->updatestock($prid, $quan);
        }
    }
    public function updatestock($product_id, $orderStock)
    {
        require 'config.php';
        $sql = "UPDATE product 
                SET stock = stock - $orderStock
                WHERE product_id = $product_id";
        mysqli_query($conn, $sql);
    }
    public function getMyOrders()
    {
        require 'config.php';
        $sql = "SELECT o.order_id, o.product_id, o.quantity, o.price, o.buyer_status, p.product_name FROM orders o 
        JOIN product p ON o.product_id = p.product_id 
        WHERE o.customer_id = $this->user_id ORDER BY o.buyer_status ASC";
        $res = mysqli_query($conn, $sql);
        return $res;
    }
    public function getProductById($prid)
    {
        require 'config.php';
        $sql = "SELECT p.product_id, p.product_name, p.price, p.rating, i.url
        FROM product AS p
        INNER JOIN (
            SELECT product_id, url
            FROM image
            GROUP BY product_id
        ) AS i ON p.product_id = i.product_id WHERE p.product_id = $prid";
        $res = mysqli_query($conn, $sql);
        return $res->fetch_assoc();
    }
    public function setAverageRating($prid)
    {
        require 'config.php';
        $sql = "SELECT rating FROM ratings WHERE product_id  = $prid";
        $res = mysqli_query($conn, $sql);
        $num_row = mysqli_num_rows($res);
        $total = 0;
        while ($row = $res->fetch_assoc()) {
            $total += $row['rating'];
        }
        $av = $total / $num_row;
        $sql_update = "UPDATE product SET rating = $av WHERE product_id = $prid";
        mysqli_query($conn, $sql_update);
    }
    public static function getTotalRatings($prid)
    {
        require 'config.php';
        $sql = "SELECT rating FROM ratings WHERE product_id  = $prid";
        $res = mysqli_query($conn, $sql);
        $num_row = mysqli_num_rows($res);
        return $num_row;
    }
    public function prevRateCheck($prid)
    {
        require 'config.php';
        $sql = "SELECT * FROM ratings WHERE product_id = $prid AND customer_id = $this->user_id";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) == 0) {
            return true;
        } else {
            return false;
        }
    }
    public function rateproduct($prid, $rate)
    {
        require 'config.php';
        if ($this->prevRateCheck($prid)) {
            if ($rate >= 0 && $rate <= 5) {
                $sql = "INSERT INTO ratings(customer_id,product_id,rating)
                            VALUES($this->user_id,$prid,$rate)";
                mysqli_query($conn, $sql);
                $this->setAverageRating($prid);
                header('location: ../../FrontEnd/View/profile.php');
            } else {
                echo 'Failed to submit your rating.';
            }
        } else {
            echo "You can't rate a product multiple times.";
        }
    }
    public function markasDelivered($item_id)
    {
        require 'config.php';
        $sql = "UPDATE orders
                SET buyer_status = 1
                WHERE order_id = $item_id";
        mysqli_query($conn, $sql);
        header('location: ');
    }
}
?>