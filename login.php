<?php

session_start();

if(!empty($_SESSION)){
	header('Location:profile.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Zomato Home</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body class="bg-background">

	<nav class="navbar">
		<a href="#" class="navbar-brand">Zomato</a>
	</nav>

	<div class="container">
		<div class="row mt-3">
			<div class="col-md-8">
				<h1 class="font-large text-white text-md-center">Good food delivered at your doorspteps... Instantly!</h1>
			</div>
			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<h3>Login Here</h3>
						<?php

						if(!empty($_GET)){

							if($_GET['err']==1){
								echo "<p style='color:red'>Incorrect email/password</p>";
							}
							if($_GET['err']==2){
								echo "<p style='color:green'>Registration Successful</p>";
							}
							if($_GET['err']==3){
								echo "<p style='color:red'>Reg Failed</p>";
							}
							
						}

						?>
						<form action="login_validation.php" method="POST">
							<label>Email:</label><br>
							<input class="form-control" type="email" name="email"><br>
							<label>Password</label><br>
							<input class="form-control" type="password" name="password"><br>
							<input type="submit" name="" value="Login" class="btn bg-background btn-block text-white">

						</form>
						<small>Not a member? <a href="#" data-toggle="modal" data-target="#exampleModal">Sign Up</a></small>
					</div>
				</div>
			</div>
		</div>
	</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sign Up</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="reg_validation.php" method="POST">
        	<label>Name:</label><br>
			<input class="form-control" type="text" name="name"><br>
			<label>Email:</label><br>
			<input class="form-control" type="email" name="email"><br>
			<label>Password</label><br>
			<input class="form-control" type="password" name="password"><br>
			<input type="submit" name="" value="Sign Up" class="btn bg-background btn-block text-white">

		</form>
      </div>
    </div>
  </div>
</div>
</body>
</html>