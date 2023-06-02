<?php
    require 'User.php';
    class Seller extends User{
        public $seller_id;
        public $business_name;
     function __construct($first_name  = null,$last_name  = null,$phone_number  = null,$email  = null,$address  = null,$password = null,$business_name){
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->phone_number = $phone_number;
        $this->email = $email;
        $this->address = $address;
        $this->password = $password;
        $this->role = 'seller';
        $this->business_name = $business_name;
     }   

     public function register(){
        require 'config.php';
        $sql = "INSERT INTO customer (first_name, last_name, phone_number, email, address, password, role) VALUES (?, ?, ?, ?, ?, ?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssss", $this->first_name, $this->last_name, $this->phone_number,$this->email, $this->address, $this->password, $this->role);
        if($stmt->execute()){
            $sql = "SELECT * from customer ORDER BY customer_id DESC LIMIT 1";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
            $last_id = $row['customer_id'];
            $sql = "INSERT INTO seller (customer_id,business_name) VALUES (?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("is",$last_id,$this->business_name);
            if($stmt->execute()){
                echo "Registration Successful!";
            }
        }else{
            echo "Error: ".$stmt->error;
        }
        $stmt->close();
        $conn->close();
    }
    }
?>