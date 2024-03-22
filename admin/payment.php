<?php  
session_start();  
if(!isset($_SESSION["user"]))
{
 header("location:index.php");
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
                           Thông tin thanh toán<small> </small>
                        </h1>
                    </div>
                </div> 
			<?php
                include('db.php');
            ?>	 
            <br>
				<br>
				<br>
				<br><div id="chart"></div>
        <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive table-striped-body">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
											<th>ID phòng đặt</th>
                                            <th>ID khách hang</th>
                                            <th>ID phòng</th>
											<th>Ngày đặt</th>
                                            <th>Ngày trả</th>
											<th>Số giờ thuê</th>
                                            <th>ID nhân viên</th>	
                                            <th>Thành tiền</th>																				
                                           	<th>Trạng thái thanh toán</th>	
                                            <th>Update thanh toán</th>																		
                                            <th>In HĐ</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                     <?php
                                        $sql = "select * from datphong";
                                        $re = mysqli_query($con, $sql);
                                        while ($row = mysqli_fetch_array($re)) {
                                            $id = $row['IDDP'];
                                            
                                            echo "<tr class='" . ($id % 2 == 1 ? 'gradeC' : 'gradeU') . "'>";
                                            echo "<td>" . $row['IDDP'] . "</td>";
                                            echo "<td>" . $row['IDKH'] . "</td>";
                                            echo "<td>" . $row['IDPHONG'] . "</td>";
                                            echo "<td>" . $row['NGAYDAT'] . "</td>";
                                            echo "<td>" . $row['NGAYTRA'] . "</td>";
                                            echo "<td>" . $row['TIMEO'] . "</td>";
                                            echo "<td>" . $row['IDUSER'] . "</td>";
                                            echo "<td>" . $row['THANHTOAN'] . "</td>";
                                            echo "<td>";
                                            
                                            $status = $row["TRANGTHAITT"];
                                            echo ($status == 0) ? "Chưa thanh toán" : "Đã thanh toán";
                                            
                                            echo "</td>";
                                          
                                            echo "<td>";
                                            echo " <a href='edit_print.php?id=$id'class='btn btn-primary'>Update</a>";
                                           
                                            echo "</td>";
                                            
                                            echo "<td>";
                                            echo "<a href='print.php?pid=" . $id . "' class='btn btn-primary'><i class='fa fa-print'></i> Print</a>";
                                            echo "</td>";
                                            
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