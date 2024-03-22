<?php
include('db.php');

if (isset($_POST['save'])) {
 
    $id = $_POST['id'];
    $tenkh = $_POST['tenkh'];
    $sdt = $_POST['sdt'];
    $email = $_POST['email'];
    $cccd = $_POST['cccd'];
    $dc = $_POST['dc'];
  
    $update_query = "UPDATE ttkhachhang  SET TENKH='$tenkh', SDT='$sdt', EMAIL='$email',  cccd='$cccd',  DIACHI='$dc' WHERE IDKH=$id";
    $update_result = mysqli_query($con, $update_query);

    if ($update_result) {
       
        header("location: khachhang.php");
        exit(); 
    } else {
        echo "Update failed: " . mysqli_error($con);
    }
} else {
    echo "Invalid request.";
}
?>
