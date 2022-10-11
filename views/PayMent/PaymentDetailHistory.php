<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- ASIDE -->
            <!-- store products -->
            <div>
                <h2>Lịch sử thanh toán</h2>
                <table class="table table-borderless table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center">
                            STT
                            </th>
                            <th class="text-center">
                            Tên sản phẩm
                            </th>
                            <th class="text-center">
                            Hình ảnh
                            </th>
                            <th class="text-center">
                            Giá (VNĐ)
                            </th>
                            <th class="text-center">
                            Số LượngTổng (VNĐ)
                            </th>
                            <th class="text-center">
                            Tổng (VNĐ)
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 0;
                            $listbill = json_decode($data['billDetail'], true);
                            $output='';
                            if (count($listbill) > 0)
                            {
                                foreach ($listbill as $item)
                                {
                                    $i++;
                                    $productId = $item['ProductId'];
                                    $output.='
                                        <tr>
                                            <td class="text-center">'.$i.'</td>
                                            <td class="text-center">
                                                <a href="/Product/Product/'.$productId.'">
                                                '.$item['ProductName'].'
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <a href="/Product/Product/'.$productId.'">
                                                    <img src="'.$item['ImgUrl'].'" class="rounded" width="60" height="60">
                                                </a>
                                            </td>
                                            <td class="text-center price">'.$item['ProductPrice'].'</td>
                                            <td class="text-center">'.$item['Quantity'].'</td>
                                            <td class="text-center price">'.$item['TotalProductPrice'].'</td>
                                        </tr>';
                                }
                            }
                            else
                            {
                                $output.='
                                <tr>
                                    <td colspan="5" class="text-center">Bạn chưa thanh toán lần nào!!</td>
                                </tr>';
                            }
                            echo $output;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /STORE -->
        <!-- /row -->
    </div>
    <!-- /container -->
</div>