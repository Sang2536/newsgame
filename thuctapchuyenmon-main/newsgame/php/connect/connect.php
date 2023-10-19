<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'thuctapchuyenmon';

    //  tạo kết nối đến db
    $conn = mysqli_connect($servername, $username, $password, $database);

    //  kiểm tra kết nối đến db
    if (!$conn) {
        die('Kết nối đến MySQL thất bại. Do ' .mysqli_connect_error());
    }
?>