<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- Product main img -->
            <div class="col-md-6 ">
                <div class="product-preview">
                    <?php echo "<img src=\"".$data["product"]["ImgUrl"]."\" alt=\"\">";?>
                </div>
            </div>
            <!-- /Product main img -->
            <!-- Product details -->
            <form action="/Product/AddCart" method="post" onsubmit="return confirm('Bạn muốn thêm vào giỏ hàng?!!!')">
                <div class="col-md-6">
                    <div class="product-details">
                        <h2 class="product-name"><?php echo $data["product"]["Name"];?></h2>
                        <div>
                            <div class="product-rating">
                                <?php
                                    for ($i = 0; $i < $data["product"]["Rating"]; $i++)
                                    {
                                        echo "<i class=\"fa fa-star\"></i>";
                                    }
                                ?>
                            </div>
                            <?php echo sizeof($data["eval"])?> Reviews |
                            <a class="review-link" href="#tab1">Xem chi tiết và đánh giá</a>
                        </div>
                        <div>
                            <div class="product-price-old-new">
                                <?php
                                    if ($data["product"]["OldPrice"] != 0)
                                    {
                                        echo "<h3 class=\"product-price price\">".$data["product"]["Price"]."</h3> <del class=\"product-old-price price\">".$data["product"]["Price"]."</del>";
                                    }
                                    else
                                    {
                                        echo "<h3 class=\"product-price price\">".$data["product"]["Price"]." </h3>";
                                    }
                                ?>
                            </div><br>
                            <span class="product-available">Có sẵn trong kho</span>
                        </div>
                        <div class="product-options">
                            <label>
                                Số lượng
                                <input type="number" value=1 min="1" class="input-select" name="Quantity" />
                            </label>
                        </div>
                        <input type="hidden" name="ProductId" value="<?=$data["product"]["ProductId"];?>" />
                        <input type="hidden" name="Name" value="<?=$data["product"]["Name"];?>" />
                        <!-- <input type="hidden" name="Quantity" value="1" /> -->
                        <input type="hidden" name="ProductPrice" value="<?=$data["product"]["Price"];?>" />
                        <div class="add-to-cart">
                            <button type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                        </div>
                    </div>
                </div>
                <!-- /Product details -->
            </form>
            <!-- Product tab -->
            <div class="col-md-12">
                <div id="product-tab">
                    <!-- product tab nav -->
                    <ul class="tab-nav">
                        <li class="active"><a data-toggle="tab" href="#tab1">Mô tả chi tiết</a></li>
                        <li><a data-toggle="tab" href="#tab2">Đánh giá (
                            <?php
                            echo sizeof($data["eval"]);
                            ?>
                            )</a></li>
                    </ul>
                    <!-- /product tab nav -->
                    <!-- product tab content -->
                    <div class="tab-content">
                        <!-- tab1  -->
                        <div id="tab1" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-md-12">
                                    <article class="area_article area_articleFull">
                                        <?php
                                            foreach ($data["desc"] as $item)
                                            {
                                                echo "<h3 style=\"text-align: center;\">".$item["MainDesc"]."</h3>";
                                                echo "<p style=\"text-align: justify;
                                                            margin-bottom: 25px;\">".$item["Descip"]."</p>";
                                                echo "<p><img style=\"  display: block;
                                                margin-left: auto;
                                                margin-right: auto;
                                                margin-bottom: 25px;
                                                \" src=\"".$item["ImgUrl"]."\" alt=\"\" width=\"100%\" height=\"auto\" /></p>";
                                            }
                                        ?>
                                    </article>
                                </div>
                            </div>
                        </div>
                        <!-- /tab1  -->
                        <!-- tab2  -->
                        <div id="tab2" class="tab-pane fade in">
                            <div class="row">
                                <!-- Rating -->
                                <div class="col-md-3">
                                    <div id="rating">
                                        <div class="rating-avg">
                                            <span><?php $data["product"]["Rating"] ?></span>
                                            <div class="rating-stars">
                                                <?php
                                                for ($i = 0; $i < $data["product"]["Rating"]; $i++)
                                                {
                                                    echo "<i class=\"fa fa-star\"></i>";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <ul class="rating">
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <?php
                                                        $count5 = 0; 
                                                        $count4 = 0;
                                                        $count3 = 0;
                                                        $count2 = 0;
                                                        $count1 = 0;    
                                                        for ($i = 0;$i < sizeof($data["eval"]);$i++)
                                                        {
                                                            if ($data["eval"][$i]["Rating"] == 5)
                                                            {
                                                                $count5++;
                                                            }
                                                            if ($data["eval"][$i]["Rating"] == 4)
                                                            {
                                                                $count4++;
                                                            }
                                                            if ($data["eval"][$i]["Rating"] == 3)
                                                            {
                                                                $count3++;
                                                            }
                                                            if ($data["eval"][$i]["Rating"] == 2)
                                                            {
                                                                $count2++;
                                                            }
                                                            if ($data["eval"][$i]["Rating"] == 1)
                                                            {
                                                                $count1++;
                                                            }
                                                        }
                                                        echo"
                                                            <div class=\"rating-progress\">
                                                                <div style=\"width: ".($count5 * 20)."%;\"></div>
                                                            </div>
                                                            <span class=\"sum\">$count5</span>
                                                        </li>
                                                        <li>
                                                            <div class=\"rating-stars\">
                                                                <i class=\"fa fa-star\"></i>
                                                                <i class=\"fa fa-star\"></i>
                                                                <i class=\"fa fa-star\"></i>
                                                                <i class=\"fa fa-star\"></i>
                                                            </div>
                                                            <div class=\"rating-progress\">
                                                                <div style=\"width: ".($count4*20)."%;\"></div>
                                                            </div>
                                                            <span class=\"sum\">$count4</span>
                                                        </li>
                                                        <li>
                                                            <div class=\"rating-stars\">
                                                                <i class=\"fa fa-star\"></i>
                                                                <i class=\"fa fa-star\"></i>
                                                                <i class=\"fa fa-star\"></i>
                                                            </div>
                                                            <div class=\"rating-progress\">
                                                                <div style=\"width: ".($count3*20)."%;\"></div>
                                                            </div>
                                                            <span class=\"sum\">$count3</span>
                                                        </li>
                                                        <li>
                                                            <div class=\"rating-stars\">
                                                                <i class=\"fa fa-star\"></i>
                                                                <i class=\"fa fa-star\"></i>
                                                            </div>
                                                            <div class=\"rating-progress\">
                                                                <div style=\"width: ".($count2*20)."%;\"></div>
                                                            </div>
                                                            <span class=\"sum\">$count2</span>
                                                        </li>
                                                        <li>
                                                            <div class=\"rating-stars\">
                                                                <i class=\"fa fa-star\"></i>
                                                            </div>
                                                            <div class=\"rating-progress\">
                                                                <div style=\"width: ".($count1*20)."%;\"></div>
                                                            </div>
                                                            <span class=\"sum\">$count1</span>
                                                        </li>";
                                                ?>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /Rating -->
                                <!-- Reviews -->
                                <div class="col-md-6">
                                    <div id="reviews">
                                        <ul class="reviews">
                                            <?php
                                                for($i = 0;$i < sizeof($data["eval"]);$i++)
                                                {
                                                    $date = date("F j, Y", strtotime($data["eval"][$i]['EvalTime']));
                                                   echo '
                                                    <li>
                                                        <div class="review-heading">
                                                            <h5 class="name">'.$data["eval"][$i]['FullName'].'</h5>
                                                            <p class="date">'.$date.'</p>
                                                            <div class="review-rating">';
                                                    for($j = 0; $j < $data["eval"][$i]['Rating']; $j++)
                                                    {
                                                        echo '<i class="fa fa-star"></i>';
                                                    }
                                                    echo '</div>
                                                    </div>';
                                                    if($this->isLoggedIn()){
                                                        $User = $_SESSION["account"];
                                                        $obj = json_decode($User,true);
                                                        if($obj["Admin"] == 1){
                                                            echo '
                                                                <div>
                                                                <form action="/Admin/DeleteComment" method="post">
                                                                    <input type="hidden" name="Page" value="'.$data["product"]["Type"].'" />
                                                                    <input type="hidden" name="ProductId" value="'.$data["product"]["ProductId"].'" />
                                                                    <input type="hidden" name="EvalId" value="'.$data["eval"][$i]["EvalId"].'" />
                                                                    <button type="submit" class="primary-btn">Xoá đánh giá</button>
                                                                </form>
                                                                </div>';
                                                        }
                                                    }
                                                    echo '
                                                        <div class="review-body">
                                                            <p>'.$data["eval"][$i]['Comment'].'</p>
                                                        </div>
                                                    </li>';
                                                }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /Reviews -->
                                <!-- Review Form -->
                                <div class="col-md-3">
                                    <div id="review-form">
                                        <form class="review-form text-center" action="/Product/CommentProduct" method="post">
                                            <input class="input" type="text" placeholder="Nhận xét" name="Comment" />
                                            <div class="input-rating">
                                                <span>Xếp hạng: </span>
                                                <div class="review-rating" style="color: red;">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="stars">
                                                    <input id="star5" name="Rating" value="5" type="radio"><label for="star5"></label>
                                                    <input id="star4" name="Rating" value="4" type="radio"><label for="star4"></label>
                                                    <input id="star3" name="Rating" value="3" type="radio"><label for="star3"></label>
                                                    <input id="star2" name="Rating" value="2" type="radio"><label for="star2"></label>
                                                    <input id="star1" name="Rating" value="1" type="radio"><label for="star1"></label>
                                                </div>
                                            </div>
                                            <input type="hidden" name="Page" value="<?=$data["product"]["Type"];?>" />
                                            <input type="hidden" name="ProductId" value="<?=$data["product"]["ProductId"];?>" />
                                            <button type="submit" class="primary-btn">Đánh giá</button>
                                        </form>
                                    </div>
                                </div>
                                <!-- /Review Form -->
                            </div>
                        </div>
                        <!-- /tab2  -->
                    </div>
                    <!-- /product tab content  -->
                </div>
            </div>
            <!-- /product tab -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->