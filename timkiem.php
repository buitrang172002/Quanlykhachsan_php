<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen">
<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
<link rel="stylesheet" href="css/jquery-ui.css" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/modernizr-2.6.2.min.js"></script>
<!--fonts-->
<link href="//fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Federo" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
<!--//fonts-->
<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $searchTerm = mysqli_real_escape_string($con, $_POST['Search']);

    $query = "SELECT tenks, sdt, email, fax, diachi, HINHANH FROM khachsan WHERE tenks LIKE '%$searchTerm%'";

    $result = $con->query($query);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
?>
            <div class="col-md-3 price-grid wthree lost">
                <div class="price-block agile" class="menu__link" data-toggle="modal" data-target="#myModal">
                    <div class="price-gd-top">
                        <img src="./admin/update_img/<?php echo $row['HINHANH'] ?>" alt="" class="img-responsive">
                        <h4><?php echo $row['tenks']; ?></h4>
                    </div>
                    <div class="price-gd-bottom">
                        <p><?php echo $row['sdt']; ?></p>
                        <p><?php echo $row['email']; ?></p>
                        <p><?php echo $row['fax']; ?></p>
                        <p><?php echo $row['diachi']; ?></p>
                        <div class="price-selet">
                            <a href="./admin/index.php">Truy nhập</a>
                        </div>
                    </div>
                </div>
            </div>
<?php
        }
    } else {
        echo "Không có khách sạn nào muốn tìm!";
    }
}
?>

