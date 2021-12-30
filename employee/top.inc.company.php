<?php
require('connection.inc.php');
require('functions.inc.php');
$username='';
$name='';
$id='';
$USERID=$_SESSION["USERID"];
if(isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN']!=''){

}else{
	header('location:../employee/login/index.php');
	die();
}
if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from admin_users where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$id=$row['id'];
		$name=$row['name'];
		$username=$row['username'];
	}else{
		echo "Hello";
	}
}

?>

		
		