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
	header('location:index.php');
	die();
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Registration</strong><small> Form</small></div>
                        <form method="post" enctype="multipart/form-data">
							<div class="card-body card-block">
							   
								<div class="form-group">
									<label for="categories" class=" form-control-label">Name</label>
									<input type="text" name="name" placeholder="Enter name" class="form-control">
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Gender</label>
									<input type="text" name="gender" placeholder="Enter gender" class="form-control">
								</div>

								<div class="form-group">
									<label for="categories" class=" form-control-label">Date of Birth</label>
									<input type="date" name="dob" placeholder="Enter DOB" class="form-control">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Phone number</label>
									<input type="text" name="mobile" placeholder="Enter phone" class="form-control">
								</div>
								<div class="form-group">
									<label for="categories" class=" form-control-label">ADDRESS</label>
									<input type="text" name="address" placeholder="Enter address" class="form-control">
								</div>
								<div class="form-group">
									<label for="categories" class=" form-control-label">Adhar Number</label>
									<input type="text" name="adhaar" placeholder="Enter adhaar" class="form-control">
								</div>
								<div class="form-group">
									<label for="categories" class=" form-control-label">Email</label>
									<input type="text" name="email" placeholder="Enter email" class="form-control">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">CITY</label>
									<input type="text" name="city" placeholder="Enter city" class="form-control">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">STATE</label>
									<input type="text" name="state" placeholder="Enter state" class="form-control">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">COUNTRY</label>
									<input type="text" name="country" placeholder="Enter country" class="form-control">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Username</label>
									<input type="text" name="username" placeholder="Enter username" class="form-control" >
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Password</label>
									<input type="text" name="password" placeholder="Enter password" class="form-control">
								</div>
							   <button  name="submit" type="submit" class="btn btn-lg btn-info btn-block">
							   <span>Submit</span>
							   </button>
							   <div class="field_error"><?php echo $msg?></div>
							</div>
						</form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
