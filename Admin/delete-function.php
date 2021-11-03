<?php  
session_start();
if (!$_SESSION["LoginAdmin"])
{
	header('location:../login/login.php');
}
	require_once "../connection/connection.php";
?>
	<?php 
	if (isset($_GET['roll_no'])) {
		$roll_no=$_GET['roll_no'];
		$query1="delete from student_info where roll_no='$roll_no'";
		$run1=mysqli_query($con,$query1);
		if ($run1) {
			header('Location: student.php');
		}
		else{
			echo "Record not deleted. Frist of all delete record  from the child table then you can delete from here ";
			header('Refresh: 5; url=student.php');
		}
	}
	?>
<!-- --------------------------------Delete Course------------------------------------- -->
<?php 
	if (isset($_GET['course_code'])) {
		$course_code=$_GET['course_code'];
		$query2="delete from courses where course_code='$course_code'";
		$run2=mysqli_query($con,$query2);
		if ($run2) {
			header('Location: courses.php');
		}
		else{
			echo "Record not deleted";
		}
	}
?>
<!-- --------------------------------Delete Subject------------------------------------- -->
<?php 
	if (isset($_GET['subject_code'])) {
		$subject_code=$_GET['subject_code'];
		$query3="delete from course_subjects where subject_code='$subject_code'";
		$run3=mysqli_query($con,$query3);
		if ($run3) {
			header('Location: subjects.php');
		}
		else{
			echo "Record not deleted";
		}
	}
?>
<!-- --------------------------------Delete Teacher------------------------------------- -->
<?php 
	if (isset($_GET['teacher_id'])) {
		$teacher_id=$_GET['teacher_id'];
		$query3="delete from teacher_info where teacher_id='$teacher_id'";
		$run3=mysqli_query($con,$query3);
		if ($run3) {
			header('Location: teacher.php');
		}
		else{
			echo "Record not deleted";
		}
	}
?>
