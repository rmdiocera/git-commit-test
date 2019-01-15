<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel='stylesheet' href="../css/bootstrap.min.css">      
    <link rel='stylesheet' href="../css/fn_shopping_cart.css">
    <link href="../css/sticky-footer.css" rel="stylesheet">
    <script src="../js/jquery-3.3.1.js"></script>
    <script src="../js/bootstrap.min.js"></script>  
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <img src="deslogo.jpg" width="50" height="50" alt="">
    <a class="navbar-brand d-inline-block ml-2" href="homepage.php">RD Overruns</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="homepage.php">Home</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Products
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="../products.php">All Products</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Shoes</a>
            <a class="dropdown-item" href="#">Accessories</a>
            <a class="dropdown-item" href="#">Apparel</a>            
            <a class="dropdown-item" href="#">Services</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Contact Us</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">About Us</a>
        </li>
        </ul>
        
        <div class="d-flex justify-content-end">
            <?php if(isset($_SESSION['loggedIn'])): ?>
                <h6 class="mt-2 mr-2">Welcome, <a href="dashboard.php"><?= $_SESSION['userData']['name'] ?></a></h6>
                <a class="btn btn-primary mx-2" href="cart.php?id=<?=$_SESSION['userData']['id'] ?>" role="button">Go to Cart</a>
                <a class="btn btn-primary mx-2" href="logout.php" role="button">Log Out</a>
            <?php else: ?>
                <a class="btn btn-primary mx-2" href="login.php" role="button">Login</a>
                <a class="btn btn-primary mx-2" href="register.php" role="button">Register</a>
            <?php endif; ?>
        </div>

    </div>
    </nav>

</body>
</html>