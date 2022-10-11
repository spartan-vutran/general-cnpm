<?php
session_start();
define('Domain', 'http://localhost/TechShop');

require_once "./core/tool.php";
require_once "./core/App.php";
require_once "./core/Controller.php";
require_once "./core/DB.php";
$myApp = new App();
?>