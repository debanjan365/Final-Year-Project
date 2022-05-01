<?php

session_start();

$conn=mysqli_connect("localhost","root","","zomato1");

$r_id=$_GET['r_id'];
$order_id=$_GET['id'];

$query = "SELECT * FROM restaurants WHERE r_id=$r_id";

$result = mysqli_query($conn,$query);

$result = mysqli_fetch_assoc($result);

$r_name = $result['r_name'];

$query1 = "SELECT * FROM order_details od JOIN menu m ON od.menu_id=m.menu_id WHERE od.order_id LIKE '$order_id'";

$result1 = mysqli_query($conn,$query1);



?>
<!DOCTYPE html>
<html>
<head>
	<title>Order Page</title>
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
		var total=$('#total').text();
		$('#pay_total').text(total);
		$('#pay_tax').text(total*0.2);
		$('#total').hide();

		var tax = total*0.2

		$('#final_amount').text(parseInt(total) + parseInt(tax));


		$('#apply_coupon').click(function(){
			
			var user_coupon_input = $('#user_coupon_input').val();

			// create an ajax request

			$.ajax({
				url: 'check_discount.php?user_coupon_input=' + user_coupon_input,
				success:function(data){

					data = JSON.parse(data);

					if(data.status===200){
						// discount lagega
						var totalAmount = $('#pay_total').text();
						var discountPercentage = data.discount_value;

						var discount = totalAmount * (discountPercentage/100);

						$('#final_discount').text(discount);
						$('#user_coupon_input').val('');

						$('#final_amount').text(parseInt(total) + parseInt(tax) - parseInt(discount));


					}else{
						// discount nai lagega
						alert("Not Applicable");
						$('#user_coupon_input').val('');
					}
				},
				error:function(){
					alert("Some error occured");
				}
			})

		});

		$('#pay_now').click(function(){

			var amount = $('#final_amount').text();

			var order_id = '<?php echo $order_id; ?>';


			window.location.href='transaction.php?order_id='+ order_id +'&amount=' + amount;

		});
	})
</script>

<body style="background-color: #eee">

	<nav class="navbar bg-background">
		<a href="#" class="navbar-brand">Zomato</a>
		<h5 class="text-white">Hi <?php echo $_SESSION['name']; ?></h5>
	</nav>

	<div class="container">
		<div class="row mt-5">
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<h2><?php echo $r_name; ?></h2>
								<h5>Order id <?php echo $order_id; ?></h5>
							</div>
						</div>
					</div>
					<div class="col-md-9 mt-2">
						<div class="card">
							<div class="card-body">
								<h4>Order Details</h4>
								<table class="table">
									<tr>
										<th>S.No</th>
										<th>Item Name</th>
										<th>Quantity</th>
										<th>Price</th>
									</tr>
									<?php
									$counter=1;
									$sum=0;
									while ($row=mysqli_fetch_assoc($result1)) {
										$sum = $sum + $row['menu_price'];
										echo '<tr>
												<td>'.$counter.'</td>
												<td>'.$row['menu_name'].'</td>
												<td>1</td>
												<td>Rs '.$row['menu_price'].'</td>
											</tr>';
											$counter++;	
									}

									echo '<div id="total">'.$sum.'</div>';

									?>
									
								</table>
							</div>
						</div>
					</div>
					<div class="col-md-3 mt-2">
						<div class="card">
							<div class="card-body">
								<p>Have a coupon code?</p>
								<input type="text" name="" class="form-control" id="user_coupon_input"><br>
								<button class="btn btn-danger btn-sm btn-block" id="apply_coupon">Apply</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<h4>Order Summary</h4><br>

						<h5>Total Amount <span class="float-md-right">Rs <span id="pay_total">0</span></span></h5><br>

						<h5>Taxes <span class="float-md-right">Rs <span id="pay_tax">0</span></span></h5><br>

						<h5>Discount <span class="float-md-right">Rs <span id="final_discount">0</span></span></h5><br>

						<h5>Amount to be paid <span class="float-md-right">Rs <span id="final_amount">350</span></span></h5><br>

						<button class="btn btn-danger btn-lg btn-block" id="pay_now">Pay Now</button>

					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>