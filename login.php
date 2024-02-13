<?php
session_start();

$server="4440708_student";
$user="4440708_student";
$pass="Student123*";
$database="4440708_student4440708_student";
$conn=mysqli_connect($server,$user,$pass,$database);

?>

<?php

try {
    $host = "4440708_student";
    
    $user = "4440708_student";
    $password = "Student123*";
 $dbname = "4440708_student";
    $con = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // if($conn){
    //     echo 'Connected to DB';
    // }
} catch (PDOException $err) {
    echo $err->getMessage();
}

if (isset($_POST['login'])) {
    # code...


$username = $_POST['email'];
$password = $_POST['password'];

$stmt = $con->prepare("SELECT * FROM auth WHERE email = ?");
$stmt->execute([$_POST['email']]);
$user = $stmt->fetch();
if ($user && password_verify($password, $user['password']))
{

$username =$_POST['email'];
 
$sql = "SELECT id FROM auth WHERE email = ? ";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
 
// Step 3: Process the result
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id = $row["id"];
 
    // Step 4: Display the ID
$_SESSION['ID']=$id;
$_SESSION['login']=$_POST['login'];
echo '<script>window.location.href="dashboard.php";</script>';
   
}
 
} else {
  $mg="invalid";
 header("location: index.php?msg=$mg");

}
}
?>






<?php
if (isset($_POST['register'])) {
	# code...
$con=mysqli_connect("4440708_student","4440708_student","Student123*","4440708_student");

$fullname=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];

$password=password_hash($password, PASSWORD_DEFAULT);

$sql=mysqli_query($con,"SELECT * FROM auth WHERE email ='$email'");
if ($sql->num_rows>0) {
$mg="email already exist";
 header("location: index.php?msg=$mg");
}
else{
$query= mysqli_query($con,"INSERT INTO auth (username,email,password) VALUES('$fullname','$email','$password')");
if ($query) {

	$mg="You are registered successfully";
header("location: index.php?msg=$mg");

}else{
	$mg="Failed to register";
header("location: index.php?msg=$mg");
}

}}
?>









