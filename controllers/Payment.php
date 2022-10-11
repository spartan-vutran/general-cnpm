<?php 
class Payment extends Controller{
    private $homeModel;
        function __construct()
        {
            $this->homeModel = $this->model("AccountModel");
            $this->paymentModel = $this->model("PaymentModel");
        }
        function index(){
            if(!$this->isLoggedIn()){
                header("Location: /Home/Login");
                die();
            }
            $User = $_SESSION["account"];
            $obj = json_decode($User,true);
            $bill = $this->paymentModel->GetBillNoPayMent($obj['Id']);
            $bill_decode = json_decode($bill,true);

            if(isset($_POST['Type']))
             {
                $typ = $this->get_POST('Type');
                $idProduct = $this->get_POST('ProductId');
                $total = $this->get_POST('TotalProductPrice');
                $quantity = $this->get_POST('Quantity');
                $billId = $this->get_POST('BillId');
                $result =  false;
                $Name='';$Hamlet='';$Village='';$District='';$Province='';$Telephone='';
                if($typ == 'p' and $bill!= "null"){
                    $Name = $this->get_POST('Name');
                    $Hamlet = $this->get_POST('Hamlet');
                    $Village = $this->get_POST('Village');
                    $District = $this->get_POST('District');
                    $Province = $this->get_POST('Province');
                    $Telephone =  $this->get_POST('Telephone');
                    $result = $this->paymentModel->UpdateAddressOfBill($bill_decode['BillId'], $Name,$Hamlet, $Village, $District, $Province, $Telephone);
                    header("Location: /Payment/PaymentMethod");
                    // die();
                }
                else if($typ == '+')
                {
                    $result= $this->paymentModel->UpdateBillAndBillDetailById($billId, $idProduct, $quantity+1);
                }
                else if($typ == '-'){
                    $result= $this->paymentModel->UpdateBillAndBillDetailById($billId, $idProduct, $quantity-1);
                }
                else if($typ == 'q'){
                    $result= $this->paymentModel->UpdateBillAndBillDetailById($billId, $idProduct, $quantity);
                }
                else if($typ == 'd'){
                    $result= $this->paymentModel->UpdateBillAndBillDetailById($billId, $idProduct, 0);
                }
             }
            $bill = $this->paymentModel->GetBillNoPayMent($obj['Id']);
            $this->view("_Layout",[
                "Page"=>"PayMent/Payment",
                "cart" =>$bill == "null"? $bill : $this->paymentModel->GetListProductOfBillNoPayMent($bill_decode['BillId']),
                "bill" =>$bill
            ]);
        }
        function PaymentDetailHistory($billId){
            $result = $this->paymentModel->GetPaymentDetail($billId);
            // var_dump($result);
            // die();
            $this->view("_Layout",[
                "Page"=>"PayMent/PaymentDetailHistory",
                "billDetail" =>$this->paymentModel->GetPaymentDetail($billId)
            ]);
        }
        function PaymentHistory(){
            if(!$this->isLoggedIn()){
                header("Location: /Home/Login");
            }else{
                $User = $_SESSION["account"];
                $obj = json_decode($User,true);
            
            $this->view("_Layout",[
                "Page"=>"PayMent/PaymentHistory",
                "listbill" => $this->paymentModel->GetPaymentHistory($obj['Id'])
               
            ]);
            }
        }
        function PaymentMethod(){
            if(!$this->isLoggedIn()){
                header("Location: /Home/Login");
            }else{
            $User = $_SESSION["account"];
            $obj = json_decode($User,true);
            $bill = $this->paymentModel->GetBillNoPayMent($obj['Id']);
            $bill_decode = json_decode($bill,true);

            if(isset($_POST['PaymentMethod']) and $bill!="null"){
                $paymentmethod= $this->get_POST('PaymentMethod');
                $datepayment= date("Y-m-d H:i");
                $this->paymentModel->UpdatepaymentMethodOfBill($bill_decode['BillId'], $paymentmethod, $datepayment);
                header("Location: /Payment/PaymentHistory");

            }
            $this->view("PayMent/PaymentMethod",[
                "bill"=>$this->paymentModel->GetPayment($obj['Id'])
            ]);
            }
        }
        function Payment(){
            if(!$this->isLoggedIn()){
                header("Location: /Home/Login");
                die();
            }
            $User = $_SESSION["account"];
            $obj = json_decode($User,true);
            $bill = $this->paymentModel->GetBillNoPayMent($obj['Id']);
            $bill_decode = json_decode($bill,true);

            if(isset($_POST['Type']))
             {
                $typ = $this->get_POST('Type');
                $result =  false;
                $Name='';$Hamlet='';$Village='';$District='';$Province='';$Telephone='';
                if($typ == 'p' && $bill!= "null" && isset($_POST['Name'])){
                    $Name = $this->get_POST('Name');
                    $Hamlet = $this->get_POST('Hamlet');
                    $Village = $this->get_POST('Village');
                    $District = $this->get_POST('District');
                    $Province = $this->get_POST('Province');
                    $Telephone =  $this->get_POST('Telephone');
                    $result = $this->paymentModel->UpdateAddressOfBill($bill_decode['BillId'], $Name,$Hamlet, $Village, $District, $Province, $Telephone);
                    header("Location: /Payment/PaymentMethod");
                    die();
                }
                else{
                    $idProduct = $this->get_POST('ProductId');
                    $total = $this->get_POST('TotalProductPrice');
                    $quantity = $this->get_POST('Quantity');
                    $billId = $this->get_POST('BillId');
                    if($typ == '+')
                    {
                        $result= $this->paymentModel->UpdateBillAndBillDetailById($billId, $idProduct, $quantity+1);
                    }
                    else if($typ == '-'){
                        $result= $this->paymentModel->UpdateBillAndBillDetailById($billId, $idProduct, $quantity-1);
                    }
                    else if($typ == 'q'){
                        $result= $this->paymentModel->UpdateBillAndBillDetailById($billId, $idProduct, $quantity);
                    }
                    else if($typ == 'd'){
                        $result= $this->paymentModel->UpdateBillAndBillDetailById($billId, $idProduct, 0);
                    }
                }
             }
            $bill = $this->paymentModel->GetBillNoPayMent($obj['Id']);
            $this->view("_Layout",[
                "Page"=>"PayMent/Payment",
                "cart" =>$bill == "null"? $bill : $this->paymentModel->GetListProductOfBillNoPayMent($bill_decode['BillId']),
                "bill" =>$bill
            ]);
        }
    }
?>