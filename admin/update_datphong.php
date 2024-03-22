<?php
include('db.php');

if (isset($_POST['save'])) {
    $id = $_POST['id'];
    $ngaytra = $_POST['ngaytra'];
    $idp = $_POST['idp'];

    $idphong_query = "SELECT p.IDLOAIPHONG, lp.DONGIA
                      FROM phong p
                      INNER JOIN loaiphong lp ON p.IDLOAIPHONG = lp.IDLOAIPHONG
                      WHERE p.IDPHONG = '$idp'";
    $idphong_result = mysqli_query($con, $idphong_query);

    if ($idphong_result && $row = mysqli_fetch_assoc($idphong_result)) {
        $idloaiphong = $row['IDLOAIPHONG'];
        $dongia = $row['DONGIA'];
    } else {
        // Xử lý lỗi, không thể lấy IDLOAIPHONG và DONGIA
        echo "Error fetching IDLOAIPHONG and DONGIA";
        exit();
    }

    $update_query = "UPDATE datphong 
                     SET NGAYTRA='$ngaytra', 
                         TIMEO = TIMESTAMPDIFF(SECOND, NGAYDAT, '$ngaytra'), 
                         THANHTOAN = $dongia * TIMESTAMPDIFF(SECOND, NGAYDAT, '$ngaytra')
                     WHERE IDDP=$id";
                     
    $update_result = mysqli_query($con, $update_query);

    if ($update_result) {
        header("location: datphong.php");
        exit(); 
    } else {
        echo "Update failed: " . mysqli_error($con);
    }
} else {
    echo "Invalid request.";
}
?>
