<?php
    class Home extends Controller{
        private $productModel;
        private $accountModel;

        function __construct()
        {
            $this->accountModel = $this->model("AccountModel");
            $this->productModel = $this->model("ProductModel");
        }
        function index(){
            // if($this->isLoggedIn()) {
            //     $this->view("_Layout",[
            //         "Page"=>"Home/index",
            //         "homeModel" => $this->homeModel->getProduct()
            //     ]);
            // } else {
            //     $this->view("Home/Login",[
                    
            //     ]);
            // }
            // $data = $this->productModel->getProduct();
            // var_dump($data);
            // die();
            $this->view("_Layout",[
                "Page"=>"Home/index",
                "productModel" => $this->productModel->getProduct()
            ]);
        }
        function Login(){
            if(isset($_POST['UserName']) &&  isset($_POST['Password'])) {
                $name = $this->get_POST('UserName');
                $pass = $this->get_POST('Password');
                $result = $this->accountModel->login($name, $pass);
                if($result){
                    header("Location: /Home/index");
                }
                $this->view("Home/Login",[

                ]);
            }
            else{
                $this->view("Home/Login",[

                ]);
            }
        }
        
        function Register(){
            if(isset($_POST['UserName'])) {
                $name = $this->get_POST('UserName');
                $pass =$this->get_POST('Password');
                $repass = $this->get_POST('RePassword');
                $fullname = $this->get_POST('FullName');
                $phonenumber = $this->get_POST('PhoneNumber');
                $email = $this->get_POST('Email');
                $birthday = $this->get_POST('Birthday');
                $gender = $this->get_POST('Gender');

                $account = [$name, $pass, $fullname, $phonenumber, $email, $birthday, $gender];
                $err = "";

                if($pass != $repass)
                {
                    $err = "Mật khẩu không khớp";
                }
                $issuccess = false;
                if($name && $pass && $fullname && $phonenumber && $email && $birthday && $gender) {
                    $issuccess = $this->accountModel->register($name, $pass, $email, $phonenumber, $fullname, $gender, $birthday, 1, 0);
                }
                if($issuccess){
                    header('Location: /Home/Login');
                    die();
                }
                else{
                    $this->view("Home/Register",[
                        "err" => $err,
                        "acc" =>$account
                    ]);
                    // die();
                }
            }
            else{
                $this->view("Home/Register",[
                    "err" => "",
                ]);
            }
        }
        function Logout(){
            $this->accountModel->logout();
            header("Location: /Home/Login");
        }
        function Introduce(){
            $this->view("Home/introduce",[
            ]);
        }
        function Contact(){
            $this->view("Home/contact",[
            ]);
        }
    }
?>