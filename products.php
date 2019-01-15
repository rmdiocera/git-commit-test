<?php
session_name('client');
session_start();

require('dbconnect.php');
include('header_footer/header.php');

if(isset($_GET['add'])) {
    $prod_id = $_GET['add'];
    $user_id = $_SESSION['userData']['id'];

	$addQuery  = "INSERT INTO carts (user_id, product_id) VALUES ('$user_id','$prod_id')";
	$addResult = mysqli_query($conn, $addQuery);

	if($addResult) {
		echo 'Added to cart.';
	} else {
		echo 'Unable to add. Either invalid parameter or the product doesn\'t exist';
    }

    $qtyQuery  = "SELECT quantity FROM products WHERE id='$prod_id'";
    $qtyResult = mysqli_query($conn, $qtyQuery);
    $newQty    = implode(mysqli_fetch_assoc($qtyResult)) - 1;
    
    $newQtyQuery = "UPDATE products SET quantity = '$newQty' WHERE id='$prod_id'";
    $newQtyResult = mysqli_query($conn, $newQtyQuery);

    if($newQtyResult) {
        echo 'Quantity reduced by 1';
    } else {
        echo 'Unable to reduce. Either invalid paramenter or the product doesn\'t exist';
    }

}

$query = "SELECT id, name, price, quantity, image_name FROM products";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
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
                <?php while($prod = mysqli_fetch_assoc($result)): ?>
                    <div class="col-md-4 my-4">
                        <div class="card h-100" style="width: 20rem;" >
                            <form method="GET">
                            <img class="card-img-top" src="uploads/img-prod/<?php echo($prod['image_name']); ?>">
                            <h5 class="card-header"><?php echo $prod['name']; ?></h5>
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <p class="card-text">₱ <?php echo $prod['price']; ?></p>
                                <p class="card-text">Stocks: <?php echo $prod['quantity']; ?></p>
                            </div>
                            <div class="card-body">
                                <?php if(isset($_SESSION['loggedIn'])): ?>
                                <a href="products.php?add=<?= $prod['id']?>" class="card-link">Add to Cart</a>
                                <?php else: ?>
                                <a href="login.php" class="card-link">Add to Cart</a>
                                <?php endif; ?>
                            </div>
                            </form>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>


</body>
</html>

<?php include('header_footer/login_footer.php'); ?>