<?php

$conn = mysqli_connect("localhost","root","","zomato1");

$order_id = $_GET['order_id'];

$amount = $_GET['amount'];

$query = "UPDATE orders SET status=1,amount=$amount WHERE order_id LIKE '$order_id'";

if(mysqli_query($conn,$query)){
	echo "Order placed";
}else{
	echo "Some error occured";
}

?>