<?php
include('db.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];

   
    $query = "DELETE FROM datphong WHERE IDDP = $id";
    $result = mysqli_query($con, $query);

    if($result) {
     
        header("Location: datphong.php");
        exit();
    } else {
        echo "Delete failed. Please try again.";
    }
} else {
    echo "Invalid request.";
}
?>
