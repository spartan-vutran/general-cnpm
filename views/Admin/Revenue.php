<div class="main">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card__header1">
                    <h3>Quản lí doanh thu</h3>
                </div>
                <div>
                    <form action="/Admin/Revenue" method="post">
                        <input type="month" name="date" />
                        <button type="submit" style="background-color: #bfe9c3; border-radius:2px;">
                            Tìm kiếm
                        </button>
                    </form>
                </div>
                <div class="row">
                    <div class="col-6 col-md-6 col-sm-12">
                        <div class="box box-hover">
                            <!-- COUNTER -->
                            <div class="counter">
                                <div class="counter-title">
                                    Tổng đơn hàng trong tháng
                                </div>
                                <div class="counter-info">
                                    <div class="counter-count">
                                        <?php
                                        $listbill = json_decode($data['numberbill'], true);
                                        echo $listbill[0]['numofbill'];
                                        ?>
                                    </div>
                                    <i class="fas fa-shopping-cart"></i>
                                </div>
                            </div>
                            <!-- END COUNTER -->
                        </div>
                    </div>
                    <div class="col-6 col-md-6 col-sm-12">
                        <div class="box box-hover">
                            <!-- COUNTER -->
                            <div class="counter">
                                <div class="counter-title">
                                    Tổng doanh thu tháng
                                </div>
                                <div class="counter-info">
                                    <div class="counter-count price">
                                        <?php
                                        $totalbill = json_decode($data['totalbill'], true);
                                        echo $totalbill[0]['Total'];
                                        ?>
                                    </div>
                                    <i class="fas fa-donate"></i>
                                </div>
                            </div>
                            <!-- END COUNTER -->
                        </div>
                    </div>
                </div>
                <div className="card__body">
                    <div class="col-12">
                        <div class="counter-title">
                            <form action="/Admin/Revenue" method="post">
                                <label>Từ</label>
                                <input type="date" name="date1" />
                                <label>Đến</label>
                                <input type="date" name="date2" />
                                <button type="submit" style="background-color: #bfe9c3; border-radius:2px;">
                                    Tìm kiếm
                                </button>
                            </form>
                        </div>
                        <!-- ORDERS TABLE -->
                        <div class="box">
                            <div class="box-header">
                                Danh sách Bill đã thanh toán
                            </div>
                            <div class="box-body overflow-scroll">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Chi tiết</th>
                                            <th>Tên</th>
                                            <th>Phương thức thanh toán</th>
                                            <th>Ngày thanh toán</th>
                                            <th>Số điện thoại</th>
                                            <th>Tổng thanh toán</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $listbill = json_decode($data['revenuelist'], true);
                                        $output = '';
                                        foreach ($listbill as $item) {
                                            $time = strtotime($item['DateCreateBill']. '+7 hours');
                                            $timepayment = date("Y-m-d H:i:s", $time);  
                                            $output .= '
                                                <tr>
                                                    <td>' . $item['BillId'] . '</td>
                                                    <td>
                                                        <a href="">Xem chi tiết</a>
                                                    </td>
                                                    <td>
                                                        ' . $item['UserName'] . '
                                                    </td>
                                                    <td>' . $item['PaymentMethod'] . '</td>
                                                    <td>' . $timepayment . '</td>
                                                    <td>' . $item['PhoneNumber'] . '</td>
                                                    <td class="price">' . $item['TotalPrice'] . '</td>
                                                </tr>';
                                        }
                                        echo $output;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END ORDERS TABLE -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="main1">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card__header1">
                    <h3>Quản lí doanh thu</h3>
                </div>
                <div>
                    <form action="/Admin/Revenue" method="post">
                        <input type="month" name="date" />
                        <button type="submit">
                            Tìm kiếm
                        </button>
                    </form>
                </div>
                <div class="row">
                    <div class="col-6 col-md-6 col-sm-12">
                        <div class="box box-hover">
                            <!-- COUNTER -->
                            <div class="counter">
                                <div class="counter-title">
                                    Tổng đơn hàng trong tháng
                                </div>
                                <div class="counter-info">
                                    <div class="counter-count">
                                        <?php
                                        $listbill = json_decode($data['numberbill'], true);
                                        echo $listbill[0]['numofbill'];
                                        ?>
                                    </div>
                                    <i class="fas fa-shopping-cart"></i>
                                </div>
                            </div>
                            <!-- END COUNTER -->
                        </div>
                    </div>
                    <div class="col-6 col-md-6 col-sm-12">
                        <div class="box box-hover">
                            <!-- COUNTER -->
                            <div class="counter">
                                <div class="counter-title">
                                    Tổng doanh thu tháng
                                </div>
                                <div class="counter-info">
                                    <div class="counter-count price">
                                        <?php
                                        $totalbill = json_decode($data['totalbill'], true);
                                        echo $totalbill[0]['Total'];
                                        ?>
                                    </div>
                                    <i class="fas fa-donate"></i>
                                </div>
                            </div>
                            <!-- END COUNTER -->
                        </div>
                    </div>
                </div>
                <div className="card__body">
                    <div class="col-12">
                        <div class="counter-title">
                            <form action="/Admin/Revenue" method="post">
                                <label>Từ</label>
                                <input type="date" name="date1" />
                                <label>Đến</label>
                                <input type="date" name="date2" />
                                <button type="submit">
                                    Tìm kiếm
                                </button>
                            </form>
                        </div>
                        <!-- ORDERS TABLE -->
                        <div class="box">
                            <div class="box-header">
                                Danh sách Bill đã thanh toán trong ngày
                            </div>
                            <div class="box-body overflow-scroll">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Chi tiết</th>
                                            <th>Tên</th>
                                            <th>Phương thức thanh toán</th>
                                            <th>Ngày thanh toán</th>
                                            <th>Số điện thoại</th>
                                            <th>Tổng thanh toán</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $listbill = json_decode($data['revenuelist'], true);
                                        $output = '';
                                        foreach ($listbill as $item) {
                                            $timepayment = date("F j, Y", strtotime($item['DateCreateBill']));
                                            $output .= '
                                                <tr>
                                                    <td>' . $item['BillId'] . '</td>
                                                    <td>
                                                        <a href="">Xem chi tiết</a>
                                                    </td>
                                                    <td>
                                                        ' . $item['UserName'] . '
                                                    </td>
                                                    <td>' . $item['PaymentMethod'] . '</td>
                                                    <td>' . $timepayment . '</td>
                                                    <td>' . $item['PhoneNumber'] . '</td>
                                                    <td class="price">' . $item['TotalPrice'] . '</td>
                                                </tr>';
                                            echo $output;
                                        }

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END ORDERS TABLE -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>