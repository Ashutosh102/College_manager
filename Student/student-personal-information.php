 <!---------------- Session starts form here ----------------------->
 <?php  
	session_start();
	if (!$_SESSION["LoginStudent"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
	?>
<!---------------- Session Ends form here ------------------------>>


<?php

    $roll_no=$_SESSION['LoginStudent'];

	if (isset($_POST['sub'])) {

		$first_name=$_POST['first_name'];

		$middle_name=$_POST['middle_name'];

		$last_name=$_POST['last_name'];

		$father_name=$_POST['father_name'];

		$cnic=$_POST['cnic'];

		$mobile_no=$_POST['mobile_no'];

		$gender=$_POST['gender'];

		$semester=$_POST['semester'];

		$total_marks=$_POST['total_marks'];

		$obtain_marks=$_POST['obtain_marks'];

		$current_address=$_POST['current_address'];

		$permanent_address=$_POST['permanent_address'];

		$state=$_POST['state'];

		$place_of_birth=$_POST['place_of_birth'];

		$query="update student_info set first_name='$first_name',middle_name='$middle_name',last_name='$last_name',father_name='$father_name',cnic='$cnic',mobile_no='$mobile_no',gender='$gender',semester='$semester',total_marks='$total_marks',obtain_marks='$obtain_marks',current_address='$current_address',permanent_address='$permanent_address',state='$state',place_of_birth='$place_of_birth' where roll_no='$roll_no'";
		$run=mysqli_query($con,$query);
		if ($run) {  ?>
 			<script type="text/javascript">
 				alert("Student data has been updated");
 			</script>
 		<?php }
 		else { ?>
 			<script type="text/javascript">
 				alert("Student data has not been updated due to some errors");
 			</script>
 		<?php }


	}
?>


<!doctype html>
<html lang="en">
	<head>
		<title>Student Personal Information</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
		<?php include('../common/student-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 w-100">
			<div class="sub-main sub-main-student">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4 class="">Update Your Personal Information </h4>
				</div>
				<div class="row ml-4">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<form action="student-personal-information.php" method="post">
							<?php $roll_no=$_SESSION['LoginStudent'];
								$query="select * from student_info where roll_no='$roll_no'";
								$run=mysqli_query($con,$query);
								while ($row=mysqli_fetch_array($run)) {?>
							<div class="row">
								<div class=" col-lg-6 col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputEmail1">First Name:*</label>
										<input type="text" class="form-control" name="first_name" value=<?php echo $row['first_name'] ?>>
									</div>
								</div>
								<div class="col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputPassword1">Middle Name:*</label>
										<input type="text" class="form-control" name="middle_name"  value="<?php echo $row['middle_name'] ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputEmail1">Last Name:*</label>
										<input type="text" class="form-control" name="last_name" value=<?php echo $row['last_name'] ?>>
									</div>
								</div>
								<div class="col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputPassword1">Father Name:*</label>
										<input type="text" class="form-control" name="father_name"  value=<?php echo $row['father_name'] ?>>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputEmail1">CNIC:*</label>
										<input type="text" class="form-control" name="cnic" value=<?php echo $row['cnic'] ?>>
									</div>
								</div>
								<div class="col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputPassword1">Mobile:*</label>
										<input type="number" class="form-control" name="mobile_no"  value=<?php echo $row['mobile_no'] ?>>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputEmail1">Gender</label>
										<input type="text" class="form-control" name="gender" value=<?php echo $row['gender'] ?>>
									</div>
								</div>
								<div class="col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputPassword1">Semester</label>
										<input type="number" name="semester" class="form-control"  placeholder="Semester" value=<?php echo $row['semester'] ?>>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputEmail1">Total Marks (InterMediate/HSSC/Equiv Marks):*</label>
										<input type="number" name="total_marks" class="form-control" placeholder="Marks" value=<?php echo $row['total_marks'] ?>>
									</div>
								</div>
								<div class="col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputPassword1">Obtain Marks (InterMediate/HSSC/Equiv Marks):*</label>
										<input type="number" name="obtain_marks" class="form-control"  placeholder="Marks" value=<?php echo $row['obtain_marks'] ?>>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputEmail1">Current Address:*</label>
										<input type="text" name="current_address" class="form-control" value=<?php echo $row['current_address'] ?>>
									</div>
								</div>
								<div class="col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputPassword1">Permanent Address:*</label>
										<input type="text" name="permanent_address" class="form-control"  value=<?php echo $row['permanent_address'] ?>>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputEmail1">State Or Province: *</label>
										<input type="text" name="state" class="form-control" placeholder="State Province" value=<?php echo $row['state'] ?>>
									</div>
								</div>
								<div class="col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputPassword1">Place of Birth:*</label>
										<input type="text" name="place_of_birth" class="form-control"  value=<?php echo $row['place_of_birth'] ?>>
									</div>
								</div>
							</div>
							<?php } ?>
							<div class="row mt-3">
								<div class="col-lg-6 col-md-6 offset-4">
									<input type="submit" name="sub" type="submit" class="btn btn-primary" value="Update Information">
								</div>
							</div>
						</form>
					</div>
				</div>	
			</div>
		</main>
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>