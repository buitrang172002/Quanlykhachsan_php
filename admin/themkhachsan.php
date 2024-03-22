<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION["user"])) {
    header("location:index.php");
    exit(); 
}

include('db.php');

$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    $check_query = "SELECT * FROM khachsan WHERE IDKS = '$id'";
    $check_result = mysqli_query($con, $check_query);

    if ($check_result === false) {
        die("Error checking if IDKS exists: " . mysqli_error($con));
    }

    if (mysqli_num_rows($check_result) > 0) {
        $error_message = "Đã có khách sạn sử dụng ID đó. Hãy nhập ID khác.";
    } else {
        $insert_query = "INSERT INTO khachsan (IDKS, TENKS, SDT, EMAIL, FAX, DIACHI, HINHANH) VALUES ('$id', '$tenks', '$sdt', '$email', '$fax', '$dc', '$anh')";
        $insert_result = mysqli_query($con, $insert_query);

        if ($insert_result === false) {
            die("Insert failed: " . mysqli_error($con));
        }

        if (move_uploaded_file($anh_tmp, './update_img/' . $anh)) {
            header("location: khachsan.php");
            exit();
        } else {
            echo "File upload failed.";
        }
    }
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SUNRISE HOTEL - Thêm nhà cung cấp</title>
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
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #428bca;
            color: white;
            padding: 12px 20px;
            border: 1px solid #428bca;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease-in-out;
        }

        input[type="submit"]:hover {
            background-color: #3276b1;
            border-color: #285e8e;
        }

        input[type="submit"]:focus {
            outline:
            none;
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
    <h2>Thêm khách sạn</h2>
    <hr>

    <?php if (!empty($error_message)) { ?>
        <div class="error-message"><?php echo $error_message; ?></div>
    <?php } ?>

    <form action="" method="POST" onsubmit="return validateForm()" enctype="multipart/form-data">
        <div class="form-group">
            <label for="id">ID khách sạn:</label>
            <input type="number" name="id" required min="1" max="200">
        </div>

        <div class="form-group">
            <label for="tenks">Tên khách sạn:</label>
            <input type="text" name="tenks" required>
        </div>

        <div class="form-group">
            <label for="sdt">Số Điện Thoại:</label>
            <input type="number" name="sdt" id="sdtInput" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="emailInput" required>
        </div>

        <div class="form-group">
            <label for="fax">FAX:</label>
            <input type="text" name="fax" required>
        </div>

        <div class="form-group">
            <label for="dc">Địa chỉ:</label>
            <input type="text" name="dc" required>
        </div>
        
        <div class="form-group">
            <label for="anh">Ảnh khách sạn:</label>
            <input type="file" name="anh" required>
        </div>

        <div class="form-group">
            <input type="submit" value="Thêm">
        </div>
    </form>

    <script>
        function validateForm() {
            var sdtInput = document.getElementById("sdtInput");
            if (sdtInput.value.length !== 10 || isNaN(sdtInput.value)) {
                alert("Số Điện Thoại phải có đúng 10 chữ số và là số.");
                return false;
            }
            var emailInput = document.getElementById("emailInput");
            if (!emailInput.value.endsWith("@gmail.com")) {
                alert("Email phải kết thúc bằng @gmail.com.");
                return false;
            }
            return true;
        }
    </script>
</div>

</body>
</html>
