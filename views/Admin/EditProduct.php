<div class="main">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card__header1">
                    <h3>Chỉnh sửa thông tin sản phẩm</h3>
                </div>
                <div class="card__body">
                    <?php
                    $item = json_decode($data['productdetail'], true);
                    echo '
                    <form action="/Admin/UpdateProduct" method="post">
                        <input type="hidden" class="form-control" name="Id" value="'.$item['ProductId'].'" />
                        <div class="form-group">
                        <lable>Tên sản phẩm</lable>
                            <input type="text" class="form-control" name="Name" value="'.$item['Name'].'" />
                        </div>
                        <div class="form-group">
                            <lable>Loại sản phẩm</lable>
                            <select name="Type" class="form-control" value="'.$item['Type'].'" >
                                <option value="">Chọn 1 trong các loại</option>
                                <option value="laptop">Laptop</option>
                                <option value="smartphone">Smartphone</option>
                                <option value="accessory">Accessory</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <lable>Hãng sản xuất</lable>
                            <input type="text" class="form-control" name="BrandName" value="'.$item['BrandName'].'" />
                        </div>
                        <div class="form-group">
                            <lable>Giá</lable>
                            <input type="number" class="form-control" name="Price" value="'.$item['Price'].'" />
                        </div>
                        <div class="form-group">
                            <lable>Đặc biệt</lable>
                            <select name="Special" class="form-control" value="'.$item['Special'].'" >
                                <option value="">Loại sản phẩm</option>
                                <option value="no">Bình thường</option>
                                <option value="moi">Sản phẩm mới</option>
                                <option value="banchay">Sản phẩm bán chạy</option>
                                <option value="khuyenmai">Sản phẩm khuyến mãi</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <lable>Sell-Off</lable>
                            <input type="number" class="form-control" name="SellOff" value="'.$item['SellOff'].'" />
                        </div>
                        <div class="form-group">
                            <lable>ImgUrl</lable>
                            <input type="text" class="form-control" name="ImgUrl" value="'.$item['ImgUrl'].'" />
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="buttonform">Sửa</button>
                            </div>
                        </div>
                    </form>';
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>