<?php
require_once 'User.php';
class Admin extends User
{
    function __construct($first_name  = null,$last_name  = null,$phone_number  = null,$email  = null,$address  = null,$password = null){
        $this->email = $email;
     }   
    public static function listSellers()
    {
        require 'config.php';
        $sql = "SELECT seller.business_name, customer.first_name, customer.last_name, customer.phone_number, customer.address, customer.acct_status, seller.review 
        FROM customer 
        INNER JOIN seller ON customer.customer_id = seller.customer_id 
        WHERE seller.review = 1
        ORDER BY seller.business_name ASC;
        ";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
    public static function newSellers()
    {
        require 'config.php';
        $sql = "SELECT seller.business_name, customer.first_name, customer.last_name, customer.phone_number, customer.address, customer.acct_status, seller.review 
        FROM customer 
        INNER JOIN seller ON customer.customer_id = seller.customer_id 
        WHERE seller.review = 0 
        ORDER BY seller.business_name ASC;
        ";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
    public static function listBuyers(){
        require 'config.php';
        $sql = "SELECT first_name, last_name, phone_number, address, acct_status
        FROM customer
        WHERE role = 'buyer' ";
        $result = mysqli_query($conn,$sql);
        return $result;
    }
    public static function updateDeliveryPrice($price){
        require 'config.php';
        $sql = "UPDATE delivery_price 
        SET price = ? 
        WHERE id = 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i',$price);
        if($stmt->execute()){
            echo "Price Updated successfully!";
        }else{
            echo $stmt->error;
        }
    }
    public static function getDeliveryPrice(){
        require 'config.php';
        $sql = "SELECT price FROM delivery_price
        WHERE id = 1";
        $result = mysqli_query($conn,$sql);
        return $result;
    }
    public static function deactivate($id)
    {
        require 'config.php';
        $sql = 'UPDATE  customer SET acct_status = 0 where customer_id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        if (!$stmt->execute()) {
            $stmt->error;
        }
    }
}
?>