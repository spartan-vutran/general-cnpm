<?php
class PaymentModel extends DB{
    function GetPaymentHistory($id){
        $query = " SELECT * 
        FROM bill 
        WHERE CustomerId = '$id' AND PaymentMethod is not null AND PaymentMethod != ''
        ORDER BY DateCreateBill DESC
        ";
        $result = $this->excuteResult($query);
        return $result;
    }
    function GetPayment($id){
        $query = "SELECT * FROM bill
                Where CustomerId= '$id' and (PaymentMethod is null or PaymentMethod='')";
        $result = $this->excuteResult($query, true, false);
        if($result!=null)
            $result['DateCreateBill'] = date("Y-m-d H:i");
        // $result['DateCreateBill'] = new DateTime("now", new DateTimeZone('UTC'));
 
        return json_encode($result);
    }
    function GetPaymentDetail($billId){
        $query = "SELECT * FROM billproduct
        join product on billproduct.ProductId = product.ProductId
        Where BillId = '$billId'";
        $result = $this->excuteResult($query);
        return $result;
    }
    function GetBillNoPayMent(int $userId){
        $query = "SELECT * From bill
                Where CustomerId = '$userId' and PaymentMethod is null";
        $result = $this->excuteResult($query, true);
        return $result;
    }
    function GetListProductOfBillNoPayMent(int $billId){
        $query = "SELECT * 
                From billproduct join product on billproduct.ProductId = product.ProductId
                where billproduct.BillId = '$billId'
        ";
        $result = $this->excuteResult($query);
        return $result;
    }
    function UpdateBillAndBillDetailById($billId, $productId, $quantity){
        $query1 = "SELECT * FROM billproduct
        WHERE BillId = '$billId' and ProductId= '$productId'
        ";
        $query2 = "SELECT * FROM bill
        WHERE BillId = '$billId'
        ";
        $temp1 = $this->excuteResult($query1,true, false);
        $temp2 = $this->excuteResult($query2,true, false);
        if($temp1!= null)
            {
                $beforeQuantity = $temp1['Quantity'];
                if($quantity == 0){
                    //delete product in bill
                    // decrease total price($beforeQuantity)*price
                    $sql1 = "DELETE FROM billproduct 
                    WHERE BillId = '$billId' and ProductId = '$productId'
                    ";
                    $subprice = $temp2['TotalPrice'] - $beforeQuantity * $temp1['ProductPrice'];
                    $sql2 = "UPDATE bill
                    SET TotalPrice = '$subprice'
                    WHERE BillId = '$billId' 
                    ";
                    $result1 = $this->excute($sql1);
                    $result2 = $this->excute($sql2);
                    return $result1 and $result2;
                    
                }
                else if($quantity < $beforeQuantity){
                    // update quantity in bill equal quantity input
                    // decrease total producr (($beforeQuantity - $quantity)* price
                    // decrease total price ($beforeQuantity - $quantity)
                    $subprice = ($beforeQuantity - $quantity)* $temp1['ProductPrice'];
                    $aftertotal = $temp1['TotalProductPrice'] - $subprice;
                    $sql1 = "UPDATE billproduct
                    SET Quantity = '$quantity', TotalProductPrice = '$aftertotal'
                    Where BillId = '$billId' and ProductId = '$productId'
                    ";
                    $result1 = $this->excute($sql1);
                    $aftertotal = $temp2['TotalPrice'] - $subprice;
                    $sql2 = "UPDATE bill
                    SET TotalPrice = '$aftertotal'
                    Where BillId = '$billId'
                    ";
                    $result2 = $this->excute($sql2);
                    return $result1 and $result2;
                }
                else if($quantity > $beforeQuantity){
                    // update quantity in bill equal quantity input
                    // decrease total producr (($beforeQuantity - $quantity)* price
                    // decrease total price ($beforeQuantity - $quantity)* price
                    $subprice = ($quantity - $beforeQuantity)* $temp1['ProductPrice'];
                    $aftertotal = $temp1['TotalProductPrice'] + $subprice;
                    $sql1 = "UPDATE billproduct
                    SET Quantity = '$quantity', TotalProductPrice = '$aftertotal'
                    Where BillId = '$billId' and ProductId = '$productId'
                    ";
                    $result1 = $this->excute($sql1);
                    $aftertotal = $temp2['TotalPrice'] + $subprice;
                    $sql2 = "UPDATE bill
                    SET TotalPrice = '$aftertotal'
                    Where BillId = '$billId'
                    ";
                    $result2 = $this->excute($sql2);
                    return $result1 and $result2;
                }
            }
    }
    function UpdateAddressOfBill($billId, $Name,$Hamlet, $Village, $District, $Province, $Telephone){
        $query = "UPDATE bill
        SET UserName='$Name', Thon='$Hamlet', Xa='$Village', Huyen='$District', Tinh='$Province', PhoneNumber='$Telephone'
        WHere BillId = '$billId'
        ";
        $result = $this->excute($query);
        return $result;
    }
    function UpdatepaymentMethodOfBill($billId, $paymentMethod, $datepayment){
        $query = "UPDATE bill
        SET PaymentMethod = '$paymentMethod', DateCreateBill = '$datepayment'
        WHere BillId = '$billId'
        ";
        $result = $this->excute($query);
        return $result;
    }
}
?>