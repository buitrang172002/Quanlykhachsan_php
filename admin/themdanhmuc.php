<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION["user"])) {
    header("location:index.php");
    exit(); 
}

include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $iddm = $_POST['iddm'];
    $tendm = $_POST['tendm'];
    $idncc = $_POST['idncc'];
    $idks = $_POST['idks'];

   
    $check_query = "SELECT * FROM danhmuc WHERE IDDM = '$iddm'";
    $check_result = mysqli_query($con, $check_query);

    if ($check_result === false) {
        die("Error checking if IDDM exists: " . mysqli_error($con));
    }

    if (mysqli_num_rows($check_result) > 0) {
        $error_message = "Đã có danh mục sử dụng ID đó. Hãy nhập ID khác.";
        
    } else {
        
        $insert_query = "INSERT INTO danhmuc (IDDM, LOAIDM, IDNCC, IDKS) VALUES ('$iddm', '$tendm', '$idncc', '$idks')";
        $insert_result = mysqli_query($con, $insert_query);

        if ($insert_result) {
          
            header("location: danhmuc.php");
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
        .error-message {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
    <img src="imag/nen.jpg" class="hinhnen">
        <h2>Thêm danh mục dịch vụ</h2>
        <hr>

        <?php if (!empty($error_message)) { ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php } ?>

        <form action="" method="POST">
            <div class="form-group">
               <label for="iddm">ID danh mục:</label>
                <input type="number" name="iddm" required min="1" max="200">
            </div>

            <div class="form-group">
                <label for="tenncc">Tên loại danh mục:</label>
                <input type="text" name="tendm" required>
            </div>

            <div class="form-group">
                <label for="idncc">ID nhà cung cấp:</label>
                <select name="idncc" required>
                    <?php
                        
                        $idncc_query = "SELECT IDNCC, TENNCC FROM nhacc";
                        $idncc_result = mysqli_query($con, $idncc_query);

                      
                        while ($idncc_row = mysqli_fetch_assoc($idncc_result)) {
                           
                            echo "<option value='" . $idncc_row['IDNCC'] . "'>" . $idncc_row['IDNCC'] . " - " . $idncc_row['TENNCC'] . "</option>";
                        }
                    ?>
                </select>
            </div>
            
            <div class="form-group">
                <label for="idks">ID nhà khách sạn:</label>
                <select name="idks" required>
                    <?php
                        
                        $idncc_query = "SELECT IDKS, TENKS FROM khachsan";
                        $idncc_result = mysqli_query($con, $idncc_query);

                      
                        while ($idncc_row = mysqli_fetch_assoc($idncc_result)) {
                           
                            echo "<option value='" . $idncc_row['IDKS'] . "'>" . $idncc_row['IDKS'] . " - " . $idncc_row['TENKS'] . "</option>";
                        }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <input type="submit" value="Thêm">
            </div>
        </form>
    </div>
</body>
</html>
