<?php

session_start();

if(empty($_SESSION)){
	header('Location:login.php');
}

$conn = mysqli_connect("localhost","root","","zomato1");

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
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<script type="text/javascript">
	$(document).ready(function(){

		var order_id = '<?php echo $_SESSION['order_id']; ?>';
		var r_id = '<?php echo $r_id; ?>';

		$('#order').hide();

		$('#order_now').click(function(){
			window.location.href='order.php?id=' + order_id + '&r_id=' + r_id;
		})

		$('.menu-btn').click(function(){
			$('#order').show();
			var id = $(this).data("id");

			var menu_name = $('#menu_name' + id).text();
			var menu_price = $('#menu_price' + id).text();
			var menu_id = $('#menu_id' + id).text();


			// insert new entry to the order table
			

			$.ajax({
				url:'create_order.php?order_id=' + order_id +'&r_id=' + r_id,
				success: function(data){
					// insert new entry to the order_details table

					$.ajax({
						url:'fill_order_details.php?order_id=' + data + '&menu_id=' + menu_id,
						success:function(response){
							console.log(response);
						},
						error:function(){
							alert("Error occured");
						}
					})
				},
				error:function(){
					alert("Error occured");
				}
			})

			

			$('#menu_details').append('<p>' + menu_name + '<span class="float-md-right">Rs '+ menu_price +'</span></p>');

		});

	});
</script>
<body style="background-color: #eee">

	<nav class="navbar bg-background">
		<a href="#" class="navbar-brand">Zomato</a>
		<h5 class="text-white">Hi <?php echo $_SESSION['name']; ?></h5>
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
			<div class="col-md-8">
				<div class="row">

					<?php
					$counter=1;
					while($row=mysqli_fetch_array($result1)){
						echo '<div class="col-md-12 mb-3">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-md-3">
										<img src="'.$row['menu_img'].'" style="width: 100%;height: auto">
									</div>
									<div class="col-md-9">
										<h3 id="menu_name'.$counter.'">'.$row['menu_name'].'<span style="float: right;';
										if($row['menu_type']==1){
											echo 'color:green';
										}else{
											echo 'color:red';
										}
										
										echo '"><i class="far fa-stop-circle"></i></span></h3>
										<h5 class="text-muted">Rs <span id="menu_price'.$counter.'">'.$row['menu_price'].'<span></h5>
										<p id="menu_id'.$counter.'" style="display:none;">'.$row['menu_id'].'</p>
										<button data-id="'.$counter.'" style="float: right" class="btn btn-outline-danger btn-sm menu-btn">Add +</button>
									</div>
								</div>
							</div>
						</div>
					</div>';
					$counter++;
					}

					?>
					

					
				</div>
			</div>
			<div class="col-md-4">
				<div id="order" class="card">
					<div class="card-body">
						<h3>Order Details</h3>
						<div id="menu_details">
							
						</div>
						<button id="order_now" class="btn btn-danger btn-block">Order Now</button>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>