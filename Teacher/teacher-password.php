 <!---------------- Session starts form here ----------------------->
 <?php  
	session_start();
	if (!$_SESSION["LoginTeacher"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
	?>
<!---------------- Session Ends form here ------------------------>

<?php 
	if (isset($_POST['submit'])) {
		$user_id=$_SESSION['LoginTeacher'];
		$password=$_POST['password'];
		$query="UPDATE login set Password='$password' where user_id='$user_id'";
		$run=mysqli_query($con,$query);
		if ($run) {  ?>
 			<script type="text/javascript">
 				alert("Your Password Has Been Changed");
 			</script>
 		<?php }
 		else { ?>
 			<script type="text/javascript">
 				alert("Your Password Has Not Been Changed");
 			</script>
		<?php }
	}
	
?>

<!doctype html>
<html lang="en">
	<head>
		<title>Teacher - Password</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
		<?php include('../common/teacher-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 main-background mb-2 w-100">
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4 class="">Update Your Password</h4>
				</div>
				<div class="container pt-5">
					<div class="row">
						<div class="col-md-12">
							<form action="teacher-password.php" method="post">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Enter New Password</label>
											<input type="text" name="password" class="form-control" placeholder="Enter New Password">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group pt-4 pl-5">
											<input type="submit" name="submit" value="Change Password" class="btn btn-primary">
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</main>
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>
