<?php
include('db.php');

if (isset($_POST['save'])) {
 
    $id = $_POST['id'];
    $tenu = $_POST['tenu'];
    $tendn = $_POST['tendn'];
    $pass = $_POST['pass'];
  
    $update_query = "UPDATE user SET FULLNAME='$tenu', USERNAME='$tendn' , password='$pass' WHERE IDUSER=$id";
    $update_result = mysqli_query($con, $update_query);

    if ($update_result) {
       
        header("location: usersetting.php");
        exit(); 
    } else {
        echo "Update failed: " . mysqli_error($con);
    }
} else {
    echo "Invalid request.";
}
?>
