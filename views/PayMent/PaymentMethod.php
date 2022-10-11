<!DOCTYPE html>
<html>

<head>
    <title>Thanh toán</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" crossorigin="anonymous" />

    <link rel="stylesheet" type="text/css" href="/assets/css/payment.css" />
    <style>
        .currSign:after {
            content: ' VND';
        }
    </style>
</head>

<body>
    <div class="payment">
        <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
            <div class="card">
                <div class="card-header p-4">
                    <?php 
                        $item = json_decode($data['bill'], true);
                        $output ='';
                        if (count([$item]) > 0 and $item !=null)
                        {
                            $output.='
                            <h3 class="pt-2 d-inline-block">
                                Mã đơn hàng<br />
                                '.$item['BillId'].'
                            </h3>';
                        }
                        echo $output;
                    ?>
                    <div class="float-right">
                        <?php
                            $item = json_decode($data['bill'], true);
                            $output ='';
                            if (count([$item]) > 0 and $item !=null)
                            {
                                // $localtime = $item['DateCreateBill'];
                                // $timezone= (new DateTime)->getTimezone();
                                // $localtime->setTimezone($timezone);
                                // $date = $localtime->format('Y-m-d H:i:s T');
                                // $hour =  $localtime->format('Y-m-d H:i:s T');
                                $date = date("F j, Y", strtotime($item['DateCreateBill']));
                                $hour= date("g:i a", strtotime($item['DateCreateBill']));
                                $output.='
                                <h3 class="mb-0" id="current-date">
                                    Ngày: '.$date.'
                                </h3>
                                <h4 class="mb-0" id="current-time">
                                    Thời gian: '.$hour.'
                                </h4>';
                            }
                            echo $output
                        ?>
                    </div>
                </div>
                <div class="card-body">
                    <table class="container">
                        <tr>
                            <td class="text-center">
                                <b><span class="rth"><a id="return-home" href="/Payment/Payment"></a></span></b>
                            </td>
                            <?php
                                $item = json_decode($data['bill'], true);
                                $output ='';
                                if (count([$item]) > 0 and $item !=null)
                                {
                                    $output.='
                                    <th class="text-right">
                                        <div class="body-btn-payment">
                                            <div class="btn-payment">
                                                <div class="left-side" onclick="openNav()">
                                                    <button class="card-payment" onclick="openNav()">
                                                        <div class="card-payment-line"></div>
                                                        <div class="btn-pay"></div>
                                                    </button>
                                                    <div class="post">
                                                        <div class="post-line"></div>
                                                        <div class="screen">
                                                            <div class="vnd">VND</div>
                                                        </div>
                                                        <div class="numbers"></div>
                                                        <div class="numbers-line2"></div>
                                                    </div>
                                                </div>
                                                <div class="right-side">
                                                    <div class="new">
                                                        <h4><strong class="text-dark">Thanh toán</strong></h4>
                                                        <h4><strong class="text-dark price">'.$item['TotalPrice'].'</strong></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </th>';
                                    echo $output;
                                }
                            ?>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div id="nav" class="overlay">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <!-- Paymnet page -->
            <div class="payment-page">
                <div class="container py-5">
                    <!-- For demo purpose -->
                    <div class="row mb-4">
                        <div class="col-lg-8 mx-auto text-center">
                        </div>
                    </div> <!-- End -->
                    <div class="row">
                        <div class="col-lg-6 mx-auto">
                            <div class="card ">
                                <div class="card-header">
                                    <div class="bg-white shadow-sm pt-1 pl-2 pr-2 pb-1">
                                        <!-- Credit card form tabs -->
                                        <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                                            <li class="nav-item">
                                                <a data-toggle="pill" href="#paypal"
                                                   class="nav-link active">
                                                    <i class="fas fa-wallet"></i> Ví điện tử
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a data-toggle="pill" href="#credit-card"
                                                   class="nav-link">
                                                    <i class="fas fa-credit-card mr-2"></i> Thẻ ngân
                                                    hàng
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a data-toggle="pill" href="#net-banking"
                                                   class="nav-link ">
                                                    <i class="fas fa-mobile-alt mr-2"></i>
                                                    Chuyển khoản
                                                </a>
                                            </li>
                                        </ul>
                                    </div> <!-- End -->
                                    <!-- Credit card form content -->
                                    <div class="tab-content">
                                        <!-- Paypal info -->
                                        <div id="paypal" class="tab-pane fade fade show active pt-3">
                                            <strong>Chọn ví điện tử:</strong>
                                            <table class="container">
                                                <tr>
                                                    <th class="text-center">
                                                        <button id="btn1-show"
                                                                class="button type1"></button>
                                                    </th>
                                                    <th class="text-center">
                                                        <button id="btn2-show"
                                                                class="button type2"></button>
                                                    </th>
                                                    <th class="text-center">
                                                        <button id="btn3-show"
                                                                class="button type3"></button>
                                                    </th>
                                                </tr>
                                            </table>
                                            <form action="/Payment/PaymentMethod" method="post">
                                                <div class="text-center" id="momo-QR-code">
                                                    <img id="momo-QR-code" src="/assets/images/momo_success.jpg"
                                                         alt='Pay Momo wallet success' />
                                                    <button class="finish-payment"
                                                            value="Ví điện tử Momo"
                                                            name="PaymentMethod">
                                                        <span>Hoàn thành</span>
                                                        <div class="liquid"></div>
                                                    </button>
                                                </div>
                                                <div class="text-center" id="zalopay-QR-code">
                                                    <img id="zalopay-QR-code" src="/assets/images/zalopay_success.jpg"
                                                         alt='Pay ZaloPay wallet success' />
                                                    <button class="finish-payment"
                                                            value="Ví điện tử ZaloPay"
                                                            name="PaymentMethod">
                                                        <span>Hoàn thành</span>
                                                        <div class="liquid"></div>
                                                    </button>
                                                </div>
                                                <div class="text-center" id="airpay-QR-code">
                                                    <img id="airpay-QR-code" src="/assets/images/airpay_success.jpg"
                                                         alt='Pay Airpay wallet success' />
                                                    <button class="finish-payment"
                                                            value="Ví điện tử AirPay"
                                                            name="PaymentMethod">
                                                        <span>Hoàn thành</span>
                                                        <div class="liquid"></div>
                                                    </button>
                                                </div>
                                            </form>
                                        </div> <!-- End -->
                                        <!-- credit card info-->
                                        <div id="credit-card" class="tab-pane pt-3">
                                            <div class="form-group">
                                                <b>Tài khoản</b>
                                                <div class="input-group form-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-user-circle"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" class="form-control"
                                                           placeholder="Nhập tên tài khoản" required />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <b>Chọn ngân hàng</b>
                                                <div class="input-group form-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-university"></i>
                                                        </span>
                                                    </div>
                                                    <select class="form-control">
                                                        <option>--Chọn ngân hàng--</option>
                                                        <option>Ngân hàng TMCP Á Châu (ACB)</option>
                                                        <option>
                                                            Ngân Hàng TMCP Công Thương Việt Nam (ViettinBank,
                                                            CTG)
                                                        </option>
                                                        <option>
                                                            Ngân Hàng TMCP Ngoại thương Việt Nam (Vietcombank,
                                                            VCB)
                                                        </option>
                                                        <option>
                                                            Ngân Hàng TMCP Đầu tư và Phát triển Việt Nam (BIDV)
                                                        </option>
                                                        <option>
                                                            Ngân hàng TMCP Việt Nam Thịnh Vượng (VPBank)
                                                        </option>
                                                        <option>Ngân hàng TMCP Nam Á (Nam A Bank)</option>
                                                        <option>Ngân hàng TMCP Đông Á (Đông Á Bank, DAB)</option>
                                                        <option>Ngân hàng TMCP Tiên Phong (TPBank)</option>
                                                        <option>Ngân hàng TMCP Sài Gòn (Sài Gòn, SCB)</option>
                                                        <option>
                                                            Ngân hàng TMCP Việt Nam Thương Tín (VietBank)
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <b>Số thẻ</b>
                                                <div class="input-group form-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-money-check-alt"></i>
                                                        </span>
                                                    </div>
                                                    <input type="number"
                                                           placeholder="Nhập mã số thẻ" class="form-control " required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text text-muted">
                                                            <i class="fab fa-cc-visa mx-1"></i>
                                                            <i class="fab fa-cc-mastercard mx-1"></i>
                                                            <i class="fab fa-cc-amex mx-1"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <div class="form-group">
                                                        <span class="hidden-xs">
                                                            <b>Hiệu lực từ ngày</b>
                                                        </span>
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-calendar-alt"></i>
                                                            </span>
                                                            <select class="form-control">
                                                                <option>--Tháng--</option>
                                                                <option value='01'>Tháng 1</option>
                                                                <option value='02'>Tháng 2</option>
                                                                <option value='03'>Tháng 3</option>
                                                                <option value='04'>Tháng 4</option>
                                                                <option value='05'>Tháng 5</option>
                                                                <option value='06'>Tháng 6</option>
                                                                <option value='07'>Tháng 7</option>
                                                                <option value='08'>Tháng 8</option>
                                                                <option value='09'>Tháng 9</option>
                                                                <option value='10'>Tháng 10</option>
                                                                <option value='11'>Tháng 11</option>
                                                                <option value='12'>Tháng 12</option>
                                                            </select>
                                                            <select class="form-control">
                                                                <option>--Năm--</option>
                                                                <option value='10'>2010</option>
                                                                <option value='11'>2011</option>
                                                                <option value='12'>2012</option>
                                                                <option value='13'>2013</option>
                                                                <option value='14'>2014</option>
                                                                <option value='15'>2015</option>
                                                                <option value='16'>2016</option>
                                                                <option value='17'>2017</option>
                                                                <option value='18'>2018</option>
                                                                <option value='19'>2019</option>
                                                                <option value='20'>2020</option>
                                                                <option value='21'>2021</option>
                                                                <option value='22'>2022</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group mb-4">
                                                        <label data-toggle="tooltip"
                                                               title="Nhập mật khẩu thẻ ngân hàng">
                                                            <b>Mật khẩu <i class="fa fa-question-circle d-inline"></i></b>
                                                        </label>
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-key"></i>
                                                            </span>
                                                            <input type="text" placeholder="Mật khẩu" required class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-footer">
                                                <form action="/Payment/PaymentMethod" method="post">
                                                    <button value="Thẻ ngân hàng"
                                                            name="PaymentMethod"
                                                            class="button-three">
                                                        Xác nhận
                                                    </button>
                                                </form>
                                            </div>

                                        </div> <!-- End -->
                                        <!-- bank transfer info -->
                                        <div id="net-banking" class="tab-pane fade pt-3">
                                        <?php
                                            $item = json_decode($data['bill'], true);
                                            $output ='';
                                            if (count([$item]) > 0 and $item !=null)
                                                {
                                                    echo '
                                                    <h4><b>Tài khoản: 123456789</b></h4>
                                                    <h4><b>Ngân hàng: ViettinBank</b></h4>
                                                    <h4><b>Số tiền: </b><b class="price">'.$item['TotalPrice'].'</b></h4>
                                                    <h4><b>Nội dung: Thanh toán hóa đơn.</b></h4>
                                                    ';
                                                }
                                                else
                                                {
                                                    echo '<h3 class="text-center"><b>Thanh toán thất bại!</b></h3>';
                                                }
                                        ?>
                                            <div class="text-center">
                                                <form action="/Payment/PaymentMethod" method="post">
                                                    <button value="Chuyển khoản"
                                                            name="PaymentMethod"
                                                            class="button-three">
                                                        Xác nhận
                                                    </button>
                                                </form>
                                            </div>
                                        </div> <!-- End -->
                                    </div> <!-- End -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    (function () {
                        ('[data-toggle="tooltip"]').tooltip();
                    });
                </script>
                <script>
                    // Hide tag p
                    $(document).ready(function () {
                        $("#momo-QR-code").hide();
                        $("#zalopay-QR-code").hide();
                        $("#airpay-QR-code").hide();
                        $(".finish-payment").hide();

                        $("#btn1-show").click(function () {
                            $("#momo-QR-code").show();
                            $("#zalopay-QR-code").hide();
                            $("#airpay-QR-code").hide();
                            $(".finish-payment").show();
                        });
                        $("#btn2-show").click(function () {
                            $("#momo-QR-code").hide();
                            $("#zalopay-QR-code").show();
                            $("#airpay-QR-code").hide();
                            $(".finish-payment").show();
                        });
                        $("#btn3-show").click(function () {
                            $("#momo-QR-code").hide();
                            $("#zalopay-QR-code").hide();
                            $("#airpay-QR-code").show();
                            $(".finish-payment").show();
                        });
                    });
                </script>
            </div>
            <!-- End payment page -->
        </div>

    </div>
    <script>
        function openNav() {
            document.getElementById("nav").style.height = "100%";
        }
        function closeNav() {
            document.getElementById("nav").style.height = "0%";
        }
        let x = document.querySelectorAll(".price");
        for (let i = 0, len = x.length; i < len; i++) {
            let num = Number(x[i].innerHTML)
                .toLocaleString('en');
            x[i].innerHTML = num;
            x[i].classList.add("currSign");
        }
    </script>
</body>

</html>