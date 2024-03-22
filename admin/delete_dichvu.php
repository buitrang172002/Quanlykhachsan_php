<?php
include('db.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];

   
    $query = "DELETE FROM dichvu WHERE IDDV = $id";
    $result = mysqli_query($con, $query);

    if($result) {
     
        header("Location: dichvu.php");
        exit();
    } else {
        echo "Delete failed. Please try again.";
    }
} else {
    echo "Invalid request.";
}
?>
