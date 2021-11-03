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


<!doctype html>
<html lang="en">
	<head>
		<title>Teacher - Courses</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
		<?php include('../common/teacher-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 main-background mb-2 w-100">
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4 class="">Teacher Courses Information</h4>
				</div>
				<div class="row">
					<div class="col-md-12">
						<section class="border mt-3">
							<table border="1" class="w-100 table-striped table-dark"cellpadding="5" >
								<tr>
									<th>Sr.No</th>
									<th>Course Name</th>
									<th>Subject Name</th>
									<th>Room No</th>
									<th>Semester</th>
									<th>Time</th>
									<th>Total Classes</th>
								</tr>
								<?php
								$sr_no=1;
								$teacher_email=$_SESSION['LoginTeacher'];
								$query1="select * from teacher_info where email='$teacher_email'";
								$run1=$run=mysqli_query($con,$query1);
								while($row=mysqli_fetch_array($run1)) {
									$teacher_id=$row["teacher_id"];
								}
								$query="select tc.teacher_id,tc.course_code,tc.subject_code,tc.semester,tc.total_classes,tt.room_no,tt.timing_to from teacher_courses tc inner join time_table tt on tc.subject_code=tt.subject_code where teacher_id='$teacher_id'";
								$run=mysqli_query($con,$query);
								while($row=mysqli_fetch_array($run)) {
									echo "<tr>";
									echo "<td>".$sr_no++ ."</td>";
									echo "<td>".$row["course_code"]."</td>";
									echo "<td>".$row["subject_code"]."</td>";
									echo "<td>".$row["room_no"]."</td>";
									echo "<td>".$row["semester"]."</td>";
									echo "<td>".$row["timing_to"]."</td>";
									echo "<td>".$row["total_classes"]."</td>";
									echo "</tr>";
								}
								$_SESSION['teacher_id']=$teacher_id;
								?>
							</table>				
						</section>
					</div>
				</div>
			</div>
		</main>
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>