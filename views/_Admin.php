<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EcommerceStore</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="/assets/css/app.css" />
    <link type="text/css" rel="stylesheet" href="/assets/css/grid.css" />
    <link type="text/css" rel="stylesheet" href="/assets/css/theme.css" />
    <style>
        .currSign:after {
            color: black;
            content: ' VND';
        }
    </style>
</head>

<body>
    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="sidebar-user">
            <div class="sidebar-user-info">
                <div class="sidebar-user-name">
                <?php  
                        if(isset($_SESSION["account"])){
                            $User = $_SESSION["account"];
                            $obj = json_decode($User,true);
                            if($obj["Admin"] == 1){
                                echo '<h4>Hi ' .$obj["UserName"].'</h4>';
                            }
                        }
                               
                    ?>
                </div>
            </div>
            <!-- <a href="@Url.Action("Logout","Home")" class="btn btn-outline"> -->
            <li class="rs_logout"><a href="/Home/Logout"><i class="fas fa-sign-out-alt"></i>Đăng xuất</a></li>
            <!-- <i class="fas fa-sign-in-alt"></i>
            </a> -->
        </div>
        <!-- SIDEBAR MENU -->
        <button class="moblie-menu" onclick="mobile_dropdown()">
            <i class="fas fa-bars"></i>
        </button>
        <ul class="sidebar-menu">
            <li>
                <a href="/Admin/Revenue">
                    <i class="fas fa-donate"></i>
                    <h4>Quản lí doanh thu</h4>
                </a>
            </li>
            <li>
                <a href="/Admin/Account">
                    <i class="fas fa-user"></i>
                    <h4>Quản lí tài khoản</h4>
                </a>
            </li>
            <li>
                <a href="/Admin/AdminProduct">
                    <i class="fas fa-tablet-alt"></i>
                    <h4>Quản lí sản phẩm</h4>
                </a>
            </li>
            <li>
                <a href="/Home/index">
                    <i class="fab fa-intercom"></i>
                    <h4>Trạng thái khách hàng</h4>
                </a>
            </li>
        </ul>

        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
    <?php require_once "./views/" . $data["Page"] . ".php" ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script type="text/javascript">
        let x = document.querySelectorAll(".price");
        for (let i = 0, len = x.length; i < len; i++) {
            let num = Number(x[i].innerHTML)
                .toLocaleString('en');
            x[i].innerHTML = num;
            x[i].classList.add("currSign");
        }

        function mobile_dropdown() {
            const sidebar_menu = document.querySelector(".sidebar-menu");
            if (sidebar_menu.classList.contains("active")) {
                sidebar_menu.classList.remove("active");
            } else {
                sidebar_menu.classList.add("active");
            }
        }
        const mobile_sidebar = document.querySelector('.sidebar');

        if ($(document).width() <= 540) {
            mobile_sidebar.classList.add("sidebar1");
            mobile_sidebar.classList.remove("sidebar");
        } else {
            mobile_sidebar.classList.add("sidebar");
            mobile_sidebar.classList.remove("sidebar1");
        }

        window.addEventListener("resize", function(event) {
            if ($(document).width() <= 540) {
                mobile_sidebar.classList.add("sidebar1");
                mobile_sidebar.classList.remove("sidebar");
            } else {
                mobile_sidebar.classList.add("sidebar");
                mobile_sidebar.classList.remove("sidebar1");
            }
        })
    </script>
</body>

</html>