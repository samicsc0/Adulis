<?php
require_once 'User.php';
class Seller extends User
{
    public $user_id;
    public $email;
    public $seller_id;

    function __construct($user_id = null, $email = null, $seller_id)
    {
        $this->user_id = $user_id;
        $this->email = $email;
        $this->seller_id = $seller_id;
    }
    public static function getSellerId($user_id)
    {
        require 'config.php';
        $sql = "SELECT seller_id FROM seller WHERE customer_id = $user_id ";
        $res = mysqli_query($conn, $sql);
        $row = $res->fetch_assoc();
        return $row['seller_id'];
    }
    public function getNewOrders()
    {
        require 'config.php';
        $sql = "SELECT o.order_id,p.product_name, o.product_id, s.seller_id,o.quantity, o.price, o.buyer_status
        FROM orders o
        JOIN product p ON o.product_id = p.product_id
        JOIN seller s ON p.seller_id = s.seller_id
        WHERE s.seller_id = " . $this->seller_id . " AND o.seller_status = 0";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
    public function updateDeliveryseller($oid){
        require 'config.php';
        $sql = "UPDATE orders
                SET seller_status = 1
                WHERE order_id = $oid";
        if(mysqli_query($conn,$sql)){
            return true;
        }else{
            return false;
        }
    }
    public function getOrProductDetail($oid)
    {
        require 'config.php';
        $sql = "SELECT o.order_id,p.product_name, o.customer_id, o.product_id, s.seller_id,o.quantity, o.price, o.buyer_status, c.first_name, c.last_name, c.phone_number,c.email,c.address,o.buyer_status,o.seller_status
        FROM orders o
        JOIN product p ON o.product_id = p.product_id
        JOIN customer c ON o.customer_id = c.customer_id
        JOIN seller s ON p.seller_id = s.seller_id
        WHERE s.seller_id = " . $this->seller_id . " AND order_id =" . $oid . "";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
    public function getClosedOrders()
    {
        require 'config.php';
        $sql = "SELECT o.order_id, p.product_name, o.price, o.seller_status,o.quantity
                FROM orders o
                JOIN product p ON o.product_id = p.product_id
                JOIN seller s ON p.seller_id = s.seller_id
                WHERE s.seller_id = " . $this->seller_id . " AND o.seller_status = 1 AND o.buyer_status = 1";
        $res = mysqli_query($conn, $sql);
        return $res;
    }

    public static function registerbiz($first_name, $last_name, $phone_number, $email, $address, $password, $biz_name, $role)
    {
        require 'config.php';
        require_once 'Admin.php';
        $sql = "INSERT INTO customer (first_name, last_name, phone_number, email, address, password, role) VALUES (?, ?, ?, ?, ?, ?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssss", $first_name, $last_name, $phone_number, $email, $address, $password, $role);
        if ($stmt->execute()) {
            $sql = "SELECT * from customer ORDER BY customer_id DESC LIMIT 1";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $last_id = $row['customer_id'];
            $sql = "INSERT INTO seller (customer_id,business_name) VALUES (?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("is", $last_id, $biz_name);
            if ($stmt->execute()) {
                Admin::deactivate($last_id);
                echo "Registration Successful!";
            }
        } else {
            echo "Failed to register.";
        }
        $stmt->close();
        $conn->close();
    }
    public function addProduct($name, $price, $main_desc, $stock, $img_1, $img_2, $img_3, $img_4, $desc_1, $desc_2, $desc_3, $desc_4, $desc_5, $desc_6, $type)
    {
        require 'config.php';
        $sql = "INSERT INTO product(seller_id, product_name, price, main_description,stock,cat) VALUES (?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('isisis', $this->user_id, $name, $price, $main_desc, $stock, $type);
        if ($stmt->execute()) {
            $sql = "SELECT * from product ORDER BY product_id DESC LIMIT 1";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $last_id = $row['product_id'];
            $sql = "INSERT INTO productdescription(product_id, description) VALUES(?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('is', $last_id, $desc_1);
            $stmt->execute();
            $stmt->bind_param('is', $last_id, $desc_2);
            $stmt->execute();
            $stmt->bind_param('is', $last_id, $desc_3);
            $stmt->execute();
            $stmt->bind_param('is', $last_id, $desc_4);
            $stmt->execute();
            $stmt->bind_param('is', $last_id, $desc_5);
            $stmt->execute();
            $stmt->bind_param('is', $last_id, $desc_6);
            if ($stmt->execute()) {
                mkdir('../../Images/' . $last_id, 777, true);
                $destinationFolder = '../../Images/' . $last_id . '/';
                $uploadedPaths = [];
                if (!empty($img_1)) {
                    $uploadedPath = $this->uploadFile($img_1, $destinationFolder);
                    if ($uploadedPath) {
                        $uploadedPaths[] = $uploadedPath;
                    }
                }
                if (!empty($img_2)) {
                    $uploadedPath = $this->uploadFile($img_2, $destinationFolder);
                    if ($uploadedPath) {
                        $uploadedPaths[] = $uploadedPath;
                    }
                }
                if (!empty($img_3)) {
                    $uploadedPath = $this->uploadFile($img_3, $destinationFolder);
                    if ($uploadedPath) {
                        $uploadedPaths[] = $uploadedPath;
                    }
                }
                if (!empty($img_4)) {
                    $uploadedPath = $this->uploadFile($img_4, $destinationFolder);
                    if ($uploadedPath) {
                        $uploadedPaths[] = $uploadedPath;
                    }
                }
                foreach ($uploadedPaths as $path) {
                    $sql = "INSERT INTO image (product_id,url) VALUES ($last_id, '$path')";
                    mysqli_query($conn, $sql);
                }
                echo 'Product uploaded successfully.';
            }
        }

    }
    private function uploadFile($file, $destinationFolder)
    {
        $fileName = basename($file['name']);
        $targetPath = $destinationFolder . $fileName;
        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            return $targetPath;
        } else {
            return error_get_last();
        }
    }
    public function getMyProducts()
    {
        require 'config.php';
        $sql = 'SELECT p.product_id,p.product_name, p.stock, i.url FROM product AS p
        INNER JOIN(
                    SELECT product_id, url
                    FROM image
                    GROUP BY product_id
        ) AS i ON p.product_id = i.product_id
        WHERE p.seller_id =' . $this->seller_id . ' AND p.active = 1';
        $result = mysqli_query($conn, $sql);
        return $result;
    }
    public function getUserInfo()
    {
        require 'config.php';
        $sql = 'SELECT c.first_name, c.last_name, s.business_name, c.email, c.phone_number, c.address
        FROM customer AS c
        INNER JOIN seller AS s ON s.customer_id = c.customer_id
        WHERE c.customer_id = ' . $this->user_id . '';
        $result = mysqli_query($conn, $sql);
        return $result;
    }
    public function updateSellerInfo($fn, $ln, $email, $phno, $add, $bn)
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
        $stmt->bind_param('ssissi', $fn, $ln, $phno, $email, $add, $this->user_id);
        if ($stmt->execute()) {
            $sql = 'UPDATE seller
            SET business_name = ?
            WHERE customer_id = ?';
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('si', $bn, $this->user_id);
            if ($stmt->execute()) {
                echo 'Information updated successfully.';
            } else {
                echo 'Failed to update information';
            }
        }
    }
    public static function getProduct($pid)
    {
        require 'config.php';
        $sql = "SELECT p.product_name, p.main_description, p.stock, p.price, i.url
        FROM product p
        INNER JOIN (
            SELECT url
            FROM image
            WHERE product_id = " . $pid . "
            LIMIT 1 
        ) i ON p.product_id =" . $pid . "
        WHERE p.product_id = " . $pid . "";
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_assoc();
        return $row;
    }
    public static function updateProduct($pid, $pname, $pdesc, $pstock, $pprice)
    {
        require 'config.php';
        $sql = "UPDATE product
        SET product_name = ?,
            price = ?,
            main_description = ?,
            stock = ?
        WHERE product_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sisis', $pname, $pprice, $pdesc, $pstock, $pid);
        if ($stmt->execute()) {
            echo 'Product updated successfully.';
        } else {
            echo 'Product update failed';
        }
    }
    public static function removeProduct($pid)
    {
        require 'config.php';
        $sql = 'UPDATE product
        SET active = 0
        WHERE product_id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $pid);
        if ($stmt->execute()) {
            header('location: ../FrontEnd/View/bizmanagment.php');
        } else {
            echo 'Failed to remove the item';
        }
    }
    public function getTotalSales()
    {
        require 'config.php';
        $sql = "SELECT o.order_id
        FROM orders o
        JOIN product p ON o.product_id = p.product_id
        JOIN seller s ON p.seller_id = s.seller_id
        WHERE s.seller_id =" . $this->seller_id . " AND o.seller_status = 1";
        $res = mysqli_query($conn, $sql);
        return mysqli_num_rows($res);
    }
    public function getTotalRevenue()
    {
        require 'config.php';
        $sql = "SELECT o.price
        FROM orders o
        JOIN product p ON o.product_id = p.product_id
        JOIN seller s ON p.seller_id = s.seller_id
        WHERE s.seller_id =" . $this->seller_id . " AND o.seller_status = 1";
        $res = mysqli_query($conn, $sql);
        $total = 0;
        if ($res != false) {
            while ($row = $res->fetch_assoc()) {
                $total += $row['price'];
            }
        }
        return $total;
    }
    public function getAvrating()
    {
        require 'config.php';
        $sql = "SELECT rating FROM product 
                WHERE seller_id = " . $this->seller_id . " ";
        $res = mysqli_query($conn, $sql);
        $num_rows = mysqli_num_rows($res);
        $total = 0;
        if ($res != false) {
            while ($row = $res->fetch_assoc()) {
                $total += $row['rating'];
            }
            if($total != 0){
                $total /= $num_rows;
                return $total;
            }else{
                return 0;
            }
            
        }
        return $total;
        
    }


}

?>