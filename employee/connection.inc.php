<?php
if(!isset($_SESSION)){
	session_start();
}

$con=mysqli_connect("localhost","root");

mysqli_select_db($con,'test');

//define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/php/stone/');
//define('SITE_PATH','http://127.0.0.1/php/stone/');

//define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'media/product/');
//define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'media/product/');
?>