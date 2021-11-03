<<!---------------- Session starts form here ----------------------->
<?php  
	session_start();
	if (!$_SESSION["LoginAdmin"])
	{
		header('location:../login/login.php');
	}
        require_once "../connection/connection.php";
	?>
<!---------------- Session Ends form here ------------------------>

<?php
	$message = "";
	$success_message = "";
	$error_message = "";
	if (isset($_POST['sub'])) {
		$count=$_POST['count'];
		for ($i=0; $i < $count; $i++) { 
			$date=date("d-m-y");
			$que="insert into class_result(roll_no,course_code,subject_code,semester,total_marks,obtain_marks,result_date)values('".$_POST['roll_no'][$i]."','".$_POST['course_code'][$i]."','".$_POST['subject_code'][$i]."','".$_POST['semester'][$i]."','".$_POST['total_marks'][$i]."','".$_POST['obtain_marks'][$i]."','$date')";
			$run=mysqli_query($con,$que);
			if ($run) {
				$success_message = "All Results Has Been Submitted Successfully";
			}	
			else{
				$error_message = "All Results Has Not Been Submitted Successfully";
			}
		}
	}

?>


	<!-- title of this page -->
		<title>Admin - Class Result</title>
		

		<?php include('../common/common-header.php') ?>
		<?php include('../common/admin-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="bar-margin text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4>Result Management System </h4>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-12">
							<?php
								if($success_message==true){
									$bg_color = "alert-success";
									$message = $success_message;
								}
								else if($error_message==true){
									$bg_color = "alert-danger";	
									$message = $error_message;
								}
							?>
							<h5 class="py-2 pl-3 <?php echo $bg_color; ?>">
								
								<?php echo $message ?>
							</h5>
						</div>
						<form action="add-single-student-results.php" method="post">
							<div class="row mt-3">
								<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputEmail1">Select Course:</label>
										<select class="browser-default custom-select" name="course_code">
											<option >Select Semester</option>
											<?php
											$query="select distinct(course_code) as course_code from course_subjects";
											$run=mysqli_query($con,$query);
											while($row=mysqli_fetch_array($run)) {
											echo	"<option value=".$row['course_code'].">".$row['course_code']."</option>";
											}
											?>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Enter Student ID:</label>
										<input type="text" name="roll_no" class="form-control" placeholder="Enter ID">
									</div>
								</div>
								<div class="col-md-4">
									<input type="submit" name="submit" class="btn btn-primary px-5" value="Press">
								</div>
							</div>	
						</form>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 ml-2">
						<section class="border mt-3">
							<table class="w-100 table-elements table-three-tr" cellpadding="3">
								<tr class="table-tr-head table-three text-white">
									<th>Sr.No</th>
                                    <th>Roll No</th>
                                    <th>Student Name</th>
									<th>Subject Code</th>
									<th>Semester</th>
									<th>Total Marks</th>
									<th>Obtain Marks</th>
								</tr>
								<?php  
								$i=1;
								$count=0;
									if (isset($_POST['submit'])) {
										$course_code=$_POST['course_code'];
										$roll_no=$_POST['roll_no'];


										$que="select student_info.roll_no,first_name,middle_name,last_name,student_courses.semester, student_courses.course_code,subject_code from student_courses inner join student_info on student_info.roll_no=student_courses.roll_no where student_courses.course_code='$course_code' and student_courses.roll_no='$roll_no'";
									$run=mysqli_query($con,$que);
									while ($row=mysqli_fetch_array($run)) {
										$count++;
									?>
										<form action="add-single-student-results.php" method="post">
										<tr>
											<td><?php echo $i++ ?></td>
											<td><?php echo $row['roll_no'] ?></td>
                                            <input type="hidden" name="roll_no[]" value=<?php echo $row['roll_no'] ?> >
                                            <td><?php echo $row['first_name']." ".$row['middle_name']." ".$row['last_name'] ?></td>
											<input type="hidden" name="course_code[]" value=<?php echo $row['course_code'] ?> >
											<td><?php echo $row['subject_code'] ?></td>
											<input type="hidden" name="subject_code[]" value=<?php echo $row['subject_code'] ?> >
											<td><?php echo $row['semester'] ?></td>
											<input type="hidden" name="semester[]" value=<?php echo $row['semester'] ?> >
											<td class="text-center"><?php echo "100" ?></td>
											<input type="hidden" name="total_marks[]" value="100" >
											<td><input type="text" name="obtain_marks[]" placeholder="Plz Enter Obtain Marks" class="form-control" required></td>
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
	</body>
</html>

