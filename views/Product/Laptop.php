<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- ASIDE -->
            <div id="aside" class="col-md-3">
                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Nhà sản xuất</h3>
                    <div class="checkbox-filter">
                        <form action="/Product/Laptop" method="post">
                            <div class="input-checkbox">
                                <input type="checkbox" id="category-1" value="Apple" name="Category[]">
                                <label for="category-1">
                                    <span></span>
                                    Apple
                                </label>
                            </div>

                            <div class="input-checkbox">
                                <input type="checkbox" id="category-2" value="Dell" name="Category[]">
                                <label for="category-2">
                                    <span></span>
                                    Dell
                                </label>
                            </div>

                            <div class="input-checkbox">
                                <input type="checkbox" id="category-3" value="Asus" name="Category[]">
                                <label for="category-3">
                                    <span></span>
                                    Asus
                                </label>
                            </div>

                            <div class="input-checkbox">
                                <input type="checkbox" id="category-4" value="Lenevo" name="Category[]">
                                <label for="category-4">
                                    <span></span>
                                    Lenevo
                                </label>
                            </div>

                            <div class="input-checkbox">
                                <input type="checkbox" id="category-5" value="MSI" name="Category[]">
                                <label for="category-5">
                                    <span></span>
                                    MSI
                                </label>
                            </div>

                            <div class="input-checkbox">
                                <input type="checkbox" id="category-6" value="HP" name="Category[]">
                                <label for="category-6">
                                    <span></span>
                                    HP
                                </label>
                            </div>
                            <div class="input-checkbox">
                                <input type="checkbox" id="category-7" value="Acer" name="Category[]">
                                <label for="category-7">
                                    <span></span>
                                    Acer
                                </label>
                            </div>
                            <div class="input-checkbox">
                                <input type="submit" value="Lọc danh sách" style="background-color:yellow">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <!-- /ASIDE -->
            <!-- STORE -->
            <div id="store" class="col-md-9">
                <!-- store products -->
                <div class="row">
                <?php
                    $n = sizeof($data["laptop"]);
                    if($data["Start"]+$data["Limit"] < $n) $n = $data["Start"]+$data["Limit"];
                    for($i = $data["Start"];$i<$n;$i++)
                    {
                        echo"
                        <form action=\"\Product\AddCart\" method=\"post\" onsubmit=\"return confirm('Bạn muốn thêm vào giỏ hàng?!!!');\">
                            <input type=\"hidden\" name=\"ProductId\" value=\"".$data["laptop"][$i]["ProductId"]."\" />
                            <input type=\"hidden\" name=\"Quantity\" value=\"1\" />
                            <input type=\"hidden\" name=\"Name\" value=\"".$data["laptop"][$i]["Name"]."\" />
                            <input type=\"hidden\" name=\"ProductPrice\" value=\"".$data["laptop"][$i]["Price"]."\" />
                            <div class=\"col-md-4 col-xs-6\">
                                <div class=\"product\">
                                    <div class=\"product-img\">
                                        <img src=\"".$data["laptop"][$i]["ImgUrl"]."\" alt=\"\">
                                    </div>
                                    <div class=\"product-body\">
                                        <h3 class=\"product-name\"><a href=\"./Laptop/".$data["laptop"][$i]["ProductId"]."\">".$data["laptop"][$i]["Name"]."</a></h3>
                                        <div class=\"product-price-old-new\">
                                        ";
                                            if ($data["laptop"][$i]["OldPrice"] != 0)
                                            {
                                                echo "<h4 class=\"product-price price\">".$data["laptop"][$i]["Price"]."</h4> <del class=\"product-old-price price\">".$data["laptop"][$i]["OldPrice"]."</del>";
                                            }
                                            else
                                            {
                                                echo "<h4 class=\"product-price price\">".$data["laptop"][$i]["Price"]."</h4>";
                                            }
                                        echo "</div>
                                        <div class=\"product-rating\">";
                                                for ($j = 0; $j < $data["laptop"][$i]["Rating"];$j++)
                                                {
                                                    echo "<i class=\"fa fa-star\"></i>";
                                                }
                                        echo "</div>
                                    </div>
                                    <div class=\"add-to-cart\">
                                        <button class=\"add-to-cart-btn\" type=\"submit\">
                                            <i class=\"fa fa-shopping-cart\"></i> add to cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        ";
                    }
                    ?>
                </div>
                <!-- /store products -->
                <!-- store bottom filter -->
                <div class="store-filter clearfix">
                    <ul class="store-pagination">
                        <form action="/Product/Laptop" method="post">
                            <?php
                            for($i = 0;$i < $data["TotalPage"];$i++){
                                if($data["CurrentPage"] == $i + 1) echo '<button value="'.$i.'" name="CurrentPage" style="padding: 0;border:none;"><li class="active">'.($i+1).'</li></button>';
                                else echo '<button value="'.($i+1).'" name="CurrentPage" style="padding: 0;border:none;"><li>'.($i+1).'</li></button>';
                            }
                            ?>
                        </form>
                    </ul>
                </div>
                <!-- /store bottom filter -->
            </div>
            <!-- /STORE -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>