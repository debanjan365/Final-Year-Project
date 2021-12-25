<?php

session_start();

if(empty($_SESSION)){
	header('Location:login.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile Page</title>
</head>
<body>
	<h1>Welcome <?php echo $_SESSION['name']; ?></h1>
	<a href="logout.php">Logout</a>
</body>
</html>