<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("location:index.php");
    exit(); 
}

include('db.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $id = $_POST['id'];
    $tenkh = $_POST['tenkh'];
    $sdt = $_POST['sdt'];
    $email = $_POST['email'];
    $cccd = $_POST['cccd'];
    $dc = $_POST['dc'];

   
    $check_query = "SELECT * FROM ttkhachhang WHERE IDKH = '$id'";
    $check_result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        $error_message = "ID phòng đã tồn tại. Vui lòng chọn một ID khác.";
    } else {
        
        $insert_query = "INSERT INTO ttkhachhang (IDKH, TENKH, SDT, EMAIL, CCCD, DIACHI) VALUES ('$id', '$tenkh', '$sdt', '$email', '$cccd', '$dc')";
        $insert_result = mysqli_query($con, $insert_query);

        if ($insert_result) {
          
            header("location: khachhang.php");
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
        <h2>Thêm khách hàng</h2>
        <hr>
        <?php if (!empty($error_message)) { ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php } ?>
        <form action="" method="POST" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="id">ID khách hàng:</label>
                <input type="number" name="id" required min="1" max="200">
            </div>

            <div class="form-group">
                <label for="tenkh">Tên khách hàng:</label>
                <input type="text" name="tenkh" required>
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
                <label for="cccd">CCCD:</label>
                <input type="text" name="cccd" id="cccdInput" required>
            </div>

            <div class="form-group">
                <label for="dc">Địa chỉ:</label>
                <input type="text" name="dc" required>
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
                var cccdInput = document.getElementById("cccdInput");
                if (cccdInput.value.length !== 12 || isNaN(cccdInput.value)) {
                    alert("CCCD phải có đúng 12 chữ số và là số.");
                    return false;
                }
                return true;
            }
        </script>
    </div>
</body>
</html>
