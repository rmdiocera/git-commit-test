<?php
session_name('client');
session_start();

require('dbconnect.php');
include('header_footer/header.php');

if(isset($_GET['checkout'])) {
	$itemsCheckout = true;
}

if(isset($_GET['remove'])) {
	$cart_id = $_GET['remove'];
	$id = $_SESSION['userData']['id'];

	$deleteQuery = "DELETE FROM carts WHERE id='$cart_id'";
	$deleteResult = mysqli_query($conn, $deleteQuery);

	if($deleteResult) {
		echo "Item removed from cart";
	} else {
		echo 'Unable to remove. Either invalid parameter or the user doesn\'t exist';
	}

}

$id = $_SESSION['userData']['id'];

$query = "SELECT carts.id, products.name, products.price FROM `carts`,`clients`,`products` WHERE (clients.id = carts.user_id AND products.id = carts.product_id) AND carts.user_id = '$id'";
$result = mysqli_query($conn, $query);

$totalQuery = "SELECT SUM(products.price) FROM `carts`,`clients`,`products` WHERE (clients.id = carts.user_id AND products.id = carts.product_id) AND carts.user_id = '$id'";
$totalResult = mysqli_query($conn, $totalQuery);
$total = mysqli_fetch_assoc($totalResult);
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="../js/jquery-3.3.1.js"></script>
    <script src="../js/bootstrap.min.js"></script> 
	<link rel='stylesheet' href="../css/bootstrap.min.css">
	<link rel='stylesheet' href="../css/shopping-cart.css">
    <link rel='stylesheet' href="../css/products.css">
	<link rel='stylesheet' href="../css/sticky-footer.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-md-3 my-5 h-100">
				<form method="GET">
					<table class="table">
						<thead class="thead-light">
							<th colspan="4"><h2>Your Cart<h2></tr>
						</thead>
						<thead class="thead-light">
							<th scope="col">ID</th>
							<th scope="col">Product Name</th>
							<th scope="col">Price</th>
							<th scope="col">Remove From Cart</th>
						</thead>
						<?php while ($cart = mysqli_fetch_assoc($result)): ?>
						<tbody class="bg-light">
							<tr>
								<th scope="row"><?= $cart['id']?></td>
								<td><?= $cart['name']?></td>
								<td><?= $cart['price']?></td>
								<td><a href="cart.php?remove=<?= $cart['id']?>?id=<?=$newQty['quantity']?>" class="card-link"><p class="text-center">Remove</p></a></td>
							<tr>
						<?php endwhile; ?>
						<tr>
							<td colspan="4">
							<span class="align-middle">Total Price: <?= implode($total); ?></span><button class="btn btn-primary mx-2 float-right" name="checkout" role="button">Checkout
							</td>
						</tr>
						</tbody>
					</table>
					<div>
					<?php if(isset($itemsCheckout)): ?>
					<?php if($itemsCheckout): ?>
					<div id="checkoutSuccess" class="alert alert-success mt-3">
						<strong>The transaction has been successful.</strong>
					</div>
					<?php endif; ?>
					<?php endif; ?>
				</form>
			</div>	
		</div>
	</div>
	
</body>
</html>

<?php include('header_footer/login_footer.php'); ?>