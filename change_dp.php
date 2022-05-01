<?php

$conn = mysqli_connect("localhost","root","","zomato1");
session_start();

$user_id = $_SESSION['user_id'];


$type = $_FILES['mydp']['type'];

$name = $_FILES["mydp"]["name"];

$type = explode("/",$type)[1];

if($type=="jpg" || $type == "png" || $type == "jpeg"){

	move_uploaded_file($_FILES['mydp']['tmp_name'], 'uploads/'.$_FILES['mydp']['name']);

	$query = "UPDATE users SET dp='$name' WHERE user_id=$user_id";

	if(mysqli_query($conn,$query)){
		header('Location:profile.php');
	}else{
		echo "Some error occured";
	}

}else{
	echo "Incorrect file format";
}
//

?>