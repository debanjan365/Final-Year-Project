<?php

// 1. connect to the database
$conn = mysqli_connect("localhost","root","","zomato");

// 2. receive data from html form
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// 3. insert data to the db
$query = "INSERT INTO users (user_id,name,email,password) VALUES (NULL, '$name','$email','$password')";

// 4. respond back
if(mysqli_query($conn,$query)){
	header('Location:login.php?err=2');
}else{
	header('Location:login.php?err=3');
}


?>