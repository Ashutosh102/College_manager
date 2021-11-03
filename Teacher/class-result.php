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
if (isset($_POST['sub'])) {
	$count=$_POST['count'];
	for ($i=0; $i < $count; $i++) {  
		$date=date("d-m-y");
		$que="insert into class_result(roll_no,course_code,subject_code,semester,total_marks,obtain_marks,result_date)values('".$_POST['roll_no'][$i]."','".$_POST['course_code'][$i]."','".$_POST['subject_code'][$i]."','".$_POST['semester'][$i]."','".$_POST['total_marks'][$i]."','".$_POST['obtain_marks'][$i]."','$date')";
	$run=mysqli_query($con,$que);
	if ($run) {
			echo "Insert Successfully";
		}	
		else{
			echo " Insert Not Successfully";
		}
	}
}
?>

<!doctype html>
<html lang="en">
	<head>
		<title>Class - Result</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
		<?php include('../common/teacher-sidebar.php') ?>  

		<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 main-background mb-2 w-100">
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4 class="">Add Class Result</h4>
				</div>
				<div class="row">
					<div class="col-md-12">
						<form action="class-result.php" method="post">
							<div class="row mt-3">
								<div class="col-md-4">
									<div class="form-group" style="z-index: 10;">
										<label>Enter Class Id:</label>
										<select class="browser-default custom-select" name="course_code">
											<option >Select Course</option>
											<?php
											$teacher_id=$_SESSION['teacher_id'];
											$query="select distinct(course_code) from teacher_courses where teacher_id='$teacher_id'";
											$run=mysqli_query($con,$query);
											while($row=mysqli_fetch_array($run)) {
											echo	"<option value=".$row['course_code'].">".$row['course_code']."</option>";
											}
										?>
									</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Enter Semester:</label>
										<input type="text" class="form-control" name="semester" placeholder="Enter Semester">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Enter Subject:</label>
										<select class="browser-default custom-select" name="subject_code" required="" >
											<option>Select Subject</option>
											<?php
											$teacher_id=$_SESSION['teacher_id'];
											$query="select distinct(subject_code) from teacher_courses where teacher_id='$teacher_id'";
											$run=mysqli_query($con,$query);
											while($row=mysqli_fetch_array($run)) {
											echo	"<option value=".$row['subject_code'].">".$row['subject_code']."</option>";
											}
										?>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<input type="submit" name="submit" class="btn btn-primary" value="Press">
								</div>
							</div>	
						</form>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 ml-2">
						<section class="mt-3">
							<table class="w-100 table-elements mb-5 table-three-tr"cellpadding="5" >
								<tr class="table-tr-head text-white table-three">
									<th>Sr.No</th>
									<th>Roll No</th>
									<th>Cource Name</th>
									<th>Subject Name</th>
									<th>Semester</th>
									<th>Student Name</th>
									<th>Total Marks</th>
									<th>Obtain Marks</th>
								</tr>
								<?php  
								$i=1;
								$count=0;
									if (isset($_POST['submit'])) {
										$course_code=$_POST['course_code'];
										$semester=$_POST['semester'];
										$subject_code=$_POST['subject_code'];


										$que="select student_info.roll_no,first_name,middle_name,last_name,student_courses.semester,student_courses.course_code,subject_code from student_courses inner join student_info on student_info.roll_no=student_courses.roll_no where student_courses.course_code='$course_code' and student_courses.semester='$semester' and student_courses.subject_code='$subject_code'";
									$run=mysqli_query($con,$que);
									while ($row=mysqli_fetch_array($run)) {
										$count++;
									?>
										<form action="class-result.php" method="post">
										<tr>
											<td><?php echo $i++ ?></td>
											<td><?php echo $row['roll_no'] ?></td>
											<input type="hidden" name="roll_no[]" value=<?php echo $row['roll_no'] ?> >
											<td><?php echo $row['course_code'] ?></td>
											<input type="hidden" name="course_code[]" value=<?php echo $row['course_code'] ?> >
											<td><?php echo $row['subject_code'] ?></td>
											<input type="hidden" name="subject_code[]" value=<?php echo $row['subject_code'] ?> >
											<td><?php echo $row['semester'] ?></td>
											<input type="hidden" name="semester[]" value=<?php echo $row['semester'] ?> >
											<td><?php echo $row['first_name']." ".$row['middle_name']." ".$row['last_name'] ?></td>
											<td class="text-center"><?php echo "100" ?></td>
											<input type="hidden" name="total_marks[]" value="100" >
											<td><input type="text" name="obtain_marks[]" placeholder="Plz Enter Obtain Marks" class="form-control"></td>
											<input type="hidden" name="count" value="<?php echo $count ?>">
											
										</tr>
										
								<?php		
									}
									}
								?>
								<input type="submit" name="sub">

								</form>
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

