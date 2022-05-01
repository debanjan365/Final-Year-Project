
<!DOCTYPE html>
<html>
<head>
	<title>Order Page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>
<body style="background-color: #eee">

	<div class="container">
		<div class="row mt-5">
			<div class ="col-md-8">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<h2>Domino's Pizza</h2>
								<h5>Order id 5e242533sf33</h5>
							</div>
						</div>
					</div>
					<div class="col-md-9 mt-2">
						<div class="card">
							<div class="card-body">
								<h4>Order Details</h4>
								<table class="table">
										<tr>
											<th>S.No.</th>
											<th>Item Name</th>
											<th>Quantity</th>
											<th>Price</th>
										</tr>
										<tr>
											<td>1</td>
											<td>Masala Dosa</td>
											<td>1</td>
											<td>120</td>
										</tr>
								</table>
							</div>
						</div>
					</div>
					<div class="col-md-3 mt-2">
						<div class="card">
							<div class="card-body">
								<p>Have a coupon code?</p>
								<input type="text" name ="" class="form-control"> <br>
								<button class="btn btn-danger btn-sm btn-block">apply</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<h4>Order summary</h4><br>

						<h5> Total Amount <span class="float-md-right">Rs 450</span><h5><br><br>

						<h5>Taxes <span class="float-md-right">Rs 45</span><h5><br><br>

						<h5>Discount <span class="float-md-right">Rs 100</span><h5><br><br>

						<h5>Amount to be paid <span class="float-md-right">Rs 350</span><h5><br><br>

						<button class="btn btn-danger btn-lg btn-block">Pay Now</button>
					</div>
				</div>
			</div>
		</div>
	</div>


</body>
</html>