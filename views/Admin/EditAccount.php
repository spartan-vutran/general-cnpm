<div class="main">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card__header1">
                    <h3>Update tài khoản</h3>
                </div>
                <div class="card__body">
                    <?php
                     $item = json_decode($data['accountdetail'], true);
                    echo '
                        <form action="/Admin/UpdateAccount" method="post">
                            
                            <input type="hidden" class="form-control" name="Id" value="'.$item['Id'].'"
                            />
                            <div class="form-group">
                                <lable>Họ và tên</lable>
                                <input type="text" class="form-control" name="FullName" value="'.$item['FullName'].'"
                                />
                            </div>
                            <div class="form-group">
                                <lable>Email</lable>
                                <input type="email" class="form-control" readonly="readonly" name="Email" value="'.$item['Email'].'"
                                />
                            </div>
                            <div class="form-group">
                                <lable>Phone</lable>
                                <input type="text" class="form-control" name="Phone" value="'.$item['PhoneNumber'].'"
                                />
                            </div>
                            <div class="form-group">
                                <lable>Giới tính</lable>
                                <select class="form-control" name="Gender">
                                    <option value="0">Nam</option>
                                    <option value="1">Nữ</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <lable>Set Admin Role</lable>
                                <select name="Admin" class="form-control" value="'.$item['Admin'].'">
                                    <option value="0">Khách hàng</option>
                                    <option value="1">Admin</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="buttonform" name="update" value="update">Sửa</button>
                                </div>
                            </div>

                        </form>';
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>