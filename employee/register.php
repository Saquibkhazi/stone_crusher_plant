<?php
require('connection.inc.php');
require('functions.inc.php');
$name='';
$address='';
$gender='';
$dob='';
$city='';
$state='';
$country='';
$mobile='';
$email='';
$adhaar='';
$username='';
$password='';
$msg='';;

if(isset($_POST['submit'])){
	$name=get_safe_value($con,$_POST['name']);
	$gender=get_safe_value($con,$_POST['maleRadio']);
	$address=get_safe_value($con,$_POST['address']);
	$dob=get_safe_value($con,$_POST['dob']);
	$mobile=get_safe_value($con,$_POST['mobile']);
	$adhaar=get_safe_value($con,$_POST['adhaar']);
	$email=get_safe_value($con,$_POST['email']);
	$city=get_safe_value($con,$_POST['city']);
	$state=get_safe_value($con,$_POST['state']);
	$country=get_safe_value($con,$_POST['country']);
	$username=get_safe_value($con,$_POST['username']);
	$password=get_safe_value($con,$_POST['password']);
	
	mysqli_query($con,"insert into employees(name,gender,address,dob,mobile,adhaar,email,city,state,country)values('$name','$gender','$address','$dob','$mobile','$adhaar','$email','$city','$state','$country')");
    mysqli_query($con,"insert into admin_users(name,username,password)values('$name','$username','$password')");	
	header('location:login.php');
	die();
}
?>
<!DOCTYPE html>
<html>

<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Stone Crusher Employee Register</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="d/vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="d/vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="d/vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="d/vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="d/vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="d/src/plugins/jquery-steps/jquery.steps.css">
	<link rel="stylesheet" type="text/css" href="d/vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>

<body class="login-page">
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="login.html">
					<img src="d/vendors/images/log1.png" alt="">
				</a>
			</div>
			<div class="login-menu">
				<ul>
					<li><a href="login.php">Login</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="register-page-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="d/vendors/images/register-page-img.png" alt="">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="register-box bg-white box-shadow border-radius-10">
						
							<form class=" " method="POST">
								
								
									<div class="form-wrap max-width-600 mx-auto">
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Full Name</label>
											<div class="col-sm-8">
												<input type="text" name="name" placeholder="ENTER NAME" class="form-control">
											</div>
										</div>
										<div class="form-group row align-items-center">
											<label class="col-sm-4 col-form-label">Gender</label>
											<div class="col-sm-8">
												<div class="custom-control custom-radio custom-control-inline pb-0">
													<input type="radio" id="male" name="gender" class="custom-control-input">
													<label class="custom-control-label" for="male">Male</label>
												</div>
												<div class="custom-control custom-radio custom-control-inline pb-0">
													<input type="radio" id="female" name="gender" class="custom-control-input">
													<label class="custom-control-label" for="female">Female</label>
												</div>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Date Of Birth</label>
											<div class="col-sm-8">
												<input type="date" name="dob" placeholder="Enter DOB" class="form-control">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Phone Number</label>
											<div class="col-sm-8">
												<input type="text" name="mobile" placeholder="Enter phone" class="form-control">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Adhaar Number</label>
											<div class="col-sm-8">
												<input type="text" name="adhaar" placeholder="Enter Adhaar" class="form-control">
											</div>
										</div>
										<div class="form-group row align-items-center">
											<label class="col-sm-4 col-form-label">Address</label>
											<div class="col-sm-8">
												<input type="text" name="address" placeholder="Enter Address" class="form-control">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">City</label>
											<div class="col-sm-8">
												<input type="text" name="city" placeholder="Enter City" class="form-control">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">State</label>
											<div class="col-sm-8">
												<input type="text" name="state" placeholder="Enter State" class="form-control">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Country</label>
											<div class="col-sm-8">
												<input type="text" name="country" placeholder="Enter Country" class="form-control">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Email Address*</label>
											<div class="col-sm-8">
												<input type="email" name="email" placeholder="Enter Email" class="form-control">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Username*</label>
											<div class="col-sm-8">
												<input type="text" name="username" placeholder="Enter Username" class="form-control" >
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Password*</label>
											<div class="col-sm-8">
												<input type="password" name="password" placeholder="Enter Password" class="form-control">
											</div>
										</div>
										<div class="custom-control custom-checkbox mt-4">
											<input type="checkbox" class="custom-control-input" id="customCheck1">
											<label class="custom-control-label" for="customCheck1">I have read and agreed to the terms of services and privacy policy</label>
										</div>
									</div>
									<br>
									<button  name="submit" type="submit" class="btn btn-outline-primary btn-block">SUBMIT </button>
									
								
							
							
								
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- success Popup html Start -->
	<button type="button" id="success-modal-btn" hidden data-toggle="modal" data-target="#success-modal" data-backdrop="static">Launch modal</button>
	<div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered max-width-400" role="document">
			<div class="modal-content">
				<div class="modal-body text-center font-18">
					<h3 class="mb-20">Form Submitted!</h3>
					<div class="mb-30 text-center"><img src="d/vendors/images/success.png"></div>
					THANK YOU FOR BEING OUR EMPLOYEE
				</div>
				<div class="modal-footer justify-content-center">
					   <button  name="submit" type="submit" class="btn btn-primary"><a href="login.php">Done</a> </button>
				</div>
			</div>
		</div>
	</div>
	<!-- success Popup html End -->
	<!-- js -->
	<script src="d/vendors/scripts/core.js"></script>
	<script src="d/vendors/scripts/script.min.js"></script>
	<script src="d/vendors/scripts/process.js"></script>
	<script src="d/vendors/scripts/layout-settings.js"></script>
	<script src="d/src/plugins/jquery-steps/jquery.steps.js"></script>
	<script src="d/vendors/scripts/steps-setting.js"></script>
</body>

</html>