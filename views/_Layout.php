<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EcommerceStore</title>
    <meta name="description" content="Trang bán máy tính / laptop / điện thoại">
    <meta name="og:title" property="og:title" content="Ecommerce Store">
    <meta name="og:description" property="og:description" content="Trang bán máy tính / laptop / điện thoại">
    <meta name="og:image" property="og:image" content="https://laptophainam.com/wp-content/uploads/2021/12/laptop-gaming-cu-acer-nitro-5-ryzen-3.jpg">	
	
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="/assets/css/slick.css" />
    <link type="text/css" rel="stylesheet" href="/assets/css/slick-theme.css"/>
    <link type="text/css" rel="stylesheet" href="/assets/css/nouislider.min.css"/>
    <link type="text/css" rel="stylesheet" href="/assets/css/site.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .currSign:after {
            color: black;
            content: ' VND';
        }
    </style>
</head>
<body>
    <header>
        <div id="top-header">
            <div class="container">
                <ul class="header-links pull-left">
                    <li><a href="#"><i class="fa fa-phone"></i>0394003431</a></li>
                    <li><a href="#"><i class="far fa-envelope"></i>techshop@hcmut.edu.vn</a></li>
                    <li><a href="#"><i class="fa fa-map-marker"></i>Ho Chi Minh</a></li>
                    <li><a href="/Home/Introduce"><i class="fa fa-users"></i>Giới thiệu</a></li>
                    <li><a href="/Home/Contact"><i class="fa fa-fax"></i>Liên hệ</a></li>
                </ul>
                <ul class="header-links pull-right">
                    <?php  
                        if(!$this->isLoggedIn()){
                            echo '<li><a href="/Home/Login"><i class="fa fa-user"></i>Đăng nhập</a></li>';
                        }else{
                            $User = $_SESSION["account"];
                            $obj = json_decode($User,true);
                            if($obj["Admin"] == 1){
                                echo '<li><a href="/Admin/Revenue">Quản lí</a></li>
                                <li style="color:white;">Xin Chào <b>' .$obj["FullName"] .' </b></li>
                                <li><a href="/Home/Logout"><i class="fas fa-sign-out-alt"></i>Đăng xuất</a></li>
                                ';
                            }
                            else {
                                echo '<li style="color:white;">Xin Chào <b>'.$obj["FullName"] .' </b></li>
                                <li><a href="/Home/Logout"><i class="fas fa-sign-out-alt"></i>Đăng xuất</a></li>';
                            }
                        }
                    ?>
                </ul>
            </div>
        </div>
        <!-- /TOP HEADER -->
        <!-- MAIN HEADER -->
        <div id="header">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-3">
                        <div class="header-logo">
                            <a href="#" class="logo">
                                <img src="#" alt="">
                            </a>
                        </div>
                    </div>
                    <!-- /LOGO -->
                    <!-- SEARCH BAR -->
                    <div class="col-md-6">
                        <div class="header-search">
                            <form>
                                <input class="input-select" placeholder="Tìm kiếm tại đây">
                                <button class="search-btn">Tìm kiếm</button>
                            </form>
                        </div>
                    </div>
                    <!-- /SEARCH BAR -->
                   <!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Cart -->
								<div class="dropdown">
									<a href="/Payment/Payment">
										<i class="fas fa-shopping-cart" style="font-size:20px;"></i>
										<span  style="font-size:16px;">Giỏ hàng</span>
									</a>
								</div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars" style="font-size:20px;"></i>
										<span style="font-size:16px;">Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- /MAIN HEADER -->
        <!-- NAVIGATION -->
        <nav id="navigation">
            <!-- container -->
            <div class="container">
                <!-- responsive-nav -->
                <div id="responsive-nav">
                    <!-- NAV -->
                    <ul class="main-nav nav navbar-nav">
                        <li><a href="/Home/Index">Trang chủ</a></li>
                        <li><a href="/Product/Laptop">Laptop</a></li>
                        <li><a href="/Product/Smart">Di động</a></li>
                        <li><a href="/Product/Accessory">Phụ kiện</a></li>
                        <li><a href="/Payment/PaymentHistory">Lịch sử thanh toán</a></li>
                    </ul>
                    <!-- /NAV -->
                </div>
                <!-- /responsive-nav -->
            </div>
            <!-- /container -->
        </nav>
        <!-- /NAVIGATION -->
    </header>
    <div class="container">
        <main role="main" class="pb-3">
            <?php require_once "./views/".$data["Page"].".php" ?>
        </main>
    </div>

    <!-- FOOTER -->
    <footer id="footer">
        <!-- top footer -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-5 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Mọi thắc mắc vui lòng liên hệ</h3>
                            <ul class="footer-links">
                                <li><i class="fa fa-map-marker"></i>Hồ Chí Minh</li>
                                <li><i class="fa fa-phone"></i>0394003434</li>
                                <li><i class="far fa-envelope"></i>techshop@hcmut.edu.vn</li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Các dòng sản phẩm</h3>
                            <ul class="footer-links">
                                <li>Laptop</li>
                                <li>Di động</li>
                                <li>Phụ kiện</li>
                            </ul>
                        </div>
                    </div>

                    <div class="clearfix visible-xs"></div>
                    <div class="col-md-4 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Dịch vụ</h3>
                            <ul class="footer-links">
                                <li>Thanh toán online, tiết kiệm thời gian</li>
                                <li>Mua online, giao hàng tận nơi</li>
                                <li>Tri ân khách hàng</li>
                                <li>Mua trả góp lãi xuất 0%</li>
                                <li>Hỗ trợ giải đáp mọi thắc mắc</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /top footer -->
    </footer>
    <!-- /FOOTER -->
    <script src="/assets/js/jquery-3.3.1.slim.min.js"></script>  
    <script src="/assets/js/popper.min.js"></script>  

    <script src="/assets/lib/jquery/dist/jquery.min.js"></script>
    <script src="/assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/site.js"></script>
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>  
    <script src="/assets/js/slick.min.js"></script>  
    <script src="/assets/js/main.js"></script>
    <script type="text/javascript">
        let x = document.querySelectorAll(".price");
        for (let i = 0, len = x.length; i < len; i++) {
            let num = Number(x[i].innerHTML)
                .toLocaleString('en');
            x[i].innerHTML = num;
            x[i].classList.add("currSign");
        }
    </script>
    <script src="/assets/js/site.js"></script>        
</body>
</html>
