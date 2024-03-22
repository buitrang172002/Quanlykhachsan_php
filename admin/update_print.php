<?php
include('db.php');

if (isset($_POST['save'])) {
    $id = $_POST['id'];
    $ttthanhtoan = $_POST['ttthanhtoan'];   

    $update_query = "UPDATE datphong SET TRANGTHAITT='$ttthanhtoan' WHERE IDDP=$id";
    $update_result = mysqli_query($con, $update_query);

    if ($update_result) {
       
        header("location: payment.php");
        exit(); 
    } else {
        echo "Update failed: " . mysqli_error($con);
    }
} else {
    echo "Invalid request.";
}
?>
