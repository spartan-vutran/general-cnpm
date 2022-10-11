<div class="main">
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card__header1">
                    <h3>Tạo tài khoản Admin</h3>
                </div>
                <div class="card__body">
                    <form action="/Admin/Account" method="post">
                        <div class="form-group">
                            <lable>Tên tài khoản</lable>
                            <input type="text" class="form-control" name="UserName" />
                        </div>
                        <div class="form-group">
                            <lable>Mật khẩu</lable>
                            <input type="password" class="form-control" name="Password" />
                        </div>
                        <span class="text-danger"><?php if (isset($data["err"])) echo $data["err"]; ?></span>
                        <div class="form-group">
                            <lable>Nhập lại mật khẩu</lable>
                            <input type="password" class="form-control" name="RePassword" />
                        </div>
                        <div class="form-group">
                            <lable>Họ và tên</lable>
                            <input type="text" class="form-control" name="FullName" />
                        </div>
                        <div class="form-group">
                            <lable>Email</lable>
                            <input type="email" class="form-control" name="Email" />
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="buttonform">Thêm</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card__header1">
                    <h3>Danh sách tài khoản</h3>
                </div>
                <div class="card__body">
                    <div class="col-12">
                        <!-- ORDERS TABLE -->
                        <div class="box">
                            <div class="box-header">
                                Danh sách tài khoản
                            </div>
                            <div class="box-body overflow-scroll">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Tên</th>
                                            <th>Vai trò</th>
                                            <th>Ngày sinh</th>
                                            <th>Số điện thoại</th>
                                            <th>Điểm tích lũy</th>
                                            <th scope="col">Xoá/Sửa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $listaccount = json_decode($data['accountlist'], true);
                                        $output = '';
                                        foreach ($listaccount as $item) {
                                            $output .= '<tr>
                                                <td>' . $item['FullName'] . '</td>';
                                            if ($item['Admin'] == 1) {
                                                $output .= ' <td>Admin</td>';
                                            } else {
                                                $output .= ' <td>Khách hàng</td>';
                                            }
                                            $output .= '<td>' . $item['BirthDay'] . '</td>
                                                <td>' . $item['PhoneNumber'] . '</td>
                                                <td>' . $item['Point'] . '</td>';
                                            $output .= '
                                                <td>
                                                    <div style="display: flex;">
                                                        <form action="/Admin/DeleteAccount" method="post" onsubmit="return confirm(' . "'Bạn chắc chắc muốn xoá!!!'" . ');">
                                                            <input type="hidden" name="idAccount" value="' . $item['Id'] . '" />
                                                            <button type="submit">
                                                                <i class="far fa-trash-alt" aria-hidden="true"
                                                                   style="font-size: 25px; margin-right: 10px; display:flex;"
                                                                   }}></i>
                                                            </button>
                                                        </form>
                                                        <a class=" mr-3"
                                                            href="/Admin/EditAccount/' . $item['Id'] . '"">
                                                            <i class="fa fa-edit"
                                                               aria-hidden="true" style="font-size: 25px;"></i>
                                                        </a>
                                                    </div>
                                                </td>
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
                    <h3>Tạo tài khoản Admin</h3>
                </div>
                <div class="card__body">
                    <form action="/Admin/Account" method="post">
                        <div class="form-group">
                            <lable>Tên tài khoản</lable>
                            <input type="text" class="form-control" name="UserName" />
                        </div>
                        <div class="form-group">
                            <lable>Mật khẩu</lable>
                            <input type="password" class="form-control" name="Password" />
                        </div>
                        <span class="text-danger"><?php if (isset($data["err"])) echo $data["err"]; ?></span>
                        <div class="form-group">
                            <lable>Nhập lại mật khẩu</lable>
                            <input type="password" class="form-control" name="RePassword" />
                        </div>
                        <div class="form-group">
                            <lable>Họ và tên</lable>
                            <input type="text" class="form-control" name="FullName" />
                        </div>
                        <div class="form-group">
                            <lable>Email</lable>
                            <input type="email" class="form-control" name="Email" />
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="buttonform">Thêm</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card__header1">
                    <h3>Danh sách tài khoản</h3>
                </div>
                <div class="card__body">
                    <div class="col-12">
                        <!-- ORDERS TABLE -->
                        <div class="box">
                            <div class="box-header">
                                Danh sách tài khoản
                            </div>
                            <div class="box-body overflow-scroll">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Tên</th>
                                            <th>Giới tính</th>
                                            <th>Ngày sinh</th>
                                            <th>Số điện thoại</th>
                                            <th>Điểm tích lũy</th>
                                            <th scope="col">Xoá/Sửa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $listaccount = json_decode($data['accountlist'], true);
                                        $output = '';
                                        foreach ($listaccount as $item) {
                                            $output .= '<tr>
                                                <td>' . $item['FullName'] . '</td>';
                                            if ($item['Gender'] == true) {
                                                $output .= ' <td>Nam</td>';
                                            } else {
                                                $output .= ' <td>Nữ</td>';
                                            }
                                            $output .= '<td>' . $item['BirthDay'] . '</td>
                                                <td>' . $item['PhoneNumber'] . '</td>
                                                <td>' . $item['Point'] . '</td>';
                                            $output .= '
                                                <td>
                                                    <div style="display: flex;">
                                                        <form action="/Admin/DeleteAccount" method="post" onsubmit="return confirm(' . "'Bạn chắc chắc muốn xoá!!!'" . ');">
                                                            <input type="hidden" name="idAccount" value="' . $item['Id'] . '" />
                                                            <button type="submit">
                                                                <i class="far fa-trash-alt" aria-hidden="true"
                                                                   style="font-size: 25px; margin-right: 10px; display:flex;"
                                                                   }}></i>
                                                            </button>
                                                        </form>
                                                        <a class=" mr-3"
                                                            href="/Admin/EditAccount/' . $item['Id'] . '"">
                                                            <i class="fa fa-edit"
                                                               aria-hidden="true" style="font-size: 25px;"></i>
                                                        </a>
                                                    </div>
                                                </td>
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
</div>