<?php
session_name('client');
session_start();

include('header_footer/header.php');

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' href="css/bootstrap.min.css">
	<link rel='stylesheet' href="css/shopping-cart.css">
	<link rel='stylesheet' href="css/authpages.css">
    <link rel='stylesheet' href="css/sticky-footer.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
    	<div class="row mt-5">
            <div class="col-md-3">
                <div class="card h-100 bg-dark text-black">
                  <img class="card-img-top img-fluid" src="uploads/misc/homepage-ad.jpg" alt="Card image">
                </div>                
            </div>
            <div class="col-md-9">
                <div class="card h-100 bg-dark text-black">
                  <img class="card-img-top img-fluid" src="uploads/misc/homepage-card-overlay-bg.jpg" alt="Card image">
                  <div class="card-img-overlay">
                    <h5 class="card-title">Nike Flyknit crossRunner X</h5>
                    <p class="card-text">Coming soon this November 2018</p>
                  </div>
                </div>
            </div>
        </div>
        <div class="row my-5 w-100 mx-auto">
            <div class="col-md-4">
                <div class="card py-2 h-100 text-center">
                    <i class="far fa-credit-card p-2"></i>
                    <h5 class="card-title">Flexible payment options</h5>
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk. Some quick example text to build on the card title and make up the bulk. Some quick example text to build on the card title and make up the bulk.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card py-2 h-100 text-center">
                    <i class="fas fa-piggy-bank p-2"></i>
                    <h5 class="card-title">Save more compared to mall prices</h5>
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk. Some quick example text to build on the card title and make up the bulk. Some quick example text to build on the card title and make up the bulk.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 py-2 text-center">
                    <i class="far fa-star p-2"></i>
                    <h5 class="card-title">High quality products</h5>
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk. Some quick example text to build on the card title and make up the bulk. Some quick example text to build on the card title and make up the bulk.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php include('header_footer/login_footer.php');?>
