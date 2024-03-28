<?php


session_start();

// Redirect to login page if user is not logged in
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
    exit; // Terminate script execution after redirection
}

// Including the database connection file
include_once("connection.php");

// Fetching data in descending order (latest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM products WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="mt-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="add.html">Add New Post</a></li>
                    <li class="breadcrumb-item"><a href="logout.php">Logout</a></li>
                </ol>
            </nav>
        </div>
        <div class="mt-3">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Status</th>
                        <!-- <th scope="col">Price (euro)</th> -->
                        <th scope="col">Update</th>
                    </tr>
                </thead>
                <tbody>
                <?php
        while($res = mysqli_fetch_array($result)) {        
            echo "<tr>";
            echo "<td>".$res['name']."</td>";
            echo "<td>".$res['qty']."</td>";
            // echo "<td>".$res['price']."</td>";    
            echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";      
        }
        ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
<?php include_once("footer.php"); ?>

