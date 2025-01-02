<?php
    include "connection.php";
    $product_id = "";
    $product_name = "";
    $price = "";

    $error = "";
    $success = "";

    // Check if form is submitted
    if (isset($_POST['submit'])) {
        $productname = mysqli_real_escape_string($conn, $_POST['product_name']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);

        if (!empty($productname) && !empty($price)) {
            // Check if product_id exists (for insert or update)
            if (isset($_POST['product_id']) && !empty($_POST['product_id'])) {
                // Update product
                $product_id = $_POST['product_id'];
                $q = "UPDATE crud2 SET product_name='$productname', price='$price' WHERE product_id='$product_id'";

                $query = mysqli_query($conn, $q);
                if ($query) {
                    header('Location: welcome.php');
                    exit();
                } else {
                    echo "<script>alert('Error: Could not update product.');</script>";
                }
            } else {
                // Insert new product
                $q = "INSERT INTO crud2 (product_name, price) VALUES ('$productname', '$price')";

                $query = mysqli_query($conn, $q);
                if ($query) {
                    header('Location: welcome.php');
                    exit();
                } else {
                    echo "<script>alert('Error: Could not add product.');</script>";
                }
            }
        } else {
            echo "<script>alert('Both fields are required!');</script>";
        }
    }

    // If product_id is set in the URL, load data for editing
    if (isset($_GET['product_id']) && !empty($_GET['product_id'])) {
        $product_id = $_GET['product_id'];
        $sql = "SELECT * FROM crud2 WHERE product_id='$product_id'";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $product_name = $row['product_name'];
            $price = $row['price'];
        } else {
            header("Location: welcome.php"); // Redirect if no product found
            exit();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add New Product</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <link rel="stylesheet" href="style5.css">
        <div class="container-fluid">
            <a class="navbar-brand" href="welcome.php"></a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="welcome.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-info nav-link" href="create.php"><span style="font-size:larger;">Add new</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="col-lg-6 m-auto">
        <form method="post">
            <br><br>
            <div class="card">
                <div class="card-header bg-warning">
                    <h1 class="text-white text-center"><?php echo isset($product_id) ? "Update Product" : "Add New Product"; ?></h1>
                </div><br>
                <input type="hidden" name="product_id" value="<?php echo $product_id; ?>" class="form-control"> <br>

                <label>PRODUCT_NAME</label>
                <input type="text" name="product_name" value="<?php echo $product_name; ?>" class="form-control"> <br>

                <label>PRICE</label>
                <input type="number" name="price" value="<?php echo $price; ?>" class="form-control"> <br>

                <button class="btn btn-success" type="submit" name="submit">Submit</button><br>
                <a class="btn btn-info" href="welcome.php">Cancel</a><br>
            </div>
        </form>
    </div>
</body>
</html>
