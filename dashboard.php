<?php
session_name('client');
session_start();

include('header_footer/header.php');

if(!$_SESSION['loggedIn']) {
    header('location: login.php');
    exit;
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
    <link rel='stylesheet' href="../css/dashboard.css">
</head>
<body>

<div class="wrapper">
    <div class="container">
            <div class="row">
                    <div class="col-md-4 offset-md-4">
                        <div class="card mt-5">
                            <img class="img-fluid rounded float-left mx-auto mt-3" width="100" height="100" src="uploads/img-clients/<?= ($_SESSION['userData']['image_name']); ?>">
                            <div class="card-body">   
                                <h5 class="card-title">Welcome, <?= $_SESSION['userData']['name'] ?></h5>
                                <p class="card-text">Name: <?= $_SESSION['userData']['name'] ?></p>
                                <p class="card-text">Email: <?= $_SESSION['userData']['email'] ?></p>
                            </div>
                            <div class="card-body">
                                <p class="card-text"><a href="edit_profile.php?id=<?= $_SESSION['userData']['id']; ?>" class="card-link">Edit Profile</a></p>
                                <p class="card-text"><a href="cart.php?id=<?=$_SESSION['userData']['id'] ?>" class="card-link">Go to Cart</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>
    

<?php include('header_footer/login_footer.php'); ?>