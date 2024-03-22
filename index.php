<?php
include('db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>SUNRISE HOTEL</title>
<!-- for-mobile-apps -->

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Resort Inn Responsive , Smartphone Compatible web template , Samsung, LG, Sony Ericsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
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
</head>
<body>


<div class="fixed-media">
        <a href="https://zalo.me/g/whylwy439"><img src="https://web.nvnstatic.net/tp/T0298/img/zalo.svg?v=3" alt=""></a>
    </div>
    <div class="fixed-media_call">
        <a href="tel:0367514481"><img src="https://web.nvnstatic.net/tp/T0298/img/hotline.svg?v=3" alt=""></a>
    </div>
    <div class="fixed-media_mess">
        <a href="https://web.facebook.com/profile.php?id=100084256479339"><img src="https://janhome.vn/images/icon/messenger.svg" alt=""></a>
    </div>

<style>
	
	.fixed-media {
  position: fixed;
  bottom: 120px;
  left: 10px;
  z-index: 9999;
}
.fixed-media img {
  width: 50px;
  height: 50px;
  display: block;
}
.fixed-media_call{
  position: fixed;
  bottom: 180px;
  left: 10px;
  z-index: 9999;
}
.fixed-media_call img{
  width: 50px;
  height: 50px;
  display: block;
}
.fixed-media_mess {
  position: fixed;
  bottom: 240px;
  left: 10px;
  z-index: 9999;
}

.fixed-media_mess img{
  width: 50px;
  height: 50px;
  display: block;
}

.banner-top,
.w3_navigation {
    position: fixed;
    width: 100%;
    
    z-index: 1000; /* Đặt z-index sao cho nó cao hơn các phần khác trên trang */
}
.banner-top{
	background-color: #fff; /* Thay đổi màu sắc nếu cần */
}
.w3_navigation {
	/* position: absolute;
		z-index: 1; */
		
    top: 48px; /* Độ cao của banner-top */
}

/* Phần hiệu ứng khi đang cuộn xuống */
.w3_navigation.fixed,
.banner-top.fixed {
    animation: fadeInDown 0.5s ease-in-out;
}

@keyframes fadeInDown {
    0% {
        transform: translateY(-100%);
        opacity: 0;
    }
    100% {
        transform: translateY(0);
        opacity: 1;
    }
}
.w3ls-banner {
    position: relative;
    top: 119px;
}
.book-form-left-w3layouts h2 {
		padding: 61px 0;
		margin-top: 119px;
		font-size: 23px;
		letter-spacing: 3.5px;
	}
	.search_form{
		/* position: absolute;
		z-index: 2; */
		margin-top: 65px;
		
	}
	
</style>
<!-- header -->
<div class="banner-top">
			<div class="social-bnr-agileits">
				<ul class="social-icons3">
								<li><a href="https://www.facebook.com/" class="fa fa-facebook icon-border facebook"> </a></li>
								<li><a href="https://twitter.com/" class="fa fa-twitter icon-border twitter"> </a></li>
								<li><a href="https://plus.google.com/u/0/" class="fa fa-google-plus icon-border googleplus"> </a></li> 
							</ul>
			</div>
			<div class="contact-bnr-w3-agile">
				<ul>
					<li><i class="fa fa-envelope" aria-hidden="true"></i><a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox">thesun@gmail.com</a></li>
					<li><i class="fa fa-phone" aria-hidden="true"></i>+84 367-514-481</li>	
					<li class="s-bar">
        <div class="search">
            <input class="search_box" type="checkbox" id="search_box">
            <label class="icon-search" for="search_box"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></label>

             <div class="search_form">
                <form action="./timkiem.php" method="post" onsubmit="return validateForm()">
                    <input type="search" id="searchInput" name="Search" placeholder=" " required=" " />
                    <input type="submit" value="Search">
               </form>
            </div>
        </div>
    </li>

				</ul>
			</div>
			
			<div class="clearfix"></div>
		</div>
	<div class="w3_navigation">
		<div class="container">
			<nav class="navbar navbar-default">
				<div class="navbar-header navbar-left">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<h1><a class="navbar-brand" href="index.php" bis_skin_checked="1" style="margin-left:-120px">SUN <span>RISE</span><p class="logo_w3l_agile_caption">KHU NGHỈ DƯỠNG TRONG MƠ CỦA BẠN</p></a></h1>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
					<nav class="menu menu--iris">
						<ul class="nav navbar-nav menu__list">
							<li class="menu__item menu__item--current"><a href="" class="menu__link">Home</a></li>
							<li class="menu__item"><a href="#about" class="menu__link scroll">About</a></li>
							<li class="menu__item"><a href="#team" class="menu__link scroll">Team</a></li>
							<li class="menu__item"><a href="#gallery" class="menu__link scroll">Gallery</a></li>
							<li class="menu__item"><a href="#rooms" class="menu__link scroll">Rooms</a></li>
							<li class="menu__item"><a href="#contact" class="menu__link scroll">Contact Us</a></li>
							<li class="menu__item"><a href="./admin/index.php" class="menu__link scroll1">Đăng nhập</a></li>
						</ul>
					</nav>
				</div>
			</nav>

		</div>
	</div>
<!-- //header -->
		<!-- banner -->
	<div id="home" class="w3ls-banner">
		<!-- banner-text -->
		<div class="slider">
			<div class="callbacks_container">
				<ul class="rslides callbacks callbacks1" id="slider4">
					<li>
						<div class="w3layouts-banner-top">

							<div class="container">
								<div class="agileits-banner-info">
								<h4>SUN RISE</h4>
									<h3>Chúng tôi biết những gì bạn yêu thích</h3>
										<p>Chào mừng đến với khách sạn của chúng tôi</p>
									<div class="agileits_w3layouts_more menu__item">
				<a href="#" class="menu__link" data-toggle="modal" data-target="#myModal">Tìm hiểu thêm</a>
			</div>
								</div>	
							</div>
						</div>
					</li>
					<li>
						<div class="w3layouts-banner-top w3layouts-banner-top1">
							<div class="container">
								<div class="agileits-banner-info">
								<h4>SUN RISE</h4>
									<h3>Ở với bạn bè và gia đình</h3>
										<p>Hãy đến và tận hưởng khoảnh khắc quý giá với chúng tôi</p>
									<div class="agileits_w3layouts_more menu__item">
				<a href="#" class="menu__link" data-toggle="modal" data-target="#myModal">Tìm hiểu thêm</a>
			</div>
								</div>	
							</div>
						</div>
					</li>
					<li>
						<div class="w3layouts-banner-top w3layouts-banner-top2">
							<div class="container">
								<div class="agileits-banner-info">
								<h4>SUN RISE</h4>
								<h3>Muốn kỳ nghỉ sang trọng?</h3>
										<p>Nhận phòng trọ ngay hôm nay</p>
									<div class="agileits_w3layouts_more menu__item">
											<a href="#" class="menu__link" data-toggle="modal" data-target="#myModal">Tìm hiển thêm</a>
										</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
			<div class="clearfix"> </div>
			<!--banner Slider starts Here-->
		</div>
		    <div class="thim-click-to-bottom">
				<a href="#about" class="scroll">
					<i class="fa fa-long-arrow-down" aria-hidden="true"></i>
				</a>
			</div>
	</div>	
	<!-- //banner --> 
<!--//Header-->
<!-- //Modal1 -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
						<!-- Modal1 -->
							<div class="modal-dialog">
							<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4>SUN  <span>RISE</span></h4>
										<img src="images/1.jpg" alt=" " class="img-responsive">
										
										<h5>Chúng tôi biết những gì bạn yêu thích</h5>
										<p>Mang đến cho du khách tầm nhìn độc đáo và mê hoặc từ phòng nghỉ cùng những tiện nghi đặc biệt, Star Hotel trở thành một trong những khách sạn tốt nhất thuộc loại hình này. Hãy thử thực đơn đồ ăn, dịch vụ tuyệt vời và đội ngũ nhân viên thân thiện của chúng tôi khi bạn ở đây.</p>
									</div>
								</div>
							</div>
						</div>
<!-- //Modal1 -->
<div id="availability-agileits">
<div class="col-md-12 book-form-left-w3layouts">
	<a href="#"><h2>ĐẶT PHÒNG</h2></a>
</div>

			<div class="clearfix"> </div>
</div>
<!-- banner-bottom -->
	<div class="banner-bottom">
		<div class="container">	
			<div class="agileits_banner_bottom">
				<h3><span>Trải nghiệm kỳ nghỉ tốt, tận hưởng ưu đãi tuyệt vời</span> Tìm lễ tân chào đón thân thiện của chúng tôi</h3>
			</div>
			<div class="w3ls_banner_bottom_grids">
				<ul class="cbp-ig-grid">
					<li>
						<div class="w3_grid_effect">
							<span class="cbp-ig-icon w3_road"></span>
							<h4 class="cbp-ig-title">PHÒNG NGỦ CHÍNH</h4>
							<span class="cbp-ig-category">SUN RISE</span>
						</div>
					</li>
					<li>
						<div class="w3_grid_effect">
							<span class="cbp-ig-icon w3_cube"></span>
							<h4 class="cbp-ig-title">BAN CÔNG VIEW BIỂN</h4>
							<span class="cbp-ig-category">SUN RISE</span>
						</div>
					</li>
					<li>
						<div class="w3_grid_effect">
							<span class="cbp-ig-icon w3_users"></span>
							<h4 class="cbp-ig-title">QUÁN CAFE LỚN</h4>
							<span class="cbp-ig-category">SUN RISE</span>
						</div>
					</li>
					<li>
						<div class="w3_grid_effect">
							<span class="cbp-ig-icon w3_ticket"></span>
							<h4 class="cbp-ig-title">PHỦ WIFI</h4>
							<span class="cbp-ig-category">SUN RISE</span>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
<!-- //banner-bottom -->
<!-- /about -->
 	<div class="about-wthree" id="about">
		  <div class="container">
				   <div class="ab-w3l-spa">
                            <h3 class="title-w3-agileits title-black-wthree">Giới thiệu SUN RISE</h3> 
						   <p class="about-para-w3ls"><b>SUN RISE</b> nằm ngay trung tâm thành phố Hà Nội.Hệ thống trang thiết bị hiện đại, điều hòa, tivi màn hình led, sofa sang trọng, wifi tiện ích .Được thiết kế và trang trí theo kiến trúc Pháp sang trọng và ấm cúng luôn mang lại sự hài lòng và thoải mái cho khách hàng trong suốt thời gian lưu trú tại <b>SUN RISE</b>.Đến với <b>SUN RISE</b> phong cách thiết kế thì cách bố cục, phân chia không gian sao cho khoa học, đảm bảo sự thuận lợi trong việc di chuyển, sinh hoạt của khách hàng cũng là một điểm cộng giúp nâng cao trải nghiệm và ghi điểm ấn tượng với khách hàng.Ngoài ra, ánh sáng tự nhiên từ cửa sổ cũng rất quan trọng để thăng hạng vẻ đẹp căn phòng và giúp khách hàng lấy lại năng lượng, cân bằng cảm xúc tinh thần.</p>
						   <img src="images/about.jpg" class="img-responsive" alt="Hair Salon">
										<div class="w3l-slider-img">
											<img src="images/a1.jpg" class="img-responsive" alt="Hair Salon">
										</div>
                                       <div class="w3ls-info-about">
										    <h4>Bạn sẽ thích tất cả các tiện nghi chúng tôi cung cấp!</h4>
											<p>Còn chần chừ gì nữa hãy đến ngay với SUN RISE để trải nghiệm kỳ nghỉ và đẹp cổ kính ngay hôm nay nhé !!! </p>
										</div>
		          </div>
		   	<div class="clearfix"> </div>
		   	
    </div>
</div>
 	<!-- //about -->
<!--sevices-->
<div class="advantages">
	<div class="container">
		<div class="advantages-main">
				<h3 class="title-w3-agileits">Dịch vụ của chúng tôi</h3>
		   <div class="advantage-bottom">
			 <div class="col-md-6 advantage-grid left-w3ls wow bounceInLeft" data-wow-delay="0.3s">
			 	<div class="advantage-block ">
					<i class="fa fa-credit-card" aria-hidden="true"></i>
			 		<h4>Ở trước, Trả tiền sau! </h4>
			 		<p>Nghỉ ngơi sau một chuyến đi xa tại phòng nghỉ Khách sạn,quý khách có thể lựa chọn cho mình nhiều phong cách mẫu phòng khác nhau.</p>
					<p><i class="fa fa-check" aria-hidden="true"></i>Phòng trang trí, máy lạnh thích hợp</p>
					<p><i class="fa fa-check" aria-hidden="true"></i>Ban công riêng</p>
			 		
			 	</div>
			 </div>
			 <div class="col-md-6 advantage-grid right-w3ls wow zoomIn" data-wow-delay="0.3s">
			 	<div class="advantage-block">
					<i class="fa fa-clock-o" aria-hidden="true"></i>
			 		<h4>Nhà Hàng 24h</h4>
			 		<p>Nhu cầu nghỉ ngơi của du khách cũng cần thêm nhiều dịch vụ và các tiện ích khác nhằm đáp ứng các nhu cầu khác nhau của khách hàng. </p>
					<p><i class="fa fa-check" aria-hidden="true"></i>Dịch vụ phòng 24 giờ</p>
					<p><i class="fa fa-check" aria-hidden="true"></i>Dịch vụ thư giãn 24 giờ</p>
			 	</div>
			 </div>
			<div class="clearfix"> </div>
			</div>
		</div>
	</div>
</div>
<!--//sevices-->
<!-- team -->



<!-- //team -->
<!-- Gallery -->
<section class="portfolio-w3ls" id="gallery">
		 <h3 class="title-w3-agileits title-black-wthree">Phòng trưng bày </h3>
				<div class="col-md-3 gallery-grid gallery1">
					<a href="images/g1.jpg" class="swipebox"><img src="images/g1.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>SUN RISE</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>
				</div>
				<div class="col-md-3 gallery-grid gallery1">
					<a href="" class="swipebox"><img src="images/g2.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>SUN RISE</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>
				</div>
				<div class="col-md-3 gallery-grid gallery1">
					<a href="" class="swipebox"><img src="images/g3.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>SUN RISE</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>
				</div>
				<div class="col-md-3 gallery-grid gallery1">
					<a href="images/g4.jpg" class="swipebox"><img src="images/g4.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>SUN RISE</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>
				</div>
				<div class="col-md-3 gallery-grid gallery1">
					<a href="" class="swipebox"><img src="images/g5.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>SUN RISE</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
					</a>
				</div>
				<div class="col-md-3 gallery-grid gallery1">
					<a href="" class="swipebox"><img src="images/g6.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>SUN RISE</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
					   </div>
				   </a>
				</div>
				<div class="col-md-3 gallery-grid gallery1">
					<a href="images/g6.jpg" class="swipebox"><img src="images/g7.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>SUN RISE</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
					   </div>
				   </a>
				</div>
				<div class="col-md-3 gallery-grid gallery1">
					<a href="" class="swipebox"><img src="images/g8.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>SUN RISE</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
					   </div>
				   </a>
				</div>
					<div class="col-md-3 gallery-grid gallery1">
					<a href="images/g9.jpg" class="swipebox"><img src="images/g9.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>SUN RISE</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>
				</div>
				<div class="col-md-3 gallery-grid gallery1">
					<a href="" class="swipebox"><img src="images/g10.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>SUN RISE</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>
				</div>
				<div class="col-md-3 gallery-grid gallery1">
					<a href="" class="swipebox"><img src="images/g4.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>SUN RISE</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>
				</div>
				<div class="col-md-3 gallery-grid gallery1">
					<a href="" class="swipebox"><img src="images/g2.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>SUN RISE</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>
				</div>
				<div class="clearfix"> </div>
</section>
<!-- //gallery -->
	 <!-- rooms & rates -->
	 <style>
    .plans-section {
        padding: 20px; 
        text-align: center;
    }

    .priceing-table-main {
        text-align: center; /* Căn giữa nội dung trong priceing-table-main */
    }

    .price-grid {
        display: inline-block;
        width: 23%; 
        margin: 0 10px; 
        vertical-align: top;
        position: relative; /* Để giữ phần tử chứa liên kết tuyệt đối */
    }

    .price-block {
        border: 1px solid #ccc; 
        text-align: center; 
        padding: 10px; 
        margin-bottom: 20px;
        position: relative; /* Để giữ phần tử chứa liên kết tuyệt đối */
    }

    .price-gd-top {
        position: relative; /* Để phần tử con có thể định vị tuyệt đối */
    }

    .price-gd-top h4 {
        margin-top: -20px; /* Giảm khoảng cách trên h4 */
        font-size: 0.9em; /* Điều chỉnh kích thước của h4 */
        color: #fff;
        padding: 0.4em 1em;
        background: #0f2453;
        font-weight: 300;
        position: absolute;
        top: 100%; /* Đặt ở dưới hình ảnh */
        left: 0;
        width: 100%; /* Chiều rộng 100% để nằm ngang */
    }

    .price-gd-top img {
        max-width: 100%;
        height: auto;
    }

    .price-gd-bottom p {
        margin: 5px 0;
    }

    .price-selet {
        margin-top: 10px;
    }
</style>

    <title>Chuyển ngang nằm dọc</title>
</head>
<body>
    <div class="plans-section" id="rooms">
        <div class="container">
            <h3 class="title-w3-agileits title-black-wthree">Quản lý khách sạn</h3>
            <div class="priceing-table-main">
				<?php
				include('db.php');
				$query = "SELECT tenks, sdt, email, fax, diachi, HINHANH FROM khachsan";
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
					echo "No data found";
				}
				?>
			</div>

        </div>
    </div>
	
	 <!--// rooms & rates -->
  <!-- visitors -->
	<div class="w3l-visitors-agile" >
		<div class="container">
                 <h3 class="title-w3-agileits title-black-wthree">Những gì du khách khác trải nghiệm</h3> 
		</div>
		<div class="w3layouts_work_grids">
			<section class="slider">
				<div class="flexslider">
					<ul class="slides">
						<li>
							<div class="w3layouts_work_grid_left">
								<img style="height: 500px;width: 750px;" src="images/hai.jpg" alt=" " class="img-responsive" />
								<div class="w3layouts_work_grid_left_pos">
								
								</div>
							</div>
							<div class="w3layouts_work_grid_right">
								<h4>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								Đáng để trở lại
								</h4>
								<p>Khách sạn với không gian lịch sự, trang trọng, dịch vụ chu đáo tận tình.
								 Sự chăm sóc khách hàng của nhân viên, đặc biệt sự giới thiệu, hướng dẫn của nữa nv clara, nv lễ tân rất gần gũi và thân thiện, mang đến một trải nghiệm tuyệt vời . </p>
								<h5>Hải Hải</h5>
								<p>Quê quán : Ninh Bình</p>
							</div>
							<div class="clearfix"> </div>
						</li>
						<li>
							<div class="w3layouts_work_grid_left">
								<img src="images/hai.jpg" alt=" " class="img-responsive" />
								<div class="w3layouts_work_grid_left_pos">
									
								</div>
							</div>
							<div class="w3layouts_work_grid_right">
								<h4>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-starWorth to come a" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
								Đáng để trở lại

								</h4>
								<p>Tôi cùng bạn bè trải nghiệm chuyến đi thật đáng nhớ , khách sạn là điểm dừng chân ưng ý nhất , sạch tiện nghi cách phục vụ thật chu đáo. </p>
								<h5>Tiến tiến</h5>
								<p>Quê quán:Ninh Bình</p>
							</div>
							<div class="clearfix"> </div>
						</li>
						<li>
							<div class="w3layouts_work_grid_left">
								<img src="images/hai.jpg" alt=" " class="img-responsive" />
								<div class="w3layouts_work_grid_left_pos">
									
								</div>
							</div>
							<div class="w3layouts_work_grid_right">
								<h4>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
								Đáng để trở lại
								</h4>
								<p>Khách sạn theo phong cách hoàng gia nên có nhiều góc sống ảo "soang choảnh".Ngồi chờ xe ở sảnh 1 chút là các bạn nhân viên lấy nước chanh cho khách uống liền❤️. Riêng có toilet trong phòng nước hơi nhẹ, mỗi lần xả yếu quá không sạch được khi dùng 2 lần liên tục, có máy pha cà phê nữa mà máy phòng mình bị rỉ nước phần bình chứa nên chảy hết ra sàn, các bạn nhân viên có đề nghị thay mới , đáp ứng đầy đủ kịp thời mọi nhu cầu của khách. Hồ bơi cũng siêu đẹp. Nội thất phòng hiện đại, siêu xịn xò và thêm view biển chill chill 😆😆😆 </p>
								<h5> Phương</h5>
								<p>Quê quán :Hà Nội</p>
							</div>
							<div class="clearfix"> </div>
						</li>
						<li>
							<div class="w3layouts_work_grid_left">
								<img src="images/hai.jpg" alt=" " class="img-responsive" />
								<div class="w3layouts_work_grid_left_pos">
									
								</div>
							</div>
							<div class="w3layouts_work_grid_right">
								<h4>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
								Đáng để trở lại
								</h4>
								<p>Hồ bơi trên tầng mái khá đẹp nhưng rất nhỏ. Nhân viên rất thân thiện và sẵn lòng giúp đỡ.  </p>
								<h5>Tài Ba</h5>
								<p>Quê quán:Nam Định</p>
							</div>
							<div class="clearfix"> </div>
						</li>
					</ul>
				</div>
			</section>
		</div>	
	</div>
  <!-- visitors -->
<!-- contact -->
<section class="contact-w3ls" id="contact">
	<div class="container">
		<div class="col-lg-6 col-md-6 col-sm-6 contact-w3-agile2" data-aos="flip-left">
			<div class="contact-agileits">
				<h4>Liên hệ chúng tôi</h4>
				<p class="contact-agile2">Đăng ký để được nhận tin tức từ chúng tôi</p>
				<form  method="post" name="sentMessage" id="contactForm" >
					<div class="control-group form-group">
                        
                            <label class="contact-p1">Họ và tên:</label>
                            <input type="text" class="form-control" name="name" id="name" required >
                            <p class="help-block"></p>
                       
                    </div>	
                    <div class="control-group form-group">
                        
                            <label class="contact-p1">Số điện thoại:</label>
                            <input type="tel" class="form-control" name="phone" id="phone" required >
							<p class="help-block"></p>
						
                    </div>
                    <div class="control-group form-group">
                        
                            <label class="contact-p1">Địa chỉ mail:</label>
                            <input type="email" class="form-control" name="email" id="email" required >
							<p class="help-block"></p>
						
                    </div>
                    
                    
                    <input type="submit" name="sub" value="Send Now" class="btn btn-primary">	
				</form>
				<?php
				if(isset($_POST['sub']))
				{
					$name =$_POST['name'];
					$phone = $_POST['phone'];
					$email = $_POST['email'];
					$approval = "Not Allowed";
					$sql = "INSERT INTO `contact`(`fullname`, `phoneno`, `email`,`cdate`,`approval`) VALUES ('$name','$phone','$email',now(),'$approval')" ;
					
					
					if(mysqli_query($con,$sql))
					echo"OK";
					
				}
				?>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 contact-w3-agile1" data-aos="flip-right">
			<h4>Liên hệ với chúng tôi</h4>
			<p class="contact-agile1"><strong>Phone :</strong>+84 353-498-956</p>
			<p class="contact-agile1"><strong>Email :</strong> <a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox">INFO@SUNRISE.COM</a></p>
			<p class="contact-agile1"><strong>Address :</strong> Số 3,Lương Yên ,Hai Bà Trưng , Hà Nội</p>
																
			<div class="social-bnr-agileits footer-icons-agileinfo">
				<ul class="social-icons3">
								<li><a href="#" class="fa fa-facebook icon-border facebook"> </a></li>
								<li><a href="#" class="fa fa-twitter icon-border twitter"> </a></li>
								<li><a href="#" class="fa fa-google-plus icon-border googleplus"> </a></li> 
							</ul>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</section>
<!-- /contact -->
			<div class="copy">
		        <p>© 2024 SUNRISE . Thiết kế bởi <a href="index.php">PHẠM NGỌC HẢI</a> </p>
		    </div>
<!--/footer -->
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- contact form -->
<script src="js/jqBootstrapValidation.js"></script>

<!-- /contact form -->	
<!-- Calendar -->
		<script src="js/jquery-ui.js"></script>
		<script>
				$(function() {
				$( "#datepicker,#datepicker1,#datepicker2,#datepicker3" ).datepicker();
				});
		</script>
<!-- //Calendar -->
<!-- gallery popup -->
<link rel="stylesheet" href="css/swipebox.css">
				<script src="js/jquery.swipebox.min.js"></script> 
					<script type="text/javascript">
						jQuery(function($) {
							$(".swipebox").swipebox();
						});
					</script>
<!-- //gallery popup -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<!-- flexSlider -->
				<script defer src="js/jquery.flexslider.js"></script>
				<script type="text/javascript">
				$(window).load(function(){
				  $('.flexslider').flexslider({
					animation: "slide",
					start: function(slider){
					  $('body').removeClass('loading');
					}
				  });
				});
			  </script>
			<!-- //flexSlider -->
<script src="js/responsiveslides.min.js"></script>
			<script>
						// You can also use "$(window).load(function() {"
						$(function () {
						  // Slideshow 4
						  $("#slider4").responsiveSlides({
							auto: true,
							pager:true,
							nav:false,
							speed: 500,
							namespace: "callbacks",
							before: function () {
							  $('.events').append("<li>before event fired.</li>");
							},
							after: function () {
							  $('.events').append("<li>after event fired.</li>");
							}
						  });
					
						});
			</script>
		<!--search-bar-->
		<script src="js/main.js"></script>	
<!--//search-bar-->
<!--tabs-->
<script src="js/easy-responsive-tabs.js"></script>
<script>
$(document).ready(function () {
$('#horizontalTab').easyResponsiveTabs({
type: 'default', //Types: default, vertical, accordion           
width: 'auto', //auto or any width like 600px
fit: true,   // 100% fit in a container
closed: 'accordion', // Start closed if in accordion view
activate: function(event) { // Callback function if tab is switched
var $tab = $(this);
var $info = $('#tabInfo');
var $name = $('span', $info);
$name.text($tab.text());
$info.show();
}
});
$('#verticalTab').easyResponsiveTabs({
type: 'vertical',
width: 'auto',
fit: true
});
});
</script>
<!--//tabs-->
<!-- smooth scrolling -->
	<script type="text/javascript">
		$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
		*/								
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	
	<div class="arr-w3ls">
	<a href="#home" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	</div>
<!-- //smooth scrolling -->
<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>

</body>
</html>


