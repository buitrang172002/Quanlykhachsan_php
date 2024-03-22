<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("location:index.php");
    exit();
}

include('db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

   
    $query = "SELECT * FROM phong WHERE IDPHONG = $id";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

       
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Chỉnh sửa thông tin phòng</title>
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
                <h2>Chỉnh sửa thông tin phòng khách sạn</h2>
                <hr>
                <form action="update_phong.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $row['IDPHONG']; ?>">
                    
                    <div class="form-group">
                        <label for="tenp">Tên phòng:</label>
                        <input type="text" name="tenp" value="<?php echo $row['TENPHONG']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="tt">Trạng thái phòng:</label>
                        <select name="tt">
                            <option value="0" <?php echo ($row['TRANGTHAI'] == '') ? 'selected' : ''; ?>>Chưa đặt phòng</option>
                            <option value="1" <?php echo ($row['TRANGTHAI'] == '1') ? 'selected' : ''; ?>>Đã đặt phòng</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="idlp">ID Loại phòng:</label>
                        <input type="text" name="idlp" value="<?php echo $row['IDLOAIPHONG']; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="idks">ID khách sạn:</label>
                        <input type="text" name="idks" value="<?php echo $row['IDKS']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="anh">Hình ảnh phòng:</label>
                        <input type="file" name="anh" value="<?php echo $row['ANHPHONG']; ?>">
                    </div>
                    <!-- Add other fields as needed -->

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
