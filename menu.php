<?php

$conn = mysqli_connect("localhost","root","","zomato");

$r_id = $_GET['id'];

$query = "SELECT * FROM restaurants WHERE r_id='$r_id'";

$result = mysqli_query($conn,$query);

$result = mysqli_fetch_assoc($result);

$query1 = "SELECT * FROM menu WHERE r_id='$r_id' AND menu_available=1";

$result1 = mysqli_query($conn,$query1);



?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $result['r_name']; ?></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body style="background-color: #eee">

	<nav class="navbar bg-background">
		<a href="#" class="navbar-brand">Zomato</a>
	</nav>

	<div class="container">
		<div class="row mt-3">
			<div class="col-md-8">
				<img src="<?php echo $result['r_bg']; ?>" style="width: 100%;height: 300px">
			</div>
			<div class="col-md-4">
				<div class="row">
					<div class="col-md-6 mb-1">
						<img src="https://b.zmtcdn.com/data/pictures/chains/8/301718/521b89e0710553cee262e5f0b13efb23.jpg" style="width: 100%;height: 150px">
					</div>
					<div class="col-md-6">
						<img src="https://b.zmtcdn.com/data/pictures/chains/8/301718/521b89e0710553cee262e5f0b13efb23.jpg" style="width: 100%;height: 150px">
					</div>
					<div class="col-md-6">
						<img src="https://b.zmtcdn.com/data/pictures/chains/8/301718/521b89e0710553cee262e5f0b13efb23.jpg" style="width: 100%;height: 150px">
					</div>
					<div class="col-md-6">
						<img src="https://b.zmtcdn.com/data/pictures/chains/8/301718/521b89e0710553cee262e5f0b13efb23.jpg" style="width: 100%;height: 150px">
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<h1><?php echo $result['r_name']; ?></h1>
				<h4 class="text-muted"><?php echo $result['r_cuisine']; ?></h4>
			</div>
		</div><hr>

		<div class="row">
			<div class="col-md-9">
				<div class="row">
					<?php

					while($row=mysqli_fetch_array($result1)){
						echo '<div class="col-md-12 mb-3">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-md-3">
										<img src="'.$row['menu_img'].'" style="width: 100%;height: auto">
									</div>
									<div class="col-md-9">
										<h3>'.$row['menu_name'].'<span style="float: right;';
										if($row['menu_type']==1){
											echo 'color:green';
										}else{
											echo 'color:red';
										}
										
										echo '"><i class="far fa-stop-circle"></i></span></h3>
										<h5 class="text-muted">Rs '.$row['menu_price'].'</h5>
										<button style="float: right" class="btn btn-outline-danger btn-sm">Add +</button>
									</div>
								</div>
							</div>
						</div>
					</div>';
					}

					?>

					
				</div>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>

</body>
</html>