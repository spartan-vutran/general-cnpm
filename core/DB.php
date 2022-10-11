<?php

class DB{

    public $con;
    public $error;
    //use when deploy
    protected $servername = "mysql_techshop";
    protected $username = "root";
    protected $password = "123";
    protected $dbname = "techshop";

    function __construct(){
        $this->con = mysqli_connect($this->servername, $this->username, $this->password);
        if(!$this->con){
			$this->error = "Connection failed".mysqli_connect_error();
			return false;
		}
        mysqli_select_db($this->con, $this->dbname);
        mysqli_query($this->con, "SET NAMES 'utf8'");
    }
    // insert, delete, update
    public function excute($sql) {
        $result = false;
        if(mysqli_query($this->con, $sql)) {
            $result = true;
        }
        return json_encode($result);
    }
    
    // SELECT lay du lieu
    public function excuteResult($sql, $isSingle = false, $isJson = true) {
        $result = mysqli_query($this->con, $sql);
        if($isSingle) {
            $data = mysqli_fetch_array($result, 1);
        }
        else {
            $data = [];
            while ( ($row = mysqli_fetch_array($result, 1)) != null ) {
                $data[] = $row;
            }
        }
        if($isJson) {
            return json_encode($data);
        }
        return $data;
    }
}

?>