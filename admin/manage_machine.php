<?php
require('connection.inc.php');
require('functions.inc.php');
if(isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN']!=''){

}else{
	header('location:../admin/login/index.php');
	die();
}
$name='';
$code='';
$description='';
$image='';
$deploymentdate='';
$model='';
$capacity='';
$make='';
$status='';
$plant_id='';
$msg='';
$image_required='required';
if(isset($_GET['id']) && $_GET['id']!=''){
	$image_required='';
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from machines where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$name=$row['name'];
		$code=$row['code'];
		$description=$row['description'];
		$deploymentdate=$row['deploymentdate'];
		$model=$row['model'];
		$capacity=$row['capacity'];
		$make=$row['make'];
		$status=$row['status'];
		$plant_id=$row['plant_id'];
	}
	else{
		$id=$_SESSION["machine_id"];
		header('location:machine.php?id="1"');
		die();
	}
}

if(isset($_POST['submit'])){
	
	$name=get_safe_value($con,$_POST['name']);
	$code=get_safe_value($con,$_POST['code']);
	$description=get_safe_value($con,$_POST['description']);
	$deploymentdate=get_safe_value($con,$_POST['deploymentdate']);
	$model=get_safe_value($con,$_POST['model']);
	$capacity=get_safe_value($con,$_POST['capacity']);
	$make=get_safe_value($con,$_POST['make']);
	$status=get_safe_value($con,$_POST['status']);
	$plant_id=get_safe_value($con,$_POST['plant_id']);
	
	$res=mysqli_query($con,"select * from machines where name='$name'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="Machine already exist";
			}
		}
		else{
			$msg="Machine already exist";
		}
	}
	
	if($_GET['id']==0){
		if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
			$msg="Please select only png,jpg and jpeg image formate";
		}
	}else{
		if($_FILES['image']['type']!=''){
				if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
				$msg="Please select only png,jpg and jpeg image formate";
			}
		}
	}
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			if($_FILES['image']['name']!=''){
				$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'],'../media/machine/'.$image);
				$update_sql="update machines set name='$name',code='$code',description='$description',deploymentdate='$deploymentdate',model='$model',capacity='$capacity',make='$make',status='$status',plant_id='$plant_id',image='$image' where id='$id'";
			}else{
				$update_sql="update machines set name='$name',code='$code',description='$description',deploymentdate='$deploymentdate',model='$model',capacity='$capacity',make='$make',status='$status',plant_id='$plant_id',image='$image' where id='$id'";
			}
			mysqli_query($con,$update_sql);
		}
		else
		{
			$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'],'../media/machine/'.$image);
			mysqli_query($con,"insert into machines (name,code,description,deploymentdate,model,capacity,make,status,plant_id,image)values('$name','$code','$description','$deploymentdate','$model','$capacity','$make','$status','$plant_id','$image')");
		}
		$id=$_SESSION["machine_id"];
		header("location:machine.php?id=1");
		die();
	}
}
	

?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Machine</strong><small> Form</small></div>
                        <form method="post" enctype="multipart/form-data">
							<div class="card-body card-block">
							   
								<div class="form-group">
									<label for="categories" class=" form-control-label">Machine Name</label>
									<input type="text" name="name" placeholder="Enter machine name" class="form-control" required value="<?php echo $name?>">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Machine Code</label>
									<input type="text" name="code" placeholder="Enter machine Code" class="form-control" required value="<?php echo $code?>">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Description</label>
									<input type="text" name="description" placeholder="Description" class="form-control" required value="<?php echo $description?>">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Machine Image</label>
									<input type="file" name="image"  class="form-control" value="<?php echo  $image?>">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Deploymentdate</label>
									<input type="date" name="deploymentdate" placeholder="Deploymentdate" class="form-control" required value="<?php echo $deploymentdate?>"></input>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Machine Model</label>
									<input type="text" name="model" placeholder="Enter machine Model" class="form-control" required value="<?php echo $model?>"></input>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Machine capacity</label>
									<input type="text" name="capacity" placeholder="Enter machine capacity" class="form-control" required value="<?php echo $capacity?>"></input>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Machine make</label>
									<input type="text" name="make" placeholder="Enter machine make" class="form-control" required value="<?php echo $make?>"></input>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Machine status</label>
									<input type="text" name="status" placeholder="Enter machine status" class="form-control" required value="<?php echo $status?>"></input>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Plants</label>
									<select class="form-control" name="plant_id">
										<option>Select Plant</option>
										<?php
										$res=mysqli_query($con,"select id,name from plants");
										while($row=mysqli_fetch_assoc($res)){
											if($row['id']==$plant_id){
												echo "<option selected value=".$row['id'].">".$row['name']."</option>";
											}else{
												echo "<option value=".$row['id'].">".$row['name']."</option>";
											}
											
										}
										?>
									</select>
								</div>
								
								
							   <button name="submit" type="submit" class="btn btn-lg btn-info btn-block">
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
         
<?php
require('footer.inc.php');
?>