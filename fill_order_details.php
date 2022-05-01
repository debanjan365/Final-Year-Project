
<?php

$conn=mysqli_connect("localhost","root","","zomato1");

$order_id = $_GET['order_id'];
$menu_id = $_GET['menu_id'];

$query = "INSERT INTO order_details (id,order_id,menu_id) VALUES (NULL,'$order_id',$menu_id)";

try{
	mysqli_query($conn,$query);
	echo "Success";
}catch(Exception $e){
	echo "Failed";
}

?>