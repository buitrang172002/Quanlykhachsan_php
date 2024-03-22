<?php
include('db.php');

if (isset($_POST['save'])) {
 
    $id = $_POST['id'];
    $tenncc = $_POST['tenncc'];
    $sdt = $_POST['sdt'];
    $email = $_POST['email'];

  
    $update_query = "UPDATE nhacc SET TENNCC='$tenncc', SDT='$sdt', EMAIL='$email' WHERE IDNCC=$id";
    $update_result = mysqli_query($con, $update_query);

    if ($update_result) {
       
        header("location: nhacungcap.php");
        exit(); 
    } else {
        echo "Update failed: " . mysqli_error($con);
    }
} else {
    echo "Invalid request.";
}
?>
