<?php
    $con = new mysqli("localhost","root","","database_hotels");

    // Check connection kiểm tra phát sinh lỗi
    if ($con -> connect_errno) {
        "Kết nối mysqli lỗi: " . $con->connect_error;
        exit();
    }
?>