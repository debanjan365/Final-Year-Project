<?php

session_start();


$r_id = $_GET['id'];

if(isset($_SESSION['order_id'])){
	unset($_SESSION['order_id']);
}


$_SESSION['order_id']=uniqid();
print_r($_SESSION);

header('Location:menu.php?id='.$r_id);

?>