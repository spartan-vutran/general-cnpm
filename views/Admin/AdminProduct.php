<div class="main">
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card__header1">
                    <h3>Quản lí sản phẩm</h3>
                </div>
                <div class="card__body">
                    <form action="/Admin/AdminProduct" method="post">
                        <!-- <div class="form-group">
                                <lable>Mã sản phẩm</lable>
                                <input type="text" class="form-control"/>
                            </div> -->
                        <div class="form-group">
                            <lable>Tên sản phẩm</lable>
                            <input type="text" class="form-control" name="Name" />
                        </div>
                        <div class="form-group">
                            <lable>Loại sản phẩm</lable>
                            <!-- <input type="text" class="form-control" name="Type"/> -->
                            <select name="Type" class="form-control">
                                <option value="">Chọn 1 trong các loại</option>
                                <option value="laptop">Laptop</option>
                                <option value="smartphone">Smartphone</option>
                                <option value="accessory">Accessory</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <lable>Hãng sản xuất</lable>
                            <input type="text" class="form-control" name="BrandName" />
                        </div>
                        <div class="form-group">
                            <lable>Giá</lable>
                            <input type="number" class="form-control" name="Price" />
                        </div>
                        <div class="form-group">
                            <lable>Đặc biệt</lable>
                            <!-- <input type="text" class="form-control" name="product.Special"/> -->
                            <select name="Special" class="form-control">
                                <option value="">Loại sản phẩm</option>
                                <option value="no">Bình thường</option>
                                <option value="moi">Sản phẩm mới</option>
                                <option value="banchay">Sản phẩm bán chạy</option>
                                <option value="khuyenmai">Sản phẩm khuyến mãi</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <lable>ImgUrl</lable>
                            <input type="text" class="form-control" name="ImgUrl" />
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
                    <h3>Danh sách sản phẩm</h3>
                </div>
                <div class="card__body">
                    <div class="col-12">
                        <!-- ORDERS TABLE -->
                        <div class="box">
                            <div class="box-header">
                                Danh sách sản phẩm hiện có
                            </div>
                            <div class="box-body overflow-scroll">
                                <table class="adminproduct">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Loại sản phẩm</th>
                                            <th>Hãng sản xuất</th>
                                            <th>Giá sản phẩm</th>
                                            <th>Đánh giá</th>
                                            <th>Xoá/ Sửa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $listproduct = json_decode($data['productlist'], true);
                                        $output = '';
                                        foreach ($listproduct as $item) {
                                            $output .= '<tr>
                                                <td>' . $item['ProductId'] . '</td>
                                                <td>' . $item['Name'] . '</td>
                                                <td>' . $item['Type'] . '</td>
                                                <td>' . $item['BrandName'] . '</td>
                                                <td class="price">' . $item['Price'] . '</td>
                                                <td>' . $item['Rating'] . '</td>';
                                            $output .= '
                                                <td>
                                                    <div style="display: flex;">
                                                        <form action="/Admin/DeleteProduct" method="post" onsubmit="return confirm(' . "'Bạn chắc chắc muốn xoá!!!'" . ');">
                                                            <input type="hidden" name="ProductId" value="' . $item['ProductId'] . '" />
                                                            <button type="submit">
                                                                <i class="far fa-trash-alt" aria-hidden="true"
                                                                   style="font-size: 25px; margin-right: 10px; display:flex;"
                                                                   }}></i>
                                                            </button>
                                                        </form>
                                                        <a class=" mr-3"
                                                            href="/Admin/EditProduct/' . $item['ProductId'] . '"">
                                                            <i class="fa fa-edit"
                                                               aria-hidden="true" style="font-size: 25px;"></i>
                                                        </a>
                                                    </div>
                                                </td>';
                                            // <form asp-controller="Admin" asp-action="DeleteProduct">
                                            //     <td class="text-center">
                                            //         <input name="product" type="hidden" value="'.$item['ProductId'].'" />
                                            //         <button type="submit" class="primary-btn">
                                            //             <i class="fas fa-trash"></i>
                                            //         </button>
                                            //     </td>
                                            // </form>
                                            $output .= '</tr>';
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
                    <h3>Quản lí sản phẩm</h3>
                </div>
                <div class="card__body">
                    <form action="/Admin/AdminProduct" method="post">
                        <!-- <div class="form-group">
                                <lable>Mã sản phẩm</lable>
                                <input type="text" class="form-control"/>
                            </div> -->
                        <div class="form-group">
                            <lable>Tên sản phẩm</lable>
                            <input type="text" class="form-control" name="Name" />
                        </div>
                        <div class="form-group">
                            <lable>Loại sản phẩm</lable>
                            <!-- <input type="text" class="form-control" name="Type"/> -->
                            <select name="Type" class="form-control">
                                <option value="">Chọn 1 trong các loại</option>
                                <option value="laptop">Laptop</option>
                                <option value="smartphone">Smartphone</option>
                                <option value="accessory">Accessory</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <lable>Hãng sản xuất</lable>
                            <input type="text" class="form-control" name="BrandName" />
                        </div>
                        <div class="form-group">
                            <lable>Giá</lable>
                            <input type="number" class="form-control" name="Price" />
                        </div>
                        <div class="form-group">
                            <lable>Đặc biệt</lable>
                            <!-- <input type="text" class="form-control" name="product.Special"/> -->
                            <select name="Special" class="form-control">
                                <option value="">Loại sản phẩm</option>
                                <option value="no">Bình thường</option>
                                <option value="moi">Sản phẩm mới</option>
                                <option value="banchay">Sản phẩm bán chạy</option>
                                <option value="khuyenmai">Sản phẩm khuyến mãi</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <lable>ImgUrl</lable>
                            <input type="text" class="form-control" name="ImgUrl" />
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
                    <h3>Danh sách sản phẩm</h3>
                </div>
                <div class="card__body">
                    <div class="col-12">
                        <!-- ORDERS TABLE -->
                        <div class="box">
                            <div class="box-header">
                                Danh sách sản phẩm hiện có
                            </div>
                            <div class="box-body overflow-scroll">
                                <table class="adminproduct">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Loại sản phẩm</th>
                                            <th>Hãng sản xuất</th>
                                            <th>Giá sản phẩm</th>
                                            <th>Đánh giá</th>
                                            <th>Xoá/ Sửa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $listproduct = json_decode($data['productlist'], true);
                                        $output = '';
                                        foreach ($listproduct as $item) {
                                            $output .= '<tr>
                                                <td>' . $item['ProductId'] . '</td>
                                                <td>' . $item['Name'] . '</td>
                                                <td>' . $item['Type'] . '</td>
                                                <td>' . $item['BrandName'] . '</td>
                                                <td class="price">' . $item['Price'] . '</td>
                                                <td>' . $item['Rating'] . '</td>';
                                            $output .= '
                                                <td>
                                                    <div style="display: flex;">
                                                        <form action="/Admin/DeleteProduct" method="post" onsubmit="return confirm(' . "'Bạn chắc chắc muốn xoá!!!'" . ');">
                                                            <input type="hidden" name="ProductId" value="' . $item['ProductId'] . '" />
                                                            <button type="submit">
                                                                <i class="far fa-trash-alt" aria-hidden="true"
                                                                   style="font-size: 25px; margin-right: 10px; display:flex;"
                                                                   }}></i>
                                                            </button>
                                                        </form>
                                                        <a class=" mr-3"
                                                            href="/Admin/EditProduct/' . $item['ProductId'] . '"">
                                                            <i class="fa fa-edit"
                                                               aria-hidden="true" style="font-size: 25px;"></i>
                                                        </a>
                                                    </div>
                                                </td>';
                                            // <form asp-controller="Admin" asp-action="DeleteProduct">
                                            //     <td class="text-center">
                                            //         <input name="product" type="hidden" value="'.$item['ProductId'].'" />
                                            //         <button type="submit" class="primary-btn">
                                            //             <i class="fas fa-trash"></i>
                                            //         </button>
                                            //     </td>
                                            // </form>
                                            $output .= '</tr>';
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