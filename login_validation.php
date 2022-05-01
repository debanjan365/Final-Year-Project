

<?php
session_start();
// 1. Connect to the database
$conn=mysqli_connect("localhost","root","","zomato1");

// 2. Fetch email and password coming from HTML
$email=$_POST['email'];
$password = $_POST['password'];

//3. Run query on the database
$query = "SELECT * FROM users WHERE email LIKE '$email' AND password LIKE '$password'";

$result=mysqli_query($conn,$query);

//4. Evavulate the result
$num = mysqli_num_rows($result);

if($num==1){

	$_SESSION['is_logged_in']=1;
	//print_r($_SESSION);
	// redirect
	$result = mysqli_fetch_assoc($result);
	$_SESSION['name']=$result['name'];
	$_SESSION['user_id']=$result['user_id'];
	
	header('Location:profile.php');
}else{
	header('Location:login.php?err=1');
}


?>