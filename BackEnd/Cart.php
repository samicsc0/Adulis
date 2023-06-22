<?php
class Cart
{
    public $user_id;
    function __construct($user_id)
    {
        $this->user_id = $user_id;
    }

    public function getMyCart()
    {
        require 'config.php';
        $cart_id = $this->returnCartId();
        $sql = "SELECT (
            SELECT i.url
            FROM image i
            WHERE i.product_id = ci.product_id
            LIMIT 1
          ) AS url, p.product_name, ci.quantity, ci.price, ci.item_id
        FROM cartitem ci
        JOIN product p ON p.product_id = ci.product_id
        JOIN cart c ON c.cart_id = ci.cart_id
        WHERE c.customer_id = $this->user_id
          AND c.cart_id = $cart_id
        ";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
    public function cartItem($item)
    {
        require 'config.php';
        $sql = "SELECT quantity FROM cartitem WHERE item_id = $item";
        $res = mysqli_query($conn, $sql);
        $row = $res->fetch_assoc();
        return $row['quantity'];
    }
    // public function getProductInfo($item_id){
    //     require 'config.php';
    //     $sql = "SELECT product_id FROM cartitem WHERE item_id = $item_id";
    //     $result = mysqli_query($conn,$sql);
    //     $row = $result->fetch_assoc();
    //     $prid = $row['product_id'];
    //     $sql = "SELECT price, stock from product WHERE product_id = $prid";
    //     $result = mysqli_query($conn,$sql);
    //     $row = $result->fetch_assoc();
    //     return $row;
    // }
    public function getProductInfo($item_id)
    {
        require 'config.php';
        $sql = "SELECT * FROM cartitem WHERE item_id = $item_id";
        $result = mysqli_query($conn, $sql);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $prid = $row['product_id'];
            $sql = "SELECT price, stock from product WHERE product_id = $prid";
            $result = mysqli_query($conn, $sql);

            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row;
            } else {
                echo "Error: Unable to fetch product information.";
            }
        } else {
            echo "Error: Item not found in the cart.";
        }
    }

    public function returnCartId()
    {
        require 'config.php';
        $sql = "SELECT * FROM cart WHERE customer_id = $this->user_id ORDER BY cart_id DESC LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_assoc();
        $id = $row['cart_id'];
        if ($row['status'] == 'open') {
            return $id;
        } else {
            $sql = "INSERT INTO cart (customer_id)
                                VALUES($this->user_id)";
            mysqli_query($conn, $sql);
            $sql = "SELECT * FROM cart WHERE customer_id = $this->user_id ORDER BY cart_id DESC LIMIT 1";
            $result = mysqli_query($conn, $sql);
            $row = $result->fetch_assoc();
            $id = $row['cart_id'];
            return $id;
        }
    }
    public function cartItemExist($product_id)
    {
        require 'config.php';
        $cart_id = $this->returnCartId();
        $sql = "SELECT * FROM cartitem WHERE cart_id = $cart_id AND product_id = $product_id";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num == 0) {
            return false;
        } else {
            return true;
        }

    }
    public function addToCart($product_id, $price)
    {
        require 'config.php';
        $cart_id = $this->returnCartId();
        $sql = "INSERT INTO cartitem (cart_id, product_id,quantity, price)
                            VALUES($cart_id,$product_id,1,$price)";
        mysqli_query($conn, $sql);
        header('location: ../FrontEnd/View/index.php');
    }
    public function updateCart($item_id, $quantity, $price)
    {
        require 'config.php';
        $sql = "UPDATE cartitem 
                SET quantity = $quantity,
                    price = $price WHERE item_id = $item_id";
        mysqli_query($conn, $sql);
    }
    public function removeCartItem($item_id)
    {
        require 'config.php';
        $sql = "DELETE FROM cartitem WHERE item_id = $item_id";
        mysqli_query($conn, $sql);
    }
    public function getCartPrice($cart_id)
    {
        require 'config.php';
        $sql = "SELECT price FROM cartitem WHERE cart_id = $cart_id";
        $result = mysqli_query($conn, $sql);
        $total = 0;
        while ($row = $result->fetch_assoc()) {
            $total = $total + $row['price'];
        }
        return $total;
    }
    public function checkCart($cart_id)
    {
        require 'config.php';
        require 'Seller.php';
        $sql = "SELECT * FROM cartitem WHERE cart_id = $cart_id";
        $result = mysqli_query($conn, $sql);
        while ($row = $result->fetch_assoc()) {
            if ($row['quantity'] > Seller::getProduct($row['product_id'])['stock']) {
                $this->updateCart($row['item_id'], Seller::getProduct($row['product_id'])['stock'], Seller::getProduct($row['product_id'])['stock'] * Seller::getProduct($row['product_id'])['price']);
            }
        }
    }
    public function close_cart($cart_id)
    {
        require 'config.php';
        $sql = "UPDATE cart 
                SET status = 'closed'
                WHERE cart_id = $cart_id";
        mysqli_query($conn, $sql);
    }
}
?>