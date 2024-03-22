<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("location:index.php");
    exit();
}

include('db.php');

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($con, $_GET['id']);

    $query = "SELECT * FROM datphong WHERE IDDP = $id";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
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
            </style>
        </head>
        <body>
            <div class="container">
                <h2>Thêm dịch vụ</h2>
                <form action="xuly_dichvu.php" method="POST">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['IDDP']); ?>">
                    <div class="form-group">
                        <label for="idp">ID phòng:</label>
                        <input type="text" name="idp" value="<?php echo htmlspecialchars($row['IDDP']); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="dv">Dịch vụ :</label>
                        <select name="dv" required>
                            <?php
                            $iddm_query = "SELECT TENDV, GIA FROM dichvu";
                            $iddm_result = mysqli_query($con, $iddm_query);
                           
                            while ($row_khachsan = mysqli_fetch_assoc($iddm_result)) {
                                echo "<option value='" . htmlspecialchars($row_khachsan['GIA']) . "'>" . htmlspecialchars($row_khachsan['GIA']) . "đ - " . htmlspecialchars($row_khachsan['TENDV']) . "</option>";
                                
                            }
                           
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                           
                        <input type="submit" name="save" value="Thêm">
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
