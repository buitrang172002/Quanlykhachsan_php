<?php
include('db.php');

if (isset($_POST['save'])) {
   
    $id = $_POST['id'];
    $tendm = $_POST['tendm'];
    $idncc = $_POST['idncc'];
    $idks = $_POST['idks'];

    $update_query = "UPDATE danhmuc SET LOAIDM='$tendm', IDNCC='$idncc' , IDKS='$idks' WHERE IDDM=$id";
    $update_result = mysqli_query($con, $update_query);

    if ($update_result) {
      
        header("location: danhmuc.php");
        exit(); 
    } else {
        echo "Update failed: " . mysqli_error($con);
    }
} else {
    echo "Invalid request.";
}
?>
