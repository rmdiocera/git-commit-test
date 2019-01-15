<?php
session_name('admin');
session_start();

require('dbconnect.php');
include('header_footer/header.php');

if(!$_SESSION['loggedIn']) {
    header('location: login.php');
    exit;
}

$id = $_GET['id'];


$query = "SELECT * FROM products WHERE id=$id;";
$result = mysqli_query($conn, $query);
$prod = mysqli_fetch_assoc($result);

if(isset($_POST['save'])) {	
	$name = $_POST['name'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];

    $img_name = $_FILES['sp_cart_prod_img']['name'];
	$tmp_name = $_FILES['sp_cart_prod_img']['tmp_name'];
	move_uploaded_file($tmp_name, 'uploads/img-prod/' . $img_name);

	$updateQuery = "UPDATE products SET name = '$name', price = '$price', quantity = '$qty' WHERE id = '$id';";
    $updateResult = mysqli_query($conn, $updateQuery);
    
	if($updateResult) {
        echo "<script>
		window.location.href='products.php';
		</script>";
	} else {
		echo 'Unable to update. Either invalid parameter or the user doesn\'t exist';
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
	<title>Document</title>
	<script src="../js/jquery-3.3.1.js"></script>
    <script src="../js/bootstrap.min.js"></script> 
	<link rel='stylesheet' href="../css/bootstrap.min.css">
	<link rel='stylesheet' href="../css/shopping-cart.css">
	<link rel='stylesheet' href="../css/products.css">
	<link rel='stylesheet' href="../css/sticky-footer.css">
</head>
<body>
	<div class="container d-flex">
		<div class="row align-self-center w-100">
			<div class="col-lg-6 mx-auto">
				<div class="card my-5">
					<div class="card-body">
						<div class="card-header mb-2 bg-primary text-white">
						<strong>Edit your product details.</strong></div>
						<form method="POST" enctype="multipart/form-data">
						<div class="form-group">
								<label for="name">Name: </label>
								<input type="text" name="name" value="<?= $prod['name']; ?>" class="form-control">
							</div>
						<div class="form-group">
							<label for="price">Price: </label>
							<input type="number" name="price" value="<?= $prod['price']; ?>" class="form-control">
                        </div>
                        <div class="form-group">
							<label for="qty">Quantity: </label>
							<input type="number" name="qty" value="<?= $prod['quantity']; ?>" class="form-control">
						</div>
						<div class="form-group">
                            <label for="categories">Example select</label>
                            <select class="form-control" name="prod_cat_id" aria-placeholder="Choose a category">
                              <option>Choose a category</option>
                              <?php while($row = mysqli_fetch_assoc($categoryResult)): ?>
                              <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
    				          <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="form-group">
							<label for="picture">Product Picture: </label>
							<input type="file" name="sp_cart_prod_img" class="form-control">
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