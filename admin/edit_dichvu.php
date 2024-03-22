<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("location:index.php");
    exit(); 
}

include('db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

   
    $query = "SELECT * FROM dichvu WHERE IDDV = $id";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Chỉnh sửa thông tin dịch vụ Cung Cấp</title>
            <link rel="stylesheet" href="style.css">
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
            </style>
        </head>
        <body>
            <div class="container">
            <img src="imag/nen.jpg" class="hinhnen">
                <h2>Chỉnh sửa thông tin dịch vụ cung cấp</h2>
                <hr>
                <form action="update_dichvu.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $row['IDDV']; ?>">
                    
                    <div class="form-group">
                        <label for="tendv">Tên dịch vụ:</label>
                        <input type="text" name="tendv" value="<?php echo $row['TENDV']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="thue">Thuế:</label>
                        <input type="text" name="thue" value="<?php echo $row['THUE']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="gia">Đơn giá:</label>
                        <input type="text" name="gia" value="<?php echo $row['GIA']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="iddm">ID danh mục:</label>
                        <input type="text" name="iddm" value="<?php echo $row['IDDM']; ?>">
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Lưu" name="save">
                    </div>
                </form>
            </div>
        </body>
        </html>
        <?php
    } else {
        echo "Record not found.";
    }
} else {
    echo "Invalid request.";
}
?>
