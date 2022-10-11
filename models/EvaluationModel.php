<?php
class EvaluationModel extends DB{
    function insertEvaluation($productId, $customerId, $rating, $comment, $evalTime){
        $query = "INSERT INTO evaluation(ProductId, CustomerId, Rating, Comment, EvalTime) 
        VALUES ('$productId', '$customerId', '$rating', '$comment','$evalTime')";
        $result = $this->excute($query);
        return $result == "true";
    }
    function deleteEvalution($id){
        $query = "DELETE FROM evaluation 
        WHERE EvalId = '$id'";
        $result = $this->excute($query);
        return $result == "true";
    }
}
?>