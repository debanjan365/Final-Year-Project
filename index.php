<?php

// connect db
$conn = mysqli_connect("localhost","root","","zomato1");

$query = "SELECT * FROM restaurants";

$result = mysqli_query($conn,$query);


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
<body style="background-color: #eee">

	<nav class="navbar bg-background">
		<a href="#" class="navbar-brand">Zomato</a>
	</nav>

	<div class="jumbotron bg-jumbotron text-white" style="background-color: white;background-image: url('https://i.pinimg.com/originals/cf/f8/a5/cff8a50aff6c22ce009cea45ffd181e4.jpg');background-size: cover;background-repeat: no-repeat;background-position: left;">
	  <h1 class="display-4" style="background-color: black;padding-right: 15px 10px;display: inline">Tasty Food! Delivered</h1>
	  <p class="lead">Explore the best food options from your city.</p>
	  <p>Browse through all the avaliable options.</p>
	  <p class="lead">
	    <a class="btn bg-background btn-lg text-white" href="#" role="button">Explore</a>
	  </p>
	</div>

	<div class="container">
		<h2>Order Food Online</h2><br>

		<div class="row">
			<div class="col-md-2">
				<div class="card">
					<div class="card-body">
						<h3>Filters</h3>
					</div>
				</div>
			</div>
			<div class="col-md-10">
				<div class="row">
					<?php

					while($row=mysqli_fetch_array($result)){
						echo '<div class="col-md-6 mb-3">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-md-3">
										<img src="'.$row['r_bg'].'" style="width: 100%;height: auto">
									</div>
									<div class="col-md-9">
										<h4 class="text-danger">'.$row['r_name'].'</h4>
										<p class="text-muted"><span>Rating: 4.1</span><span style="float: right">444 Reviews</span><br>
										<span class="text-dark">'.$row['r_cuisine'].'</span></p>
										<p><span>Time 30 mins</span><span style="float: right;">Min Rs300</span></p>
										<a href="intermediate.php?id='.$row['r_id'].'" style="float: right;" class="btn btn-danger btn-sm">Order Online</a>
									</div>
								</div>
							</div>
						</div>
					</div>';
					}

					?>

					
				</div>
			</div>
		</div>
	</div>

</body>
</html>