<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="index.php">Home</a>

        </nav>
        <div class="mt-5">
            <?php
            include("connection.php");

            if(isset($_POST['submit'])) {
                $user = mysqli_real_escape_string($mysqli, $_POST['username']);
                $pass = mysqli_real_escape_string($mysqli, $_POST['password']);

                if($user == "" || $pass == "") {
                    echo '<div class="alert alert-danger" role="alert">Either username or password field is empty.</div>';
                } else {
                    $result = mysqli_query($mysqli, "SELECT * FROM login WHERE username='$user' AND password=md5('$pass')")
                    or die("Could not execute the select query.");

                    $row = mysqli_fetch_assoc($result);

                    if(is_array($row) && !empty($row)) {
                        $validuser = $row['username'];
                        $_SESSION['valid'] = $validuser;
                        $_SESSION['name'] = $row['name'];
                        $_SESSION['id'] = $row['id'];
                    } else {
                        echo '<div class="alert alert-danger" role="alert">Invalid username or password.</div>';
                    }

                    if(isset($_SESSION['valid'])) {
                        header('Location: index.php');			
                    }
                }
            }
            ?>
 <img src=https://static.xx.fbcdn.net/rsrc.php/y1/r/4lCu2zih0ca.svg height='100' width='100'>
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Login</h2>
                    <form name="form1" method="post" action="">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<?php include_once("footer.php"); ?>
</html>
