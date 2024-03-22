<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("location:index.php");
    exit(); 
}

include('db.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $id = $_POST['id'];
    $tendv = $_POST['tendv'];
    $thue = $_POST['thue'];
    $gia = $_POST['gia'];
    $iddm = $_POST['iddm'];

   
    $check_query = "SELECT * FROM dichvu WHERE IDDV = '$id'";
    $check_result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        $error_message = "Đã có dịch vụ sử dụng ID đó. Hãy nhập ID khác.";
    } else {
        
        $insert_query = "INSERT INTO dichvu (IDDV, TENDV, THUE, GIA, IDDM) VALUES ('$id', '$tendv', '$thue', '$gia', '$iddm')";
        $insert_result = mysqli_query($con, $insert_query);

        if ($insert_result) {
          
            header("location: dichvu.php");
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
        <h2>Thêm dịch vụ cung cấp</h2>
        <hr>
        <?php if (!empty($error_message)) { ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php } ?>
        <form action="" method="POST">
            <div class="form-group">
               <label for="id">ID dịch vụ:</label>
                <input type="number" name="id" required min="1" max="200">
            </div>

            <div class="form-group">
                <label for="tendv">Tên dịch vụ:</label>
                <input type="text" name="tendv" required>
            </div>

            <div class="form-group">
                <label for="thue">Thuế:</label>
                <input type="text" name="thue" required>
            </div>

            <div class="form-group">
                <label for="gia">Đơn giá:</label>
                <input type="text" name="gia" required>
            </div>
            <div class="form-group">
                <label for="iddm">ID danh mục dịch vụ:</label>
                <select name="iddm" required>
                    <?php
                        
                        $iddm_query = "SELECT IDDM, LOAIDM FROM danhmuc";
                        $iddm_result = mysqli_query($con, $iddm_query);

                      
                        while ($iddm_row = mysqli_fetch_assoc($iddm_result)) {
                          
                            echo "<option value='" . $iddm_row['IDDM'] . "'>" . $iddm_row['IDDM'] . " - " . $iddm_row['LOAIDM'] . "</option>";
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
