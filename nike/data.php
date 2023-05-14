<?php
    $servername = "localhost";
    $database = "shopnike";
    $username = "root";
    $password = "password";

    global $conn;
    $conn = mysqli_connect($servername, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    mysqli_select_db($conn, $database);
?> 
