<?php
require('connection.inc.php');
require('functions.inc.php');
if(isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN']!=''){

}else{
	header('location:../admin/login/index.php');
	die();
}

?>

<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Stone Crusher</title>

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
	<link rel="stylesheet" type="text/css" href="d/src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="d/src/plugins/datatables/css/responsive.bootstrap4.min.css">
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
<body>
	<div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="d/vendors/images/log2.png" alt=""></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div>

	<div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
			<div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
			<div class="header-search">
				<form>
					<div class="form-group mb-0">
						<i class="dw dw-search2 search-icon"></i>
						<input type="text" class="form-control search-input" placeholder="Search Here">
						<div class="dropdown">
							<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
								<i class="ion-arrow-down-c"></i>
							</a>

						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="header-right">
			<div class="dashboard-setting user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
						<i class="dw dw-settings2"></i>
					</a>
				</div>
			</div>

			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<i class="icon-copy fa fa-user-circle" aria-hidden="true"></i>
						</span>
						<span class="user-name">ADMIN</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a class="dropdown-item" href="contact-us.php"><i class="dw dw-help"></i> Help</a>
						<a class="dropdown-item" href="logout.php"><i class="dw dw-logout"></i> Log Out</a>
					</div>
				</div>
			</div>
			<div class="github-link">
				<a href="https://github.com/dropways/deskapp" target="_blank"><img src="d/vendors/images/github.svg" alt=""></a>
			</div>
		</div>
	</div>

	<div class="right-sidebar">
		<div class="sidebar-title">
			<h3 class="weight-600 font-16 text-blue">
				Layout Settings
				<span class="btn-block font-weight-400 font-12">User Interface Settings</span>
			</h3>
			<div class="close-sidebar" data-toggle="right-sidebar-close">
				<i class="icon-copy ion-close-round"></i>
			</div>
		</div>
		<div class="right-sidebar-body customscroll">
			<div class="right-sidebar-body-content">
				<h4 class="weight-600 font-18 pb-10">Header Background</h4>
				<div class="sidebar-btn-group pb-30 mb-10">
					<a href="javascript:void(0);" class="btn btn-outline-primary header-white active">White</a>
					<a href="javascript:void(0);" class="btn btn-outline-primary header-dark">Dark</a>
				</div>

				<h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
				<div class="sidebar-btn-group pb-30 mb-10">
					<a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light ">White</a>
					<a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Dark</a>
				</div>

				<h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
				<div class="sidebar-radio-group pb-10 mb-10">
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-1" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-1" checked="">
						<label class="custom-control-label" for="sidebaricon-1"><i class="fa fa-angle-down"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-2" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-2">
						<label class="custom-control-label" for="sidebaricon-2"><i class="ion-plus-round"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-3" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-3">
						<label class="custom-control-label" for="sidebaricon-3"><i class="fa fa-angle-double-right"></i></label>
					</div>
				</div>

				<h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
				<div class="sidebar-radio-group pb-30 mb-10">
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-1" name="menu-list-icon" class="custom-control-input" value="icon-list-style-1" checked="">
						<label class="custom-control-label" for="sidebariconlist-1"><i class="ion-minus-round"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-2" name="menu-list-icon" class="custom-control-input" value="icon-list-style-2">
						<label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o" aria-hidden="true"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-3" name="menu-list-icon" class="custom-control-input" value="icon-list-style-3">
						<label class="custom-control-label" for="sidebariconlist-3"><i class="dw dw-check"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-4" name="menu-list-icon" class="custom-control-input" value="icon-list-style-4" checked="">
						<label class="custom-control-label" for="sidebariconlist-4"><i class="icon-copy dw dw-next-2"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-5" name="menu-list-icon" class="custom-control-input" value="icon-list-style-5">
						<label class="custom-control-label" for="sidebariconlist-5"><i class="dw dw-fast-forward-1"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-6" name="menu-list-icon" class="custom-control-input" value="icon-list-style-6">
						<label class="custom-control-label" for="sidebariconlist-6"><i class="dw dw-next"></i></label>
					</div>
				</div>

				<div class="reset-options pt-30 text-center">
					<button class="btn btn-danger" id="reset-settings">Reset Settings</button>
				</div>
			</div>
		</div>
	</div>

	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="index.php">
				<img src="d/vendors/images/log1.png" alt="" class="dark-logo">
				<img src="d/vendors/images/log1.png" alt="" class="light-logo">
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">

										<li>
						<a href="index.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house-1"></span><span class="mtext">HOME</span>
						</a>
					</li>
					<li>
						<a href="companies.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-apartment"></span><span class="mtext">COMPANY DETAIL</span>
						</a>
					</li>
					<li>
						<a href="plant.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-copy"></span><span class="mtext">PLANT</span>
						</a>
					</li>
					<li>
						<a href="machine.php?id=1" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-diagram"></span><span class="mtext">MACHINES</span>
						</a>
					</li>
					<li>
						<a href="department.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-library"></span><span class="mtext">DEPARTMENTS</span>
						</a>
					</li>
					<li>
						<a href="employee1.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-list3"></span><span class="mtext">EMPLOYEES</span>
						</a>
					</li>
					<li>
						<a href="registered.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-edit-1"></span><span class="mtext">NEW REGISTRATION</span>
						</a>
					</li>
					<li>
						<a href="adminLeaveApplications.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-invoice"></span><span class="mtext">LEAVE APPLICATIONS</span>
						</a>
					</li>					
					<li>
						<a href="contact-us.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-paper-plane1"></span><span class="mtext">CONTACT US</span>
						</a>
					</li>
					<li>
						<a href="about-us.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-browser2"></span><span class="mtext">ABOUT US</span>
						</a>
					</li>
					
				</ul>
			</div>
		</div>
	</div>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center">
					<div class="col-md-4">
						<img src="d/vendors/images/banner-img.png" alt="">
					</div>
					<div class="col-md-8">
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							Welcome To <div class="weight-600 font-30 text-blue">R D Mining</div>
						</h4>
						<p class="font-18 max-width-600">RD group of Companies is one of the oldest and most innovative solution provider for all your crushing and screening needs, be it Aggregates, Iron-ore, Limestone, manganese, Gabbro, Sandstone or any type of rock, we have a solution for it.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0">Over 5500</div>
								<div class="weight-600 font-14">Contacts</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart2"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0">400</div>
								<div class="weight-600 font-14">Deals</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart3"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0">35</div>
								<div class="weight-600 font-14">Plants</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart4"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0">$60B</div>
								<div class="weight-600 font-14">Worth</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="card-box mb-30">
				<h2 class="h4 pd-20">OUR MACHINES</h2>
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					  <ol class="carousel-indicators">
						<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					  </ol>
					  <div class="carousel-inner">
						<div class="carousel-item active">
						  <img class="d-block w-100" src="d/src/images/placeholder.jpg" alt="First slide">
						 <div class="carousel-caption d-none d-md-block">
						  <h3 class="text-primary">Portable Stone Crusher Machine</h3>
					             </div>
						</div>
						<div class="carousel-item">
						  <img class="d-block w-100" src="d/src/images/placeholder-2.jpg" alt="Second slide">
							 <div class="carousel-caption d-none d-md-block">
						  <h3 class="text-primary">Roljack Mobile Stone Crusher</h3>

						</div>
						</div>
						<div class="carousel-item">
						  <img class="d-block w-100" src="d/src/images/placeholder-3.jpg" alt="Third slide">
							 <div class="carousel-caption d-none d-md-block">
						  <h3  class="text-primary">KIC Stone Crusher</h3>

						</div>
						</div>
					  </div>
					  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					  </a>
					  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					  </a>
					</div>
			</div>
			
			<div class="footer-wrap pd-20 mb-20 card-box">
				DESIGNED BY STUDENTS OF BVB MCA <i class="icon-copy fa fa-copyright" aria-hidden="true">2021</i><br>
											<a href="https://en-gb.facebook.com/saquib.khazi/about" target="_blank">SAQUIB</a><br>
											<a href="https://www.facebook.com/bgujamagadi" target="_blank">BHARAT</a><br>
											<a href="https://sv-se.facebook.com/roselink.immanuel" target="_blank">ROSELIN</a>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="d/vendors/scripts/core.js"></script>
	<script src="d/vendors/scripts/script.min.js"></script>
	<script src="d/vendors/scripts/process.js"></script>
	<script src="d/vendors/scripts/layout-settings.js"></script>
	<script src="d/src/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="d/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="d/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="d/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="d/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<script src="d/vendors/scripts/dashboard.js"></script>
</body>
</html>