<body onload="startCountdown(100000)">
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Khuyến mãi</h3>
                </div>
            </div>
            <!-- shop -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
						<!-- tab -->
						<div id="tab1" class="tab-pane active">
							<div class="products-slick" data-nav="#slick-nav-1">
                                <?php 
                                $listproduct = json_decode($data["productModel"], true);
                                $output = '';
                                foreach ($listproduct as $item)
                                {
                                    if ($item["Special"] == "khuyenmai")
                                    {
                                        $output .='<form action="/Product/AddCart" method="post" onsubmit="notify()">
                                                        <input type="hidden" name="ProductId" value="'.$item["ProductId"].'" />
                                                        <input type="hidden" name="Quantity" value="1" />
                                                        <input type="hidden" name="Name" value="'.$item["Name"].'" />
                                                        <input type="hidden" name="ProductPrice" value="'.$item["Price"].'" />
                                                            <div class="product">
                                                                <div class="product-img">
                                                                    <img src="'.$item["ImgUrl"].'" alt="">
                                                                    <div class="product-label">
                                                                        <span class="sale">-'.$item["SellOff"].'%</span>
                                                                    </div>
                                                                </div>
                                                                <div class="product-body">
                                                                    <p class="product-category">'.$item["BrandName"].'</p>
                                                                    <h3 class="product-name"><a href="">'.$item["Name"].'</a></h3>
                                                                    <h4 class="product-price price">'.$item["Price"].'</h4><del class="product-old-price price">'.$item["OldPrice"].'</del>
                                                                    <div class="product-rating">';
                                                                    $star ="";
                                                                    for ($i = 0; $i < $item["Rating"]; $i++)
                                                                    {
                                                                        $star.='<i class="fa fa-star"></i>'.'  ';
                                                                    }
                                                                    $output.= $star;
                                                                    $output.='
                                                                    </div>
                                                                </div>
                                                                <div class="add-to-cart">
                                                                    <button class="add-to-cart-btn" type="submit">
                                                                        <i class="fa fa-shopping-cart"></i> add to cart
                                                                    </button>
                                                                </div>
                                                            </div>
                                                    </form>';
                                    }
                                }
                                echo $output;
                                ?>
                            </div>
                            <div id="slick-nav-1" class="products-slick-nav"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /shop -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
<!-- HOT DEAL SECTION -->

<!-- /HOT DEAL SECTION -->
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Sản phẩm mới</h3>
                </div>
            </div>
            <!-- shop -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
						<!-- tab -->
						<div id="tab1" class="tab-pane active">
							<div class="products-slick" data-nav="#slick-nav-2">
                            <?php 
                                $listproduct = json_decode($data["productModel"], true);
                                $output = '';
                                foreach ($listproduct as $item)
                                {
                                    if ($item['Special'] == "moi")
                                    {
                                        $output.='
                                            <form action="/Product/AddCart" method="post" onsubmit="notify()">
                                                <input type="hidden" name="ProductId" value="'.$item["ProductId"].'" />
                                                <input type="hidden" name="Quantity" value="1" />
                                                <input type="hidden" name="Name" value="'.$item["Name"].'" />
                                                <input type="hidden" name="ProductPrice" value="'.$item["Price"].'" />                                                <div class="product">
                                                        <div class="product-img">
                                                            <img src="'.$item["ImgUrl"].'" alt="">
                                                        </div>
                                                        <div class="product-body">
                                                            <p class="product-category">'.$item["BrandName"].'</p>
                                                            <h3 class="product-name"><a href="">'.$item["Name"].'</a></h3>
                                                            <h4 class="product-price price">'.$item["Price"].'</h4>
                                                            <div class="product-rating">';
                                                                $star = "";
                                                                for ($i = 0; $i < $item["Rating"]; $i++)
                                                                {
                                                                    $star.='<i class="fa fa-star"></i>'.' ';
                                                                }
                                                            $output.=$star;
                                                            $output.='
                                                            </div>
                                                        </div>
                                                        <div class="add-to-cart">
                                                            <button class="add-to-cart-btn" type="submit">
                                                                <i class="fa fa-shopping-cart"></i> add to cart
                                                            </button>
                                                        </div>
                                                    </div>
                                            </form>';
                                    }
                                }
                                echo $output;
                                ?>
                            </div>
                            <div id="slick-nav-2" class="products-slick-nav"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /shop -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Bán chạy nhất</h3>
                </div>
            </div>
            <!-- /section title -->
            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
						<!-- tab -->
						<div id="tab1" class="tab-pane active">
							<div class="products-slick" data-nav="#slick-nav-3">
                            <?php 
                                $listproduct = json_decode($data["productModel"], true);
                                $output = '';
                                foreach ($listproduct as $item)
                                {
                                    if ($item['Special'] == "banchay")
                                    {
                                        $output.='
                                            <form action="/Product/AddCart" method="post" onsubmit="notify()">
                                                <input type="hidden" name="ProductId" value="'.$item["ProductId"].'" />
                                                <input type="hidden" name="Quantity" value="1" />
                                                <input type="hidden" name="Name" value="'.$item["Name"].'" />
                                                <input type="hidden" name="ProductPrice" value="'.$item["Price"].'" />
                                                    <div class="product">
                                                        <div class="product-img">
                                                            <img src="'.$item["ImgUrl"].'" alt="">
                                                        </div>
                                                        <div class="product-body">
                                                            <p class="product-category">'.$item["BrandName"].'</p>
                                                            <h3 class="product-name"><a href="">'.$item["Name"].'</a></h3>
                                                            <h4 class="product-price price">'.$item["Price"].'</h4>
                                                            <div class="product-rating">';
                                                            $star = "";
                                                            for ($i = 0; $i < $item["Rating"]; $i++)
                                                            {
                                                                $star.='<i class="fa fa-star"></i>'.' ';
                                                            }
                                                            $output.=$star;
                                                            $output.='
                                                            </div>
                                                        </div>
                                                        <div class="add-to-cart">
                                                            <button class="add-to-cart-btn" type="submit">
                                                                <i class="fa fa-shopping-cart"></i> add to cart
                                                            </button>
                                                        </div>
                                                    </div>
                                            </form>';
                                    }
                                }
                                echo $output;
                            ?>
                            </div>
                            <div id="slick-nav-3" class="products-slick-nav"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
</body>
<script type="text/javascript">
    function startCountdown(timeLeft) {
        var interval = setInterval( countdown, 1000 );
        update();

        function countdown() {
            if ( --timeLeft > 0 ) {
                update();
            } else {
                clearInterval( interval );
                update();
                completed();
            }
        }

        function update() {
            days   = Math.floor( timeLeft / 86400 );
            hours   = Math.floor( timeLeft / 3600 );
            minutes = Math.floor( ( timeLeft % 3600 ) / 60 );
            seconds = timeLeft % 60;

            document.getElementById('ngay').innerHTML = days;
            document.getElementById('gio').innerHTML = hours;
            document.getElementById('phut').innerHTML = minutes;
            document.getElementById('giay').innerHTML = seconds;

        }

        function completed() {
            // Do whatever you need to do when the timer runs out...
        }
    }
    function notify(){
        return confirm("Bạn muốn thêm vào giỏ hàng?!!!");
    }
</script>