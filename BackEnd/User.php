<?php
    
class User{
    public $user_id;
    public $first_name;
    public $last_name;
    public $phone_number;
    public $email;
    public $address;
    public $password;  
    public $role;
    public $acct_status; 
    function __construct($first_name  = null,$last_name  = null,$phone_number  = null,$email  = null,$address  = null,$password = null)
    {
        if ($first_name !== null && $last_name !== null && $phone_number !== null && $email !== null && $address !== null && $password !== null) {
            $this->first_name = $first_name;
            $this->last_name = $last_name;
            $this->phone_number = $phone_number;
            $this->email = $email;
            $this->address = $address;
            $this->password = $password;
            $this->role = 'buyer';
        } elseif ($email !== null && $password !== null) {
            $this->email = $email;
            $this->password = $password;
        } else {
            throw new Exception("Invalid constructor parameters.");
        }
    }
    public function register(){
        require 'config.php';
        $sql = "INSERT INTO customer (first_name, last_name, phone_number, email, address, password, role) VALUES (?, ?, ?, ?, ?, ?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssss", $this->first_name, $this->last_name, $this->phone_number,$this->email, $this->address, $this->password, $this->role);
        if($stmt->execute()){
            echo "Registration Successful!";
        }else{
            echo "Error: ".$stmt->error;
        }
        $stmt->close();
        $conn->close();
    }
    public function login(){
        require 'config.php';
        $sql = "SELECT * FROM customer WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s",$this->email);
        $stmt->execute();
        $result = $stmt->get_result();
        if(mysqli_num_rows($result) === 1){
            $row = $result->fetch_assoc();
            $passwd = $row['password'];
            $newpass = $this->password;
            if(hash_equals($passwd,$newpass)){
                echo "Login Successful";
            }else{
                echo "Incorrect password!";
            }
        }else{
            echo "User not found!";
        }
    }
}
?>