<?php  
include('db.php');
session_start();  

if(!isset($_SESSION["user"])) {
    header("location:index.php");
    exit();
}

?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SUNRISE HOTEL</title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    
	<link rel="stylesheet" href="assets/css/morris.css">
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js//raphael-min.js"></script>
	<script src="assets/js/morris.min.js"></script>

   
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
    <div id="wrapper">
        
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php"><?php echo $_SESSION["user"]; ?> </a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="usersetting.php"><i class="fa fa-user fa-fw"></i>Thông tin người dùng</a>
                        </li>
                        
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a class="active-menu" href="home.php"><i class="fa fa-dashboard"></i> Trạng thái</a>
                    </li>
                  
                    <li>
                        <a  href="khachsan.php"><i class="fa fa-qrcode"></i> Quản lý khách sạn</a>
                    </li>
                    <li>
                        <a href="danhmuc.php"><i class="fa fa-qrcode"></i> Quản lý danh mục dịch vụ</a>
                    </li>
                    <li>
                        <a  href="dichvu.php"><i class="fa fa-qrcode"></i> Quản lý dịch vụ</a>
                    </li>
                    <li>
                        <a href="loaiphong.php"><i class="fa fa-qrcode"></i> Quản lý loại phòng</a>
                    </li>
                    <li>
                        <a  href="phong.php"><i class="fa fa-qrcode"></i> Quản lý phòng</a>
                    </li>
                    <li>
                        <a href="nhacungcap.php"><i class="fa fa-qrcode"></i> Quản lý nhà cung cấp</a>
                    </li>
                    <li>
                        <a  href="khachhang.php"><i class="fa fa-qrcode"></i> Quản lý khách hàng</a>
                    </li>
                    <li>
                        <a href="datphong.php"><i class="fa fa-bar-chart-o"></i> Đặt phòng</a>
                    </li>
                    <li>
                        <a href="payment.php"><i class="fa fa-qrcode"></i> Thanh toán</a>
                    </li>
                    <li>
                        <a  href="profit.php"><i class="fa fa-qrcode"></i> Lợi nhuận</a>
                    </li>
                    <li>
                        <a href="quanlythongke.php"><i class="fa fa-qrcode"></i> Báo cáo, thống kê</a>
                    </li>
                    <li>
                        <a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Đăng suất</a>
                    </li>                 
					</ul>

            </div>


        </nav>
        <!-- /. NAV SIDE  -->
        <style>
    #page-wrapper {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        padding: 20px;
    }

    .col-md-3 {
        width: 23%;
        margin: 10px;
        box-sizing: border-box;
    }

    .price-block {
        border: 1px solid #ddd;
        padding: 15px;
        text-align: center;
        height: 100%;
        display: flex;
        flex-direction: column; /* Ensure proper stacking of elements */
    }

    .price-gd-top {
        flex-grow: 1; /* Allow this div to take up remaining space */
        overflow: hidden; /* Hide overflowing content */
    }

    .price-gd-top img {
        border: 2px solid #e0ddd3;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .price-gd-bottom {
        border: 2px solid #e0ddd3;
        margin-top: 15px;
    }

    .price-list h3 {
        margin: 10px 0;
        overflow: hidden; /* Hide overflowing content */
        white-space: nowrap; /* Prevent wrapping of text */
        text-overflow: ellipsis; /* Add ellipsis (...) for long text */
    }

    .price-selet {
        margin-top: 15px;
    }

    .price-selet a {
        display: inline-block;
        background-color: #ffce14;
        color: black;
        text-decoration: none;
        padding: 10px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .price-selet a:hover {
        background-color: #ffa500;
    }
</style>


    
        <div id="page-wrapper">
        <div class="col-md-12">
        <a href="baocaongay.php" class="btn btn-primary">Thống kê dữ liệu trong ngày</a>
        <a href="baocaotuan.php" class="btn btn-primary">Thống kê dữ liệu theo tuần</a>
        <a href="baocaothang.php" class="btn btn-primary">Thống kê dữ liệu theo tháng</a>
                    <div class="col-md-12">
                        <h1 class="page-header">
                           Danh sách thống kê trong tháng<small> </small>
                        </h1>
                    </div>
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Tổng số khách hàng đặt phòng</th>
                                        <th>Tổng số khách hàng trả phòng</th>
                                        <th>Tổng số dịch vụ trong tháng</th>
                                        <th>Tổng doanh thu trong tháng</th>                                            
                                    </tr>
                                </thead>
                                <tbody>
                                
                                        <?php
                                        $sql_kh_datphong = "SELECT * FROM datphong";
                                        $res = mysqli_query($con, $sql_kh_datphong);
                                        $dem = 0;
                                        $demkhtra = 0;
                                        $dvsd = 0;
                                        $tongdoanhthu = 0.0;
                                        $currentDate = date('Y-m-d');

                                        // Calculate the start and end dates for the previous month
                                        $startOfLastMonth = date('Y-m-d', strtotime('first day of last month', strtotime($currentDate)));
                                        $endOfLastMonth = date('Y-m-d', strtotime('last day of last month', strtotime($currentDate)));

                                        // Initialize variables to track the month change
                                        $previousMonth = date('m', strtotime($currentDate));
                                        $monthChanged = false;

                                        while ($row = mysqli_fetch_array($res)) {
                                            $ngayDat = date('Y-m-d', strtotime($row['NGAYDAT']));

                                            // Check if the booking date is within the previous month
                                            if ($ngayDat >= $startOfLastMonth && $ngayDat <= $endOfLastMonth) {
                                                // Check if the month has changed
                                                $currentMonth = date('m', strtotime($ngayDat));
                                                if ($currentMonth != $previousMonth) {
                                                    // Month has changed, reset counts
                                                    $dem = 0;
                                                    $demkhtra = 0;
                                                    $dvsd = 0;
                                                    $tongdoanhthu = 0.0;
                                                    $monthChanged = true;
                                                }

                                                // Update counts for the current row
                                                $dem = $dem + 1;
                                                $dvsd = $dvsd + $row['sodvsd'];
                                                $tongdoanhthu = $tongdoanhthu + $row['THANHTOAN'];

                                                if ($row['TRANGTHAITT'] == 1) {
                                                    $demkhtra++;
                                                }

                                                // Update the previous month
                                                $previousMonth = $currentMonth;
                                            }
                                        }

                                        // Display the counts if the month has changed
                                        if ($monthChanged) {
                                            echo "<tr>";
                                            echo "<td>" . $dem . "</td>";
                                            echo "<td>" . $demkhtra . "</td>";  
                                            echo "<td>" . $dvsd . "</td>"; 
                                            echo "<td>" . $tongdoanhthu . "</td>"; 
                                            echo "</tr>";
                                        }
                                        ?>

                                        
                                    </tbody>
                                </table>
                                
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>

    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   
</body>
</html>
<script>
Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'date',
 ykeys:['profit'],
 labels:['Profit'],
 hideHover:'auto',
 stacked:true
});
</script>