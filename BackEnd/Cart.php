<?php
class Cart
{
    public $customer_id;
    public $product_id;
    public $qantity;
    public $price;

    public  function getMyCart($customer_id){
        require 'config.php';
        $cart_id = $this->returnCartId($customer_id);
        $sql = "SELECT (
            SELECT i.url
            FROM image i
            WHERE i.product_id = ci.product_id
            LIMIT 1
          ) AS url, p.product_name, ci.quantity, ci.price, ci.item_id
        FROM cartitem ci
        JOIN product p ON p.product_id = ci.product_id
        JOIN cart c ON c.cart_id = ci.cart_id
        WHERE c.customer_id = $customer_id
          AND c.cart_id = $cart_id
        ";
        $result = mysqli_query($conn,$sql);
        return $result;
    }
    public function cartItem($item){
        require 'config.php';
        $sql = "SELECT quantity FROM cartitem WHERE item_id = $item";
        $res = mysqli_query($conn,$sql);
        $row = $res->fetch_assoc();
        return $row['quantity'];
    }
    public function getProductInfo($item_id){
        require 'config.php';
        $sql = "SELECT product_id FROM cartitem WHERE item_id = $item_id";
        $result = mysqli_query($conn,$sql);
        $row = $result->fetch_assoc();
        $prid = $row['product_id'];
        $sql = "SELECT price, stock from product WHERE product_id = $prid";
        $result = mysqli_query($conn,$sql);
        $row = $result->fetch_assoc();
        return $row;
    }
    public function returnCartId($customer_id)
    {
        require 'config.php';
        $sql = "SELECT * FROM cart WHERE customer_id = $customer_id ORDER BY cart_id DESC LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_assoc();
        $id = $row['cart_id'];
        if ($row['status'] == 'open') {
            return $id;
        } else {
            $sql = "INSERT INTO cart (customer_id)
                                VALUES($customer_id)";
            mysqli_query($conn, $sql);
            $sql = "SELECT * FROM cart WHERE customer_id = $customer_id ORDER BY cart_id DESC LIMIT 1";
            $result = mysqli_query($conn, $sql);
            $row = $result->fetch_assoc();
            $id = $row['cart_id'];
            return $id;
        }
    }
    public function cartItemExist($customer_id,$product_id){
        require 'config.php';
        $cart_id = $this->returnCartId($customer_id);
        $sql = "SELECT * FROM cartitem WHERE cart_id = $cart_id AND product_id = $product_id";
        $result = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);
        if($num == 0){
            return false;
        }else{
            return true;
        }
        
    }
    public function addToCart($customer_id, $product_id, $price)
    {
        require 'config.php';
        $cart_id = $this->returnCartId($customer_id);
        $sql = "INSERT INTO cartitem (cart_id, product_id,quantity, price)
                            VALUES($cart_id,$product_id,1,$price)";
        mysqli_query($conn,$sql);
        header('location: ../FrontEnd/View/index.php');
    }
    public function updateCart($item_id,$quantity,$price){
        require 'config.php';
        $sql = "UPDATE cartitem 
                SET quantity = $quantity,
                    price = $price WHERE item_id = $item_id";
        mysqli_query($conn,$sql);
    }
    public function removeCartItem($item_id){
        require 'config.php';
        $sql = "DELETE FROM cartitem WHERE item_id = $item_id";
        mysqli_query($conn,$sql);
    }
}
?>