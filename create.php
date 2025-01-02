<?php
    include "connection.php";
    
    // Check if form is submitted
    if (isset($_POST['submit'])) {
        // Sanitize and validate inputs
        $productname = mysqli_real_escape_string($conn, $_POST['name']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);
        
        // Make sure both fields are not empty
        if (!empty($productname) && !empty($price)) {
            // Prepare SQL query to insert data
            $q = "INSERT INTO `crud2`(`product_name`, `price`) VALUES ('$productname', '$price')";
            
            // Execute query
            $query = mysqli_query($conn, $q);
            
            // Check if query was successful
            if ($query) {
                // Redirect to the welcome page using PHP header() function
                header('Location: welcome.php'); 
                exit(); // Make sure to call exit after header redirection
            } else {
                echo "<script>alert('Error: Could not add product.');</script>";
            }
        } else {
            echo "<script>alert('Both fields are required!');</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add New Product</title>
    <link rel="stylesheet" href="style6.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="welcome.php">Beauty Bliss</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="welcome.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="create.php"><span style="font-size:larger;">Add New</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="col-lg-6 m-auto">
        <form method="post">
            <br><br>
            <div class="card">
                <div class="card-header bg-danger">
                    <h1 class="text-white text-center">Add New Product</h1>
                </div><br>

                <label for="name">Product Name:</label>
                <input type="text" name="name" class="form-control" required> <br>

                <label for="price">Price:</label>
                <input type="text" name="price" class="form-control" required> <br><br>

                <button class="btn btn-success" type="submit" name="submit">Submit</button><br><br>
                <a class="btn btn-info" href="welcome.php"> Cancel </a><br>
            </div>
        </form>
    </div>
</body>
</html>
