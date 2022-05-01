<?php

$conn = mysqli_connect("localhost","root","","zomato1");

$user_input = $_GET['user_coupon_input'];

$query = "SELECT * FROM discount WHERE discount_name LIKE '$user_input' AND discount_status=1";

$result = mysqli_query($conn,$query);

$result = mysqli_fetch_assoc($result);

if(empty($result)){

	$response = array('status'=>404);

}else{

	$response = array('status'=>200,'discount_value'=>$result['discount_value']);
}

$response = json_encode($response);

echo $response;






?>