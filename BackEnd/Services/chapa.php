<?php 
    $response = array(
        'status' =>'success',
        'message' => 'Successfull'
    );
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
?>