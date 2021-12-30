<?php

require('connection.inc.php');
require('functions.inc.php');
if(isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN']!=''){

}else{
	header('location:login.php');
	die();
}
$id='';
$formdate='';
$tilldate='';
$purpose='';
$numberofdays='';
$msg='';
if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from leaveapplications where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$id=$row['id'];
		$formdate=$row['formdate'];
		$tilldate=$row['tilldate'];
		$purpose=$row['purpose'];
		$numberofdays=$row['numberofdays'];
	}else{
		header('location:employeeLeaveApplication.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$formdate=get_safe_value($con,$_POST['formdate']);
	$tilldate=get_safe_value($con,$_POST['tilldate']);
	$purpose=get_safe_value($con,$_POST['purpose']);
	$numberofdays=get_safe_value($con,$_POST['numberofdays']);
	$res=mysqli_query($con,"select * from leaveapplications where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="leaveapplication already exist";
			}
		}else{
			$msg="leaveapplication already exist";
		}
	}
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			mysqli_query($con,"update leaveapplications set formdate='$formdate',tilldate='$tilldate',purpose='$purpose',numberofdays='$numberofdays' where id='$id'");
		}else{
			mysqli_query($con,"insert into leaveapplications(formdate,tilldate,purpose,numberofdays) values('$formdate','$tilldate','$purpose','$numberofdays')");
		}
		header('location:employeeLeaveApplication.php');
		die();
	}
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>LeaveApplication</strong><small> Form</small></div>
                        <form method="post">
							<div class="card-body card-block">
								<div class="form-group">
									<label for="categories" class=" form-control-label">Form Date</label>
									<input type="date" name="formdate"  class="form-control" required value="<?php echo $formdate?>">
								</div>
								<div class="form-group">
									<label for="categories" class=" form-control-label">Till Date</label>
									<input type="date" name="tilldate"  class="form-control" required value="<?php echo $tilldate?>">
								</div>
								<div class="form-group">
									<label for="categories" class=" form-control-label">Purpose</label>
									<input type="text" name="purpose" placeholder="Entre the Purpose" class="form-control" required value="<?php echo $purpose?>">
								</div>
								<div class="form-group">
									<label for="categories" class=" form-control-label">Number of days</label>
									<input type="text" name="numberofdays" placeholder="Enter Number of days" class="form-control" required value="<?php echo $numberofdays?>">
								</div>
								
							   <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
							   </button>
							   <div class="field_error"><?php echo $msg?></div>
							</div>
						</form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
<?php
require('footer.inc.php');
?>