<?php

$conn = mysqli_connect("localhost","root","","zomato");

$query = "SELECT * FROM restaurants";

$result = mysqli_query($conn,$query)

?>

<!DOCTYPE html>
<html>
<head>
	<title>Zomato Home</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="style.css">

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body style ="background-color: #000;">
	<nav class="navbar bg-background">
		<a href="#" class="navbar-brand">Zomato</a>
	</nav>

	<div class="jumbotron bg-jumbotron text-white" style="background-color: white;background-image: url('https://st.depositphotos.com/3147737/4982/i/450/depositphotos_49826809-stock-photo-hyderabadi-biryani-a-popular-chicken.jpg');background-size: cover;background-repeat: no-repeat;background-position: left;">
	  <h1 class="display-4">Tasty Food! Delivered</h1>
	  <p class="lead">Explore the best food options from your city.</p>
	  <p>Browse through all the avaliable options.</p>
	  <p class="lead">
	    <a class="btn bg-background btn-lg text-white" href="#" role="button">Explore</a>
	  </p>
	</div>
		<div class="container">
		<h2>Order food online</h2>
		<br><br>

		<div class="row">
			<div class="col-md-2">
				<div class="card-body">
					<h3>Filter</h3>
				</div>
			</div>
			<div class="col-md-10">
				<div class="row">
					
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
										<p><span>Time 30 mins</span><span style="float: right;">Min Rs'.$row["r_price"].'</span></p>
										<a href="#" style="float: right;" class="btn btn-danger btn-sm">Order Online</a>
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