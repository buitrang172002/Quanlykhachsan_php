<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("location:index.php");
    exit(); 
}

include('db.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $id = $_POST['id'];
    $tenu = $_POST['tenu'];
    $tendn = $_POST['tendn'];
    $pass = $_POST['pass'];

   
    $check_query = "SELECT * FROM user WHERE IDUSER = '$id'";
    $check_result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        echo "ID already exists. Please choose a different ID.";
    } else {
        
        $insert_query = "INSERT INTO user (IDUSER, FULLNAME, USERNAME, IDROLE, password) VALUES ('$id', '$tenu', '$tendn','1', '$pass')";
        $insert_result = mysqli_query($con, $insert_query);

        if ($insert_result) {
          
            header("location: usersetting.php");
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
    <title>SUNRISE HOTEL - Thêm danh mục dịch vụ</title>
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
    </style>
</head>
<body>
    <div class="container">
    <img src="imag/nen.jpg" class="hinhnen">
        <h2>Thêm tài khoản quản lý</h2>
        <hr>
        <form action="" method="POST">
            <div class="form-group">
               <label for="id">ID tài khoản:</label>
                <input type="number" name="id" required min="1" max="200">
            </div>

            <div class="form-group">
                <label for="tenu">Họ và tên:</label>
                <input type="text" name="tenu" required>
            </div>
            <div class="form-group">
                <label for="tendn">Tên đăng nhập:</label>
                <input type="text" name="tendn" required>
            </div>
            <div class="form-group">
                <label for="pass">Mật khẩu đăng nhập:</label>
                <input type="password" name="pass" required>
            </div>

            <div class="form-group">
                <input type="submit" value="Thêm">
            </div>
        </form>
    </div>
</body>
</html>
