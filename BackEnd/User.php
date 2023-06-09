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


    public static function getUserInfo($id)
    {
        require 'config.php';
        $sql = 'SELECT * FROM customer WHERE customer_id =' . $id . '';
        $result = mysqli_query($conn, $sql);
        return $result;
    }
    public static function updateInfo($id, $fn, $ln, $email, $phno, $add)
    {
        require 'config.php';
        $sql = 'UPDATE customer 
        SET first_name = ?,
            last_name = ?,
            phone_number = ?,
            email = ?,
            address = ?
        WHERE customer_id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssissi', $fn, $ln, $phno, $email, $add, $id);
        if ($stmt->execute()) {
            echo 'Information updated successfully.';
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
    public static function contactAdmin($id, $email, $message)
    {
        require 'config.php';
        $sql = 'INSERT INTO message (customer_id,email,message)
                            VALUES(?,?,?)';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('iss', $id, $email, $message);
        if ($stmt->execute()) {
            echo 'Message sent.';
        } else {
            echo 'Failed to send your message, Please try again later.';
        }
    }

}
?>