<?php

$conn=mysqli_connect("localhost","root","","zomato1");

session_start();

$r_id = $_GET['r_id'];

$order_id = $_GET['order_id'];

$user_id = $_SESSION['user_id'];

// insert data into orders table

$query1="SELECT * FROM orders WHERE order_id LIKE '$order_id'";

$result = mysqli_query($conn,$query1);

$result = mysqli_fetch_assoc($result);

if(empty($result)){
	$query = "INSERT INTO orders (order_id,user_id,r_id,time,status) VALUES ('$order_id',$user_id,$r_id,NOW(),0)";

	try{
		mysqli_query($conn,$query);
		echo $order_id;
	}catch (Exception $e){
		echo "Failed";
	}
}else{
	echo $order_id;
}




?>
