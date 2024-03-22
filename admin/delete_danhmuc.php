<?php
include('db.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Perform the delete operation
    $query = "DELETE FROM danhmuc WHERE IDDM = $id";
    $result = mysqli_query($con, $query);

    if($result) {
        // Redirect back to the original page after successful delete
        header("Location: danhmuc.php");
        exit();
    } else {
        echo "Delete failed. Please try again.";
    }
} else {
    echo "Invalid request.";
}
?>
