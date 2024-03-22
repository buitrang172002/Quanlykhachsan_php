<?php
include('db.php');

if (isset($_POST['save'])) {
 
    $id = $_POST['id'];
    $tenlp = $_POST['tenlp'];
    $gia = $_POST['gia'];

  
    $update_query = "UPDATE loaiphong SET TEN='$tenlp', DONGIA='$gia' WHERE IDLOAIPHONG=$id";
    $update_result = mysqli_query($con, $update_query);

    if ($update_result) {
       
        header("location: loaiphong.php");
        exit(); 
    } else {
        echo "Update failed: " . mysqli_error($con);
    }
} else {
    echo "Invalid request.";
}
?>
