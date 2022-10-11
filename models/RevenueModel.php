<?php
class RevenueModel extends DB{
    function getBill($date){
        $query = "SELECT * FROM bill
        WHERE DateCreateBill LIKE '$date%' and PaymentMethod is not null
        ";
        $result = $this->excuteResult($query);
        return $result;
    }
    function getNumberBill($date){
        $query = "SELECT Count(*) as numofbill FROM bill
        WHERE DateCreateBill LIKE '$date%' and PaymentMethod is not null
        ";
        $result = $this->excuteResult($query);
        return $result;
    }
    function getTotalOfMonth($date){
        $query = "SELECT SUM(TotalPrice) as Total FROM bill
        WHERE DateCreateBill LIKE '$date%' and PaymentMethod is not null
        ";
        $result = $this->excuteResult($query);
        return $result;
    }
    function getBillBetween($date1, $date2){
        $time = strtotime($date1. '-7 hours');
        $date1 = date("Y-m-d H:i:s", $time);  
        $time2 = strtotime($date2. '+17 hours');
        $date3 = date("Y-m-d H:i:s", $time2);
        $query = "SELECT * FROM bill
        WHERE DateCreateBill >='$date1%' and DateCreateBill<= '$date3%' and PaymentMethod is not null
        ";
        $result = $this->excuteResult($query);
        return $result;
    }
}
?>