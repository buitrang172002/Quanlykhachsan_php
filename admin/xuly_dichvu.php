<?php
include('db.php');

if (isset($_POST['save'])) {
    // Sanitize input
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $dv = mysqli_real_escape_string($con, $_POST['dv']);
    $idp = mysqli_real_escape_string($con, $_POST['idp']);

    // Update query to increment sodvsd by 1
    $update_query = "UPDATE datphong 
                     SET THANHTOAN = THANHTOAN + '$dv',
                         sodvsd = sodvsd + 1
                     WHERE IDDP = $id";

    $update_result = mysqli_query($con, $update_query);

    if ($update_result) {
        header("location: datphong.php");
        exit();
    } else {
        echo "Update failed. Please try again later.";
        echo "<br>Error: " . mysqli_error($con);

        error_log("Update failed for IDDP=$id: " . mysqli_error($con), 3, "error.log");
    }
} else {
    echo "Invalid request.";
}
?>
