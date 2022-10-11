<?php

trait tool {
    // fix cau truy van sql
    function fixSQLRef($sql) {
        $sql = str_replace('\\', '\\\\', $sql);
        $sql = str_replace('\'', '\\\'', $sql);
        return $sql;
    }
    // lay gia tri cua key
    public function get_GET($key) {
        $value = null;
        if(isset($_GET[$key])) {
            $value = $_GET[$key];
            $value = $this->fixSQLRef($value);
        }
        return trim($value);
    }
    public function get_POST($key) {
        $value = null;
        if(isset($_POST[$key])) {
            $value = $_POST[$key];
            $value = $this->fixSQLRef($value);
        }
        return trim($value);
    }
    public function get_REQUEST($key) {
        $value = null;
        if(isset($_REQUEST[$key])) {
            $value = $_REQUEST[$key];
            $value = $this->fixSQLRef($value);
        }
        return trim($value);
    }
    public function get_COOKIE($key) {
        $value = null;
        if(isset($_COOKIE[$key])) {
            $value = $_COOKIE[$key];
            $value = $this->fixSQLRef($value);
        }
        return trim($value);
    }
    public function getScurityHash($pwd) {
        return password_hash($pwd, PASSWORD_DEFAULT);
    }
    public function getScurityMD5($pwd) {
        return md5($pwd.'skfgvnvgkdcgJKGVmvjkGKkjkgjjhvh');
    }
    
    public function moveFile($key, $folder = "", $rootPath = "./mvc/views/") {
        if(!isset($_FILES[$key]) || !isset($_FILES[$key]['name']) || $_FILES[$key]['name'] == '') {
            return '';
        }

        $pathTemp = $_FILES[$key]["tmp_name"];

        $filename = $_FILES[$key]['name'];
        //filename -> remove special character, ..., ...

        $newPath="assets/thumbnail/".$folder.$filename;

        move_uploaded_file($pathTemp, $rootPath.$newPath);

        $rootPath = str_replace('./', '/', $rootPath);
        
        return DOMAIN.$rootPath.$newPath;
    }

    public function isLoggedIn() {
        if(isset($_SESSION["login"]))
            return $_SESSION["login"];
        return false;
    }
}
?>