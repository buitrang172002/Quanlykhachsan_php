<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("location:index.php");
    exit();
}

include('db.php');

            
if (isset($_GET['search_idncc'])) {
    $search_idncc = $_GET['search_idncc'];
    $sql = "SELECT * FROM nhacc WHERE IDNCC LIKE '%$search_idncc%'";
} else {
    $sql = "SELECT * FROM nhacc";
}

$re = mysqli_query($con, $sql);
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
    <link href="assets/css/thongtin.css" rel="stylesheet" />
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
    <style>
       
    </style>
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
                        <li>
    <a href="#" onclick="confirmLogout();">
        <i class="fa fa-sign-out fa-fw"></i> Đăng xuất
    </a>
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
    <a href="#" onclick="confirmLogout();">
        <i class="fa fa-sign-out fa-fw"></i> Đăng xuất
    </a>
</li>

<script>
    function confirmLogout() {
        var confirmation = confirm("Kiểm tra bạn có muốn đăng xuất không?");
        if (confirmation) {
            window.location.href = "logout.php"; // Chuyển hướng đến trang logout.php nếu người dùng đồng ý
        }
    }
</script>             
					</ul>

            </div>


        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
        <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                           Chi tiết nhà cung cấp dịch vụ<small> </small>
                        </h1>
                        <form action="" method="GET" class="form-inline">
                                <div class="form-group">
                                    <label for="search_idncc">Nhập ID nhà cung cấp cần tìm:</label>
                                    <input type="text" class="form-control" id="search_idncc" name="search_idncc">
                                </div>
                                <button type="submit" class="btn btn-primary">Search</button>
                            </form>
                    </div>
                </div> 
			
            <br>
				<br>
				<br>
				<br><div id="chart"></div>
        <div class="col-md-12">
                    <!-- Anccanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive table-striped-body">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
											<th>ID nhà cung cấp</th>
                                            <th>Tên nhà cung cấp</th>
                                            <th>Số điện thoại</th>
											<th>Email</th>
                                            <th>Ngày hợp tác</th>
											<th>Quản lý</th>																					
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
									<?php
										
										while($row = mysqli_fetch_array($re)) {
                                            $id = $row['IDNCC'];
                                        
                                            echo "<tr class='" . ($id % 2 == 1 ? 'gradeC' : 'gradeU') . "'>";
                                            echo "<td>" . $row['IDNCC'] . "</td>";
                                            echo "<td>" . $row['TENNCC'] . "</td>";
                                            echo "<td>" . $row['SDT'] . "</td>";
                                            echo "<td>" . $row['EMAIL'] . "</td>";
                                            echo "<td>" . $row['NGAYTAO'] . "</td>";
                                            echo "<td>
                                                    <a href='edit_ncc.php?id=$id'class='btn btn-success'>Sửa</a> | 
                                                    <a href='javascript:void(0);' onclick='confirmDelete($id)' class='btn btn-danger'>Xóa</a>                                                  </td>";
                                            echo "</tr>";
                                        }
                                        
										
									?>
                                        
                                    </tbody>
                                </table>
                                <div class="btn-container">
                            <a href="themncc.php" class="btn btn-primary">Thêm nhà cung cấp</a>
                        </div>
                            </div>
                            
                        </div>
                    </div>
                    <script>
    function confirmDelete(id) {
        if (confirm("Bạn có muốn xóa thông tin này không?")) {
            window.location.href = 'delete_ncc.php?id=' + id;
        }
    }
</script>
                    <!--End Anccanced Tables -->
                </div>
              
            
                </div>
               
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