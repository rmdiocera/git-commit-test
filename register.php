<?php

include('header_footer/header.php');
require('dbconnect.php');

if(isset($_POST['register'])) {
	$name 	  = $_POST['name'];
	$email    = $_POST['email'];
	$password = $_POST['password'];
	$confirm  = $_POST['confirm'];

	$duplicateQuery  = "SELECT * FROM clients WHERE email = '$email'";
	$duplicateResult = mysqli_query($conn, $duplicateQuery);

	if(mysqli_num_rows($duplicateResult) > 0) {
		$duplicateEmail = true;
	} elseif ($password != $confirm) {
		$diffPass = true;
	} else {
		$query = "INSERT INTO clients (name, email, password) VALUES ('$name', '$email', '$password')";
		$result = mysqli_query($conn, $query);

		if($result) {
			$diffPass = false;
		}
	}

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Register first</title>
	<link rel='stylesheet' href="../css/bootstrap.min.css">
	<link rel='stylesheet' href="../css/shopping-cart.css">
	<link rel='stylesheet' href="../css/dashboard.css">
	<script src="../js/jquery-3.3.1.js"></script>
    <script src="../js/bootstrap.min.js"></script>  
</head>
<body>
	<div class="container d-flex">
		<div class="row align-self-center w-100">
			<div class="col-lg-6 mx-auto">
			<?php if(isset($duplicateEmail) && ($duplicateEmail)): ?>
					<div id="duplicateEmail" class="alert alert-danger mt-3">
					<strong>Error! </strong>The email entered was already used.
					</div>
				<?php elseif(isset($diffPass) && ($diffPass)): ?>
					<div id="mismatchedPass" class="alert alert-danger mt-3">
					<strong>Error! </strong>Passwords do not match.
					</div> 
				<?php elseif(isset($diffPass) && (!$diffPass)): ?>
					<div id="newAccount" class="alert alert-success mt-3">
					<strong>Account has been successfully created.</strong>
					</div>
	    		<?php endif; ?>
				<div class="card my-3">
					<div class="card-body">
						<div class="card-header mb-2 bg-primary text-white">
						<strong>Register your account.</strong></div>
						<form method="POST">
						<div class="form-group">
								<label for="name">Name: </label>
								<input type="text" name="name" class="form-control">
							</div>
							<div class="form-group">
								<label for="email">Email: </label>
								<input type="email" name="email" class="form-control">
							</div>
							<div class="form-group">
								<label for="pass">Password: </label>
								<input type="password" name="password" class="form-control">
							</div>
							<div class="form-group">
								<label for="confirm">Confirm Password: </label>
								<input type="password" name="confirm" class="form-control">	
							</div>
							<div class="form-group">
								<a href="login.php" class="float-left">Back to login page</a>
								<button type="submit" class="btn btn-secondary float-right" name="register">Register</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

<?php
include('header_footer/login_footer.php');
?>
