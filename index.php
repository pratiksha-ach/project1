<?php session_start(); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="container">
        <div id="header" class="mt-5">
            <h1 class="display-4">Welcome to my Facebook!</h1>
            <img src=https://static.xx.fbcdn.net/rsrc.php/y1/r/4lCu2zih0ca.svg height='200' width='200'>
        </div>
        <?php
        if(isset($_SESSION['valid'])) {
            include("connection.php");
            $result = mysqli_query($mysqli, "SELECT * FROM login");
        ?>
            <div class="mt-3">
                <p class="lead">Welcome <?php echo $_SESSION['name'] ?>! <a href='logout.php'>Logout</a></p>
                <a href='view.php' class="btn btn-primary">View and Add Facebook Posts</a>
            </div>
        <?php
        } else {
        ?>
            <div class="mt-5">
                <p class="lead">You must be logged in to view this page.</p>
                <a href='login.php' class="btn btn-primary mr-2">Login</a>
                <a href='register.php' class="btn btn-secondary">Register</a>
            </div>
        <?php
        }
        ?>
        <div id="footer" class="mt-5">
        </div>
    </div>
    <?php include_once("footer.php"); ?>
</body>

</html>

