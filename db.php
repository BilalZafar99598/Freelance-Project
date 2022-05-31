<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'phptest';
    $port = 3306;
    
    // Create Connection
    $conn = new mysqli($servername,$username,$password,$database,$port);
    
    // Check Connection
    if($conn->connect_error){
        die('Connection Error:'.$conn->connect_error);
    }
    
    
?>