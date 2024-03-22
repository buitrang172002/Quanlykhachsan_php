<?php
include('db.php');

if (isset($_POST['save'])) {
 
    $id = $_POST['id'];
    $tenks = $_POST['tenks'];
    $sdt = $_POST['sdt'];
    $email = $_POST['email'];
    $fax = $_POST['fax'];
    $dc = $_POST['dc'];

    // xử lý hình ảnh
    $anh = $_FILES['anh']['name'];
    $anh_tmp = $_FILES['anh']['tmp_name'];
    $anh = time() . '_' . $anh;

    $update_query = "UPDATE khachsan SET TENKS='$tenks', SDT='$sdt', EMAIL='$email', FAX='$fax', DIACHI='$dc', HINHANH = '$anh' WHERE IDKS=$id";
    $update_result = mysqli_query($con, $update_query);

    if ($update_result) {
        // Check if the file was uploaded successfully before moving it
        if (move_uploaded_file($anh_tmp, './update_img/' . $anh)) {
            header("location: khachsan.php");
            exit(); 
        } else {
            echo "File upload failed.";
        }
    } else {
        echo "Update failed: " . mysqli_error($con);
    }
} else {
    echo "Invalid request.";
}
?>
