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
    public static function register($first_name, $last_name, $phone_number, $email, $address, $password)
    {
        require 'config.php';
        $sql = "INSERT INTO customer (first_name, last_name, phone_number, email, address, password, role) VALUES (?, ?, ?, ?, ?, ?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssss", $first_name, $last_name, $phone_number, $email, $address, $password, 'buyer');
        if ($stmt->execute()) {
            echo "Registration Successful!";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
        $conn->close();
    }
    public static function login($email, $password)
    {
        require 'config.php';
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
    public static function updatePassword($id, $oldPass, $newPass)
    {
        require 'config.php';
        $sql = 'SELECT password FROM customer WHERE customer_id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $oldPass = hash("sha256", $oldPass);
        if (hash_equals($row['password'], $oldPass)) {
            $sql = 'UPDATE customer 
            SET password = ?
            WHERE customer_id = ?';
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('si', $newPass, $id);
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
    public function getProducts($category){
        require 'config.php';
        $sql = "SELECT p.product_id,p.product_name, p.price,p.main_description,p.rating, i.url FROM product AS p
        INNER JOIN(
                    SELECT product_id, url
                    FROM image
                    GROUP BY product_id
        ) AS i ON p.product_id = i.product_id
        WHERE cat = '$category' AND p.stock > 1 AND p.active = 1 ORDER BY p.product_id DESC";
        $result = mysqli_query($conn,$sql);
        return $result;
    }
    public function topRated(){
        require 'config.php';
        $sql = "SELECT p.product_id,p.product_name, p.price,p.main_description,p.rating, i.url FROM product AS p
        INNER JOIN(
                    SELECT product_id, url
                    FROM image
                    GROUP BY product_id
        ) AS i ON p.product_id = i.product_id
        WHERE p.rating > 3 AND p.stock > 1 AND p.active = 1 ORDER BY p.product_id DESC";
        $result = mysqli_query($conn,$sql);
        return $result;
    }
    public function search($search,$srt){
        require 'config.php';
        $sql = '';
        switch($srt){
            case '':
                $sql = "SELECT p.product_id, p.product_name, p.price, p.rating, i.url
                FROM product AS p
                INNER JOIN (
                    SELECT product_id, url
                    FROM image
                    GROUP BY product_id
                ) AS i ON p.product_id = i.product_id
                WHERE MATCH(p.product_name) AGAINST('$search') AND p.stock > 1 AND p.active = 1";  
                break;
            case 'price':
                $sql = "SELECT p.product_id, p.product_name, p.price, p.rating, i.url
                FROM product AS p
                INNER JOIN (
                    SELECT product_id, url
                    FROM image
                    GROUP BY product_id
                ) AS i ON p.product_id = i.product_id
                WHERE MATCH(p.product_name) AGAINST('$search') AND p.stock > 1 AND p.active = 1
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
                WHERE MATCH(p.product_name) AGAINST('$search') AND p.stock > 1 AND p.active = 1
                 ORDER BY rating DESC"; 
                break; 
        }
        $result = mysqli_query($conn,$sql);
        return $result;
    }
}
?>