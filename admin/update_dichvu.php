<?php
include('db.php');

if (isset($_POST['save'])) {
   
    $id = $_POST['id'];
    $tendv = $_POST['tendv'];
    $thue = $_POST['thue'];
    $gia = $_POST['gia'];
    $iddm = $_POST['iddm'];

  
    $update_query = "UPDATE dichvu SET TENDV='$tendv', THUE='$thue', GIA='$gia', IDDM='$iddm'  WHERE IDDV=$id";
    $update_result = mysqli_query($con, $update_query);

    if ($update_result) {
      
        header("location: dichvu.php");
        exit(); 
    } else {
        echo "Update failed: " . mysqli_error($con);
    }
} else {
    echo "Invalid request.";
}
?>
