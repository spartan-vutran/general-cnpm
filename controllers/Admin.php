<?php 
class Admin extends Controller{
    private $productModel;
    public $accountModel;
        function __construct()
        {
            $this->accountModel = $this->model("AccountModel");
            $this->productModel = $this->model("ProductModel");
            $this->revenueModel = $this->model("RevenueModel");
            $this->evaluationModel = $this->model("EvaluationModel");
        }
        function Account(){
            if(isset($_POST["UserName"])){
                $name = $this->get_POST('UserName');
                $pass =$this->get_POST('Password');
                $repass = $this->get_POST('RePassword');
                $fullname = $this->get_POST('FullName');
                $email = $this->get_POST('Email');

                $account = [$name, $pass, $fullname, $email];
                $err = "";
                if($pass != $repass){
                    $err= "Mật khẩu không khớp";
                }
                $isSuccess = false;
                if($name && $pass && $fullname && $email && $err ==""){
                    $isSuccess = $this->accountModel->register($name, $pass, $email, 0, $fullname, 1,'2001-02-10', 1, 1);
                }
                if($isSuccess){
                    $this->view("_Admin",[
                        "Page"=>"Admin/Account",
                        "accountlist" =>$this->accountModel->getAllAccount()
                        // "acc" => []
                    ]);
                }else{
                    $this->view("_Admin",[
                        "Page"=>"Admin/Account",
                        "acc" => $account,
                        "err" =>$err,
                        "accountlist" =>$this->accountModel->getAllAccount()
                    ]);
                    die();
                }
            }
            $this->view("_Admin",[
                "Page"=>"Admin/Account",
                "accountlist" =>$this->accountModel->getAllAccount()
            ]);
        }
        function AdminProduct(){
            if(isset($_POST["Name"])){
                $name = $this->get_POST('Name');
                $status =$this->get_POST('Type');
                $producer = $this->get_POST('BrandName');
                $price = $this->get_POST('Price');
                $special = $this->get_POST('Special');
                $imgUrl = $this->get_POST('ImgUrl');
                
                $isSuccess = false;
                if($name && $status && $producer && $price && $special && $imgUrl ){
                    $isSuccess = $this->productModel->insertProduct($name, $producer, $price, $status, $imgUrl, 5, $special, 1, 0, 1000);
                }
                if($isSuccess){
                    $this->view("_Admin",[
                        "Page"=>"Admin/AdminProduct",
                        "productlist" =>$this->productModel->getProduct() 
                    ]);
                }else{
                    $this->view("_Admin",[
                        "Page"=>"Admin/AdminProduct",
                        "productlist" =>$this->productModel->getProduct()
                    ]);
                    die();
                }
            }

            $this->view("_Admin",[
                "Page"=>"Admin/AdminProduct",
                "productlist" =>$this->productModel->getProduct()
            ]);
        }
        function Revenue(){
            // $date = date("Y-m-d H:i:s");
            $date = date("Y-m");
            $bill = [];
            if(isset($_POST['date'])){
                $date = $this->get_POST('date');
            }
            if(isset($_POST['date1']) and isset($_POST['date2'])){
                $date1 = $this->get_POST('date1');
                $date2 = $this->get_POST('date2');
                $bill = $this->revenueModel->getBillBetween($date1, $date2);
            }
            
            $this->view("_Admin",[
                "Page"=>"Admin/Revenue",
                "numberbill" => $this->revenueModel->getNumberBill($date),
                "revenuelist" =>$bill == []? $this->revenueModel->getBill($date) : $bill,
                "totalbill" => $this->revenueModel->getTotalOfMonth($date)

            ]);
        }
        function DeleteProduct(){
            if(isset($_POST["ProductId"])){
                $id = $this->get_POST('ProductId');
            }
            $this->productModel->deleteProduct($id);
            header("Location: /Admin/AdminProduct");
        }
        function DeleteAccount(){
            if(isset($_POST["idAccount"])){
                $id = $this->get_POST('idAccount');
            }
            $this->accountModel->deleteAccount($id);
            header("Location: /Admin/Account");
        }
        function EditAccount($accountId){
            // $result = $this->accountModel->getDetailAccount($accountId);
            // echo $result;
            // die();
            $this->view("_Admin",[
                "Page"=>"Admin/EditAccount",
                "accountdetail" => $this->accountModel->getDetailAccount($accountId)
            ]);
        }
        function UpdateAccount(){
            if(isset($_POST["update"])){
                $id = $this->get_POST('Id');
                $gender = $this->get_POST('Gender');
                $fullName = $this->get_POST('FullName');
                $email = $this->get_POST('Email');
                $admin = $this->get_POST('Admin');
                $phone = $this->get_POST('Phone');
            }
            // echo $id,$userName,$fullName,$email,$admin;
            // die();
            $this->accountModel-> UpdateAccount($id, $gender, $fullName, $email, $admin, $phone);
            header("Location: /Admin/Account");
        }
        function EditProduct($productId){
            $this->view("_Admin",[
                "Page"=>"Admin/EditProduct",
                "productdetail" => $this->productModel->getDetailProduct($productId)
            ]);
        }
        function UpdateProduct(){
            if(isset($_POST["Name"])){
                $id = $this->get_POST('Id');
                $name = $this->get_POST('Name');
                $type =$this->get_POST('Type');
                $brandName = $this->get_POST('BrandName');
                $price = $this->get_POST('Price');
                $special = $this->get_POST('Special');
                $sellOff = $this->get_POST('SellOff');
                $imgUrl = $this->get_POST('ImgUrl');

                $this->productModel->UpdateProduct($id, $name, $type, $brandName, $price, $special, $sellOff, $imgUrl);
            }
            // // echo $id,$userName,$fullName,$email,$admin;
            // // die();
            // $this->accountModel-> UpdateAccount($id, $gender, $fullName, $email, $admin, $phone);
           
            header("Location: /Admin/AdminProduct");
        }
        function DeleteComment(){
            if(isset($_POST["ProductId"])){
                $productId = $this->get_POST('ProductId');
                $evalId = $this->get_POST('EvalId');
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
                // echo $productId, " ", $evalId," ", $page;
                $this->evaluationModel->deleteEvalution($evalId);
            }
            header("Location: /Product/$page/$productId");

        }
    }
?>