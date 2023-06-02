<?php
$dbhost = 'localhost:9090';
$dbuser = 'root';
$dbpass = '';
$db = 'aduils';
/* form variables */
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db); 
if(!$conn){
    die('Database connection failed: ' . mysqli_connect_error());
}
?>