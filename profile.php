<?php

$conn = mysqli_connect("localhost","root","","zomato1");
session_start();

if(empty($_SESSION)){
	header('Location:login.php');
}

$user_id=$_SESSION['user_id'];

$query="SELECT * FROM users WHERE user_id=$user_id";

$result = mysqli_query($conn,$query);

$result = mysqli_fetch_assoc($result);

$dp = $result['dp'];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile Page</title>
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
		$('#profile-card').mouseenter(function(){
			$('#edit-dp').show();
		})

		$('#profile-card').mouseleave(function(){
			$('#edit-dp').hide();
		})
	})
</script>
<body style="background-color: #eee">

	<nav class="navbar bg-background">
		<a href="#" class="navbar-brand">Zomato</a>
		<a href="logout.php" class="btn btn-light btn-sm">Logout</a>
	</nav>

	<div class="container">
		<div class="row mt-5">
			<div class="col-md-3">
				
				<div class="card" id="profile-card">
					<a href="#" data-toggle="modal" data-target="#exampleModal"><i id="edit-dp" class="fas fa-2x fa-edit" style="color:#888;display: none"></i></a>
					<img class="mt-4" src="./uploads/<?php echo $dp; ?>" style="width: 100px;height: 100px;display: block;margin-left: auto;margin-right: auto">
					<div class="card-body">
						<h4 class="text-md-center"><?php echo $_SESSION['name']; ?></h4>

						<p class="text-md-center mt-3">Gurgaon, India</p>

						<a href="#" class="btn btn-primary btn-block">Edit Profile</a>
					</div>
					
				</div>
			</div>
		
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="row" style=>
									<div class="col-md-2">
									</div>
								<div class="col-md-6">
									<h5>Domino's Piza</h5>
								</div>
								<div class="col-md-4 "><p class="float-md-right text-muted"> Aug23,2020</p></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Profile Picture</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form action="change_dp.php" method="POST" enctype="multipart/form-data">
      		<label>Change DP</label><br>
      		<input type="file" name="mydp" class="form-control"><br>
      		<input type="submit" name="" class="btn btn-primary">
      	</form>
        
      </div>
    </div>
  </div>
</div>
	
</body>
</html>