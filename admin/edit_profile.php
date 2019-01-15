<?php
session_name('admin');
session_start();

include('header_footer/header.php');
require('dbconnect.php');

if(!$_SESSION['loggedIn']) {
    header('location: login.php');
    exit;
}

$id = $_GET['id'];

$query = "SELECT * FROM users WHERE id=$id;";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

if(isset($_POST['save'])) {	
	$name = $_POST['name'];
	$email = $_POST['email'];

	$img_name = $_FILES['sp_cart_users_img']['name'];
	$tmp_name = $_FILES['sp_cart_users_img']['tmp_name'];
	move_uploaded_file($tmp_name, 'uploads/img-admin/' . $img_name);

	if (($_FILES['sp_cart_users_img']['error']) == 4) {
		$newImage = false;
		$updateQuery = "UPDATE users SET name = '$name', email = '$email' WHERE id = '$id';";
	} else {
		$newImage = true;
		$updateQuery = "UPDATE users SET name = '$name', email = '$email', image_name = '$img_name' WHERE id = '$id';";	
	}

	$updateResult = mysqli_query($conn, $updateQuery);
	
	if($updateResult) {
		echo "<script>
		window.location.href='dashboard.php';
		</script>";
		$_SESSION['userData']['name'] = $name;
		$_SESSION['userData']['email'] = $email;
		if($newImage) {
			$_SESSION['userData']['image_name'] = $img_name;
		}
	} else {
		echo 'Unable to update. Either invalid parameter or the user doesn\'t exist';
	}
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<script src="../js/jquery-3.3.1.js"></script>
    <script src="../js/bootstrap.min.js"></script> 
	<link rel='stylesheet' href="../css/bootstrap.min.css">
	<link rel='stylesheet' href="../css/shopping-cart.css">
	<link rel='stylesheet' href="../css/dashboard.css">
	<link rel='stylesheet' href="../css/sticky-footer.css">
</head>
<body>
	<div class="container d-flex">
		<div class="row align-self-center w-100">
			<div class="col-lg-6 mx-auto">
				<div class="card my-5">
					<div class="card-body">
						<div class="card-header mb-2 bg-primary text-white">
						<strong>Edit your account details.</strong></div>
						<form method="POST" enctype="multipart/form-data">
						<div class="form-group">
								<label for="name">Name: </label>
								<input type="text" name="name" value="<?= $user['name'] ?>" class="form-control">
							</div>
							<div class="form-group">
								<label for="email">Email: </label>
								<input type="email" name="email" value="<?= $user['email'] ?>" class="form-control">
							</div>
							<div class="form-group">
								<label for="pass">Change Profile Picture: </label>
								<input type="file" name="sp_cart_users_img" class="form-control">
							</div>
							<div class="form-group">
								<br>
								<button type="submit" class="btn btn-secondary float-right" name="save">Save</button>
								<br>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>

<?php include('header_footer/login_footer.php'); ?>