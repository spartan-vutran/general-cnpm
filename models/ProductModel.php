<?php
class ProductModel extends DB{
    function getProduct($type=""){
        // $query = "";
        // $result = "";
        // if($type="smartphone"){
            
        // }
        // else if($type="laptop"){
        //     $query = "SELECT * FROM product";
        // }
        // else if($type="accessory"){
        //     $query = "SELECT * FROM product";
        // }
        // else{
        //     $query = "SELECT * FROM product";
        //     $result = $this->excuteResult($query);
        // }
        $query = "SELECT * FROM product";
        if($type!="") $query = "SELECT * FROM product WHERE Type='$type'" ;
        $result = $this->excuteResult($query);
        return $result;
    }
    function getProductById($id){
        $query = "SELECT * FROM product WHERE ProductId='$id'";
        $result = $this->excuteResult($query,true);
        return $result;
    }
    function getEvalByProductId($id){
        $query = "SELECT * FROM evaluation JOIN customer ON CustomerId = Id WHERE ProductId='$id'";
        $result = $this->excuteResult($query);
        return $result;
    }
    function getDescByProductId($id){
        $query = "SELECT * FROM description WHERE ProductId='$id'";
        $result = $this->excuteResult($query);
        return $result;
    }
    function existCart($customerId){
        $query = "SELECT BillId FROM bill WHERE CustomerId='$customerId' AND PaymentMethod IS NULL";
        $billId = $this->excuteResult($query,true);
        if($billId == 'null') return False;
        else return $billId;
    }
    function existBillProduct($productId,$billId){
        $query = "SELECT * FROM billproduct WHERE BillId='$billId' AND ProductId='$productId'";
        $result = $this->excuteResult($query,true);
        if($result == 'null') return False;
        else return True;
    }
    function addProductToCart($quantity,$productPrice,$billId,$productId) {
        $price = $quantity * $productPrice;
        $query = "UPDATE billproduct SET Quantity = Quantity + $quantity,TotalProductPrice = TotalProductPrice + $price 
                  WHERE BillId = $billId AND ProductId = $productId";
        $query0 = "UPDATE bill SET TotalPrice = TotalPrice + $price WHERE BillId = $billId";
        $this->excute($query);
        $this->excute($query0);
    }
    function addBillProduct($billId,$productId,$productName,$productPrice,$quantity){
        $totalProductPrice = $quantity * $productPrice;
        $query = "INSERT INTO billproduct(BillId,ProductId,ProductName,ProductPrice,Quantity,TotalProductPrice) 
                  VALUES($billId,$productId,'$productName',$productPrice,$quantity,$totalProductPrice)";
        $query0 = "UPDATE bill SET TotalPrice = TotalPrice + $totalProductPrice WHERE BillId = $billId";
        $this->excute($query);
        $this->excute($query0);
    }
    function addBill($customerId,$username){
        $query = "INSERT INTO bill(CustomerId,UserName) VALUES($customerId,'$username');";
        $query0 = "SELECT LAST_INSERT_ID();";
        $this->excute($query);

        return $this->excuteResult($query0,true);
    }
    function insertProduct($Name, $BrandName, $Price, $Type, $ImgUrl, $Rating, $Special, $SellOff, $TimeSellOff, $OldPrice){
        $query = "INSERT INTO product(Name, BrandName, Price, Type, ImgUrl, Rating, Special, SellOff, TimeSellOff, OldPrice) 
        VALUES ('$Name', '$BrandName', '$Price','$Type', '$ImgUrl', '$Rating', '$Special', '$SellOff', '$TimeSellOff', '$OldPrice')";
        $result = $this->excute($query);
        return $result == "true";
    }
    function deleteProduct($id){
        $query = "DELETE FROM product 
        WHERE ProductId = '$id'";
        $result = $this->excute($query);
        return $result == "true";
    }
    function getDetailProduct($productId){
        $query = "SELECT * FROM product
            WHERE ProductId = '$productId'
            ";
            $result = $this->excuteResult($query, true);
            return $result;
    }
    function UpdateProduct($id, $name, $type, $brandName, $price, $special, $sellOff, $imgUrl){
        $query = "UPDATE product
        SET Name='$name', Type='$type', BrandName='$brandName', Price='$price', Special = '$special', SellOff='$sellOff', ImgUrl = '$imgUrl'
        WHere ProductId = '$id'
        ";
        $result = $this->excute($query);
        return $result;
    }

}
?>