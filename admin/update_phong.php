<?php
include('db.php');

if (isset($_POST['save'])) {
    $id = $_POST['id'];
    $tenp = $_POST['tenp'];
       
    $tt = $_POST['tt'];

    $idlp = $_POST['idlp'];
    $idks = $_POST['idks'];
    // xử lý hình ảnh
    $anh = $_FILES['anh']['name'];
    $anh_tmp = $_FILES['anh']['tmp_name'];
    $anh = time() . '_' . $anh;

    $update_query = "UPDATE phong SET TENPHONG='$tenp', TRANGTHAI='$tt', IDLOAIPHONG='$idlp', IDKS='$idks' , ANHPHONG='$anh' WHERE IDPHONG=$id";
    $update_result = mysqli_query($con, $update_query);

    if (move_uploaded_file($anh_tmp, './update_img/' . $anh)) {
        header("location: phong.php");
        exit();
    } else {
        echo "File upload failed.";
    }
} else {
    echo "Invalid request.";
}
?>
