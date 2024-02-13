<?php

$con=mysqli_connect("fdb1034.awardspace.net","4440708_student","Student123*","4440708_student");


if (isset($_POST['insert'])) {
	# code...

$fname=$_POST['fname'];
$num=$_POST['num'];
$mname=$_POST['mname'];
$lname=$_POST['lname'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$year=$_POST['year'];
$course=$_POST['course'];
$section=$_POST['section'];
$id=$_POST['u_id'];


$query=mysqli_query($con,"Insert into info (fname,mname,lname,age,gender,year,course,section,u_id,num) VALUES ('$fname','$mname','$lname','$age','$gender','$year','$course','$section','$id','$num')");
if ($query==true) {
	echo'<script>window.location.href="dashboard.php";alert("New Student has been inserted successfully")</script>';
}else{
	echo"something went wrong";
}}
else if (isset($_POST['edit'])) {
$fname=$_POST['fname'];
$num=$_POST['num'];
$mname=$_POST['mname'];
$lname=$_POST['lname'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$year=$_POST['year'];
$course=$_POST['course'];
$section=$_POST['section'];
$id=$_POST['id'];
$query=mysqli_query($con,"Update info set fname='$fname',mname='$mname',lname='$lname',age='$age',gender='$gender',year='$year',course='$course',section='$section' where id='$id'");
if ($query) {
		echo'<script>window.location.href="dashboard.php";alert("data updated successfully")</script>';
	}	
}
else if (isset($_POST['delete'])) {
	$id=$_POST['id'];
	$query=mysqli_query($con,"delete from info where id ='$id'");
	if ($query) {
		echo'<script>window.location.href="dashboard.php";alert("data updated successfully")</script>';
	}
}
?>