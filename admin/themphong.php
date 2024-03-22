<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("location:index.php");
    exit();
}

include('db.php');

$query_loaiphong = "SELECT * FROM loaiphong";
$result_loaiphong = mysqli_query($con, $query_loaiphong);

$query_khachsan = "SELECT * FROM khachsan";
$result_khachsan = mysqli_query($con, $query_khachsan);

$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $tenp = $_POST['tenp'];
    $tt = $_POST['tt'];
    $idlp = $_POST['idlp'];
    $idks = $_POST['idks'];

    $check_query = "SELECT * FROM phong WHERE IDPHONG = '$id'";
    $check_result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        $error_message = "ID phòng đã tồn tại. Vui lòng chọn một ID khác.";
    } else {
        // xử lý hình ảnh
        $anh = $_FILES['anh']['name'];
        $anh_tmp = $_FILES['anh']['tmp_name'];
        $anh = time() . '_' . $anh;

        $insert_query = "INSERT INTO phong (IDPHONG, TENPHONG, TRANGTHAI, IDLOAIPHONG, IDKS, ANHPHONG) VALUES ('$id', '$tenp', '$tt', '$idlp', '$idks', '$anh')";
        $insert_result = mysqli_query($con, $insert_query);

        if ($insert_result === false) {
            die("Insert failed: " . mysqli_error($con));
        }

        if (move_uploaded_file($anh_tmp, './update_img/' . $anh)) {
            header("location: phong.php");
            exit();
        } else {
            $error_message = "File upload failed.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUNRISE HOTEL - Thêm phòng</title>
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

        .hinhnen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
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

        input, select {
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
        .error-message {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="imag/nen.jpg" class="hinhnen">
        <h2>Thêm phòng khách sạn</h2>
        <hr>
        <p class="error-message"><?php echo $error_message; ?></p>
        <form action="" method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label for="id">ID phòng:</label>
                <input type="text" name="id" required>
            </div>
            <div class="form-group">
                <label for="tenp">Tên phòng:</label>
                <input type="text" name="tenp" required>
            </div>

            <div class="form-group">
                <label for="tt">Trạng thái phòng:</label>
                <select name="tt" required>
                    <option value="0">Chưa đặt phòng</option>
                    <option value="1">Đã đặt phòng</option>
                </select>
            </div>

            <div class="form-group">
                <label for="idlp">ID Loại phòng:</label>
                <select name="idlp" required>
                    <?php
                    while ($row_loaiphong = mysqli_fetch_assoc($result_loaiphong)) {
                        echo "<option value='" . $row_loaiphong['IDLOAIPHONG'] . "'>" . $row_loaiphong['IDLOAIPHONG'] . " - " . $row_loaiphong['TEN'] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="idks">ID khách sạn:</label>
                <select name="idks" required>
                    <?php
                    while ($row_khachsan = mysqli_fetch_assoc($result_khachsan)) {
                        echo "<option value='" . $row_khachsan['IDKS'] . "'>" . $row_khachsan['IDKS'] . " - " . $row_khachsan['TENKS'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="anh">Hình ảnh phòng:</label>
                <input type="file" name="anh" required>
            </div>        
            <div class="form-group">
                <input type="submit" value="Thêm">
            </div>
        </form>
    </div>
</body>
</html>
