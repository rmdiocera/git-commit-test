<?php
session_name('admin');
session_start();

require('dbconnect.php');
include('header_footer/header.php');

if(!$_SESSION['loggedIn']) {
    header('location: login.php');
    exit;
}

if(isset($_GET['delete'])) {
	$id = $_GET['delete'];

	$deleteQuery = "DELETE FROM products WHERE id='$id';";
	$deleteResult = mysqli_query($conn, $deleteQuery);

	if($deleteResult) {
		echo 'Successfully deleted.';
	} else {
		echo 'Unable to delete. Either invalid parameter or the user doesn\'t exist';
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
                                <a href="../admin/edit_product.php?id=<?= $prod['id']; ?>" class="card-link">Edit Product</a>
                                <a href="read.php?delete=<?= $prod['id']?>" class="card-link">Delete Product</a>
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