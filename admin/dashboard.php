<?php
session_name('admin');
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
    <link rel='stylesheet' href="../css/dashboard.css">
    <script src="../js/jquery-3.3.1.js"></script>
    <script src="../js/bootstrap.min.js"></script>  
</head>
<body>

<div class="wrapper">
    <div class="container">
            <div class="row">
                    <div class="col-md-4 offset-md-4">
                        <div class="card mt-5">
                            <img class="img-fluid rounded float-left mx-auto mt-3" width="100" height="100" src="uploads/img-admin/<?= ($_SESSION['userData']['image_name']); ?>">
                            <div class="card-body">   
                                <h5 class="card-title">Welcome, <?= $_SESSION['userData']['name'] ?></h5>
                                <p class="card-text">Name: <?= $_SESSION['userData']['name'] ?></p>
                                <p class="card-text">Email: <?= $_SESSION['userData']['email'] ?></p>
                            </div>
                            <div class="card-body">
                                <p class="card-text"><a href="edit_profile.php?id=<?= $_SESSION['userData']['id']; ?>" class="card-link">Edit Profile</a></p>
                                <p class="card-text"><a href="products.php" class="card-link">See Product List</a></p>
                                <p class="card-text"><a href="create.php" class="card-link">Create New Product</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>
    

<?php include('header_footer/login_footer.php'); ?>