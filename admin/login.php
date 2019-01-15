<?php

session_name('admin');
session_start();

include('header_footer/header.php');
require('dbconnect.php');

if(isset($_POST['log_in'])) {
    $email = $_POST['email'];
	$pass  = $_POST['password']; 

    $query = "SELECT id, name, email, image_name FROM users WHERE email='$email' AND password='$pass'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0) {
        $_SESSION['loggedIn'] = true;
        $_SESSION['userData'] = mysqli_fetch_assoc($result);
        header('location: dashboard.php');
        exit;
    } else {
        $loginFailed = true;
	}
	
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log in to your account - RD Overruns</title>
    <link rel='stylesheet' href="../css/bootstrap.min.css">
	<link rel='stylesheet' href="../css/shopping-cart.css">
	<link rel='stylesheet' href="../css/authpages.css">
	<script src="../js/jquery-3.3.1.js"></script>
    <script src="../js/bootstrap.min.js"></script>  
</head>
<body>
<div class="wrapper">
<div class="container d-flex">
    	<div class="row align-self-center w-100">
    		<div class="col-lg-6 mx-auto">
    			<div class="card mt-5">
    				<div class="card-body">
    					<div class="card-header bg-primary mb-2 text-white">
    						<strong>Log in to your account.</strong>
    					</div>
    					<form method="POST">
                        <div class="form-group">
	    					<label for="email">Email: </label>
	    					<input type="text" name="email" class="form-control">
	    				</div>
	    				<div class="form-group">
		    				<label for="pass">Password: </label>
		    				<input type="password" name="password" class="form-control">
	    				</div>
	    				<div class="form-group">
		    				<a href="register.php" class="float-left">Not a member yet?</a>
		    				<button type="submit" class="btn btn-secondary float-right" name="log_in">Log In</button>	
	    				</div>
                        </form>
    				</div>
	    		</div>
				<?php if(isset($loginFailed)): ?>
				<?php if($loginFailed): ?>
	    		<div id="accountNotExisting" class="alert alert-danger mt-3">
	    			<strong>Error! </strong>This account does not exist.
	    		</div>
	    		<?php endif; ?>
				<?php endif; ?>
				<div class="push"></div>
  			</div>
    		</div>
   		</div>
    </div>
</body>
</html>

<?php
include('header_footer/login_footer.php');
?>

    <!-- <form method="POST">
    	Email:
    	<input type="email" name="email">
    	<br>
    	Password:
    	<input type="password" name="password">
    	<br>
		<button type="submit" name="login">
			Login
		</button>
    </form> -->