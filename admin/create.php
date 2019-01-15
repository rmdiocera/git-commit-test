<?php
session_name('admin');
session_start();

include('header_footer/header.php');
require('dbconnect.php');

if(!$_SESSION['loggedIn']) {
    header('location: login.php');
    exit;
}

if(isset($_POST['create_prod'])) {
    $cat_id = $_POST['prod_cat_id']; 
    $name   = $_POST['prod_name'];
    $price  = $_POST['prod_price'];
	$qty    = $_POST['prod_qty'];
	
	$img_name = $_FILES['sp_cart_img']['name'];
	$tmp_name = $_FILES['sp_cart_img']['tmp_name'];
	
    $query = "INSERT INTO products (category_id, name, price, quantity, image_name) VALUES ('$cat_id','$name','$price','$qty','$img_name')";
	$result = mysqli_query($conn, $query);
	
	if($result) {
		move_uploaded_file($tmp_name, 'uploads/img-prod/' . $img_name);
		echo 'Product added to product list.';
	} else {
		echo 'Something went wrong';
	}

}	

    $categoryQuery  = "SELECT id, name FROM categories";
    $categoryResult = mysqli_query($conn, $categoryQuery);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Add New Product</title>
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
						<strong>Add new products to store.</strong></div>
						<form method="POST" enctype="multipart/form-data">
						<div class="form-group">
								<label for="name">Name: </label>
								<input type="text" name="prod_name" class="form-control">
							</div>
						<div class="form-group">
							<label for="price">Price: </label>
							<input type="number" name="prod_price" class="form-control">
                        </div>
                        <div class="form-group">
							<label for="qty">Quantity: </label>
							<input type="number" name="prod_qty" class="form-control">
						</div>
						<div class="form-group">
                            <label for="categories">Product Category</label>
                            <select class="form-control" name="prod_cat_id" placeholder="Choose a category">
                              <option>Choose a category</option>
                              <?php while($row = mysqli_fetch_assoc($categoryResult)): ?>
                              <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
    				          <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="form-group">
							<label for="picture">Product Picture: </label>
							<input type="file" name="sp_cart_img" class="form-control">
						</div>
						<div class="form-group">
							<br>
							<button type="submit" class="btn btn-secondary float-right" name="create_prod">Create Product</button>
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