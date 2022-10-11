<?php 
class Product extends Controller{
    private $productModel;
        function __construct()
        {
            $this->productModel = $this->model("ProductModel");
            $this->evaluationModel = $this->model("EvaluationModel");
        }
        function AddCart(){
            if(!$this->isLoggedIn()){
                header("Location: /Home/Login");
            }
            else{
                $productId = $_POST["ProductId"];
                $quantity = $_POST["Quantity"];
                $productName = $_POST["Name"];
                $productPrice = $_POST["ProductPrice"];
                $user = json_decode($_SESSION["account"],true);
                // echo $user["Id"];
                $billId = json_decode($this->productModel->existCart($user["Id"]),true);
                if($billId != False){
                    if($this->productModel->existBillProduct($productId,$billId["BillId"])){
                        $this->productModel->addProductToCart($quantity,$productPrice,$billId["BillId"],$productId);
                    }
                    else{
                        $this->productModel->addBillProduct($billId["BillId"],$productId,$productName,$productPrice,$quantity);
                    }
                }
                else{
                    $newBillId = json_decode($this->productModel->addBill($user["Id"],$user["UserName"]),true);
                    $this->productModel->addBillProduct($newBillId["LAST_INSERT_ID()"],$productId,$productName,$productPrice,$quantity);
                }
                header("Location: /Payment/Payment");
            }
        }
        function Accessory($productId=""){
            if($productId == ""){
                $accessoryArr = [];
                if(isset($_POST["Category"])){
                    $category = $_POST["Category"];
                    $deviceArr = json_decode($this->productModel->getProduct("accessory"),true);
                    for($i = 0;$i < sizeof($deviceArr);$i++){
                        for($j = 0;$j < sizeof($category);$j++){
                            if($deviceArr[$i]["BrandName"] == $category[$j]){
                                $accessoryArr[] = $deviceArr[$i];
                                break;
                            }
                        }
                    }
                }
                else{
                    $accessoryArr = json_decode($this->productModel->getProduct("accessory"),true);
                }

                $limit = 6;
                $totalPage = ceil(sizeof($accessoryArr)/$limit);
                if($totalPage == 0) {
                    $totalPage = 1;
                }
                $currentPage = 1;
                if(isset($_POST["CurrentPage"])){
                    $currentPage = $_POST["CurrentPage"];
                }
                if($currentPage > $totalPage){
                    $currentPage = $totalPage;
                }
                else if($currentPage < 1){
                    $currentPage = 1;
                }
                $start = ($currentPage - 1) * $limit;
                $this->view("_Layout",[
                    "Page"=>"Product/Accessory",
                    "accessory" => $accessoryArr,
                    "CurrentPage" => $currentPage,
                    "Start" => $start,
                    "Limit" => $limit,
                    "TotalPage" => $totalPage
                ]);
            }
            else{
                // echo $this->productModel->getEvalByProductId($productId);
                // die();
                $this->view("_Layout",[
                    "Page"=>"Product/Product",
                    "product" => json_decode($this->productModel->getProductById($productId),true),
                    "eval" => json_decode($this->productModel->getEvalByProductId($productId),true),
                    "desc" => json_decode($this->productModel->getDescByProductId($productId),true)
                ]);
            }
        }
        function Laptop($productId = ""){
            if($productId == ""){
                $laptopArr = [];
                if(isset($_POST["Category"])){
                    $category = $_POST["Category"];
                    $deviceArr = json_decode($this->productModel->getProduct("laptop"),true);
                    for($i = 0;$i < sizeof($deviceArr);$i++){
                        for($j = 0;$j < sizeof($category);$j++){
                            if($deviceArr[$i]["BrandName"] == $category[$j]){
                                $laptopArr[] = $deviceArr[$i];
                                break;
                            }
                        }
                    }
                }
                else{
                    $laptopArr = json_decode($this->productModel->getProduct("laptop"),true);
                }
                $limit = 6;
                $totalPage = ceil(sizeof($laptopArr)/$limit);
                if($totalPage == 0) {
                    $totalPage = 1;
                }
                $currentPage = 1;
                if(isset($_POST["CurrentPage"])){
                    $currentPage = $_POST["CurrentPage"];
                }
                if($currentPage > $totalPage){
                    $currentPage = $totalPage;
                }
                else if($currentPage < 1){
                    $currentPage = 1;
                }
                $start = ($currentPage - 1) * $limit;
                $this->view("_Layout",[
                    "Page"=>"Product/Laptop",
                    "laptop" => $laptopArr,
                    "CurrentPage" => $currentPage,
                    "Start" => $start,
                    "Limit" => $limit,
                    "TotalPage" => $totalPage
                ]);
            }
            else{
                $this->view("_Layout",[
                    "Page"=>"Product/Product",
                    "product" => json_decode($this->productModel->getProductById($productId),true),
                    "eval" => json_decode($this->productModel->getEvalByProductId($productId),true),
                    "desc" => json_decode($this->productModel->getDescByProductId($productId),true)
                ]);
            }
            
        }
        function Product($productId){
            $this->view("_Layout",[
                "Page"=>"Product/Product",
                // "productModel" => json_decode($this->productModel->getProductById($productId),true)
                "product" => json_decode($this->productModel->getProductById($productId),true),
                "eval" => json_decode($this->productModel->getEvalByProductId($productId),true),
                "desc" => json_decode($this->productModel->getDescByProductId($productId),true)
            ]);
        }
        function Smart($productId = ""){
            if($productId == ""){
                $phoneArr = [];
                if(isset($_POST["Category"])){
                    $category = $_POST["Category"];
                    $deviceArr = json_decode($this->productModel->getProduct("smartphone"),true);
                    for($i = 0;$i < sizeof($deviceArr);$i++){
                        for($j = 0;$j < sizeof($category);$j++){
                            if($deviceArr[$i]["BrandName"] == $category[$j]){
                                $phoneArr[] = $deviceArr[$i];
                                break;
                            }
                        }
                    }
                }
                else{
                    $phoneArr = json_decode($this->productModel->getProduct("smartphone"),true);
                }
                $limit = 6;
                $totalPage = ceil(sizeof($phoneArr)/$limit);
                if($totalPage == 0) {
                    $totalPage = 1;
                }
                $currentPage = 1;
                if(isset($_POST["CurrentPage"])){
                    $currentPage = $_POST["CurrentPage"];
                }
                if($currentPage > $totalPage){
                    $currentPage = $totalPage;
                }
                else if($currentPage < 1){
                    $currentPage = 1;
                }
                $start = ($currentPage - 1) * $limit;
                $this->view("_Layout",[
                    "Page"=>"Product/Smart",
                    "smartphone" => $phoneArr,
                    "CurrentPage" => $currentPage,
                    "Start" => $start,
                    "Limit" => $limit,
                    "TotalPage" => $totalPage
                ]);
            }
            else{
                $this->view("_Layout",[
                    "Page"=>"Product/Product",
                    "product" => json_decode($this->productModel->getProductById($productId),true),
                    "eval" => json_decode($this->productModel->getEvalByProductId($productId),true),
                    "desc" => json_decode($this->productModel->getDescByProductId($productId),true)
                ]);
            }
        }
        function CommentProduct(){
            if(!$this->isLoggedIn()){
                header("Location: /Home/Login");
            }
            if(isset($_POST["Comment"])){
                $productId = $this->get_POST('ProductId');
                $comment = $this->get_POST('Comment');
                $rating =$this->get_POST('Rating');
                $page =$this->get_POST('Page');
                if($page == "laptop"){
                    $page = "Laptop";
                }
                elseif($page == "smartphone"){
                    $page = "Smart";
                }
                elseif($page == "accessory"){
                    $page = "Accessory";
                }
                $evalTime = date("Y-m-d H:i:s");
                $User = $_SESSION["account"];
                $obj = json_decode($User,true);
                $customerId = $obj['Id'];
                $this->evaluationModel->insertEvaluation($productId, $customerId, $rating, $comment, $evalTime);
                // echo $this->productModel->getEvalByProductId($productId);
                // die();
            }
            header("Location: $page/$productId");
        }
}
?>