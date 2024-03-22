<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("location:index.php");
    exit();
}

include('db.php');

$error_message = ""; // Initialize the error message variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];
    $idkh = $_POST['idkh'];
    $idp = $_POST['idp'];
    $ngaydat = $_POST['ngaydat'];
    $ngaytra = $_POST['ngaytra'];
    $iduser = $_POST['iduser'];

    $timestampNgayDat = strtotime($ngaydat);
    $timestampNgayTra = strtotime($ngaytra);

    // Tính hiệu giữa hai timestamp
    $timeo = $timestampNgayTra - $timestampNgayDat;

    $gio = floor($timeo / 3600);

    $idphong_query = "SELECT p.IDLOAIPHONG, lp.DONGIA
                      FROM phong p
                      INNER JOIN loaiphong lp ON p.IDLOAIPHONG = lp.IDLOAIPHONG
                      WHERE p.IDPHONG = '$idp'";
    $idphong_result = mysqli_query($con, $idphong_query);

    if ($idphong_result && $row = mysqli_fetch_assoc($idphong_result)) {
        $idloaiphong = $row['IDLOAIPHONG'];
        $dongia = $row['DONGIA'];

        $thanhtoan = ($dongia / 24.0) * $gio;
    } else {
        echo "Error fetching IDLOAIPHONG and DONGIA";
        exit();
    }

    $check_query = "SELECT TRANGTHAI FROM phong WHERE IDPHONG = '$idp'";
        $check_result = mysqli_query($con, $check_query);

        $row = mysqli_fetch_assoc($check_result);

        if ($row['TRANGTHAI'] == 1) {
            $error_message = "Đã có ID phòng đặt trước hoặc phòng đó đã có người đặt. Vui lòng nhập ID phòng khác hoặc phòng khác";
        } else {
        $insert_query = "INSERT INTO datphong (IDDP, IDKH, IDPHONG, NGAYDAT, NGAYTRA, TIMEO, IDUSER, THANHTOAN) 
                         VALUES ('$id', '$idkh', '$idp', '$ngaydat', '$ngaytra', '$gio', '$iduser', '$thanhtoan')";

        $insert_result = mysqli_query($con, $insert_query);

        if ($insert_result) {

            $update_query = "UPDATE phong SET TRANGTHAI = 1 WHERE IDPHONG = '$idp'";

            $update_result = mysqli_query($con, $update_query);

            if (!$update_result) {
                echo "Error updating TRANGTHAI: " . mysqli_error($con);
                exit();
            }

            header("location: datphong.php");
            exit();
        } else {
            echo "Insert failed: " . mysqli_error($con);
        }
    }
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SUNRISE HOTEL - Đặt phòng</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-top: 8px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #428bca;
            color: white;
            padding: 10px 20px;
            border: 1px solid #428bca;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #3276b1;
            border-color: #285e8e;
        }

        input[type="submit"]:focus {
            outline: none;
        }

        .hinhnen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        .error-message {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <img src="imag/nen.jpg" class="hinhnen">
        <h2>Đặt phòng</h2>
        <hr>
        <?php if (!empty($error_message)) { ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php } ?>
        <form action="" method="POST">
            <div class="form-group">
                <label for="id">ID phòng đặt:</label>
                <input type="number" name="id" required min="1" max="200">
            </div>

            <div class="form-group">
                <label for="idkh">ID danh khách hàng:</label>
                <select name="idkh" required>
                    <?php

                    $iddm_query = "SELECT IDKH, TENKH FROM ttkhachhang";
                    $iddm_result = mysqli_query($con, $iddm_query);

                    while ($iddm_row = mysqli_fetch_assoc($iddm_result)) {

                        echo "<option value='" . $iddm_row['IDKH'] . "'>" . $iddm_row['IDKH'] . " - " . $iddm_row['TENKH'] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="idp">ID phòng:</label>
                <select name="idp" required>
                    <?php

                    $iddm_query = "SELECT IDPHONG FROM phong";
                    $iddm_result = mysqli_query($con, $iddm_query);

                    while ($iddm_row = mysqli_fetch_assoc($iddm_result)) {
                        echo "<option value='{$iddm_row['IDPHONG']}'>{$iddm_row['IDPHONG']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="ngaydat">Ngày đặt:</label>
                <input type="datetime-local" name="ngaydat" required>
            </div>

            <div class="form-group">
                <label for="ngaytra">Ngày trả:</label>
                <input type="datetime-local" name="ngaytra" required>
            </div>

            <div class="form-group">
                <label for="iduser">ID nhân viên:</label>
                <select name="iduser" required>
                    <?php

                    $iddm_query = "SELECT *FROM user";
                    $iddm_result = mysqli_query($con, $iddm_query);

                    while ($iddm_row = mysqli_fetch_assoc($iddm_result)) {
                        echo "<option value='" . $iddm_row['IDUSER'] . "'>" . $iddm_row['IDUSER'] . " - " . $iddm_row['USERNAME'] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <input type="submit" value="Đặt phòng">
            </div>
        </form>
    </div>
</body>

</html>
