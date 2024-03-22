<?php
include('db.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM khachsan WHERE IDKS = $id";
    $result = mysqli_query($con, $query);

    if($result) {
        header("Location: khachsan.php");
        exit();
    } else {
        echo "Xóa không thành công. Vui lòng thử lại.";
    }
} else {
    echo "Yêu cầu không hợp lệ.";
}
?>