<?php
    include "connection.php";
    $product_id="";
    $product_name="";
    $price="";
    
    $error="";
    $success="";
    // Check if form is submitted
    if (isset($_POST['submit'])) {
        
        $productname = mysqli_real_escape_string($conn, $_POST['name']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);
        
        
        if (!empty($productname) && !empty($price)) {
            
            $q = "INSERT INTO `crud2`(`product_name`, `price`) VALUES ('$productname', '$price')";
            
            // Execute query
            $query = mysqli_query($conn, $q);
            
            // Check if query was successful
            if ($query) {
                // Redirect to the welcome page using PHP header() function
                header('Location: welcome.php'); 
                exit();
                $id = $_GET['product_id'];
    $sql = "select * from crud2 where id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    while(!$row){
      header("location: crud2/welcome.php");
      exit;
    }
    $product_name=$row["product_name"];
    $product_price=$row["price"];
    

  }
  else{
    $product_id = $_POST["product_id"];
    $product_name=$_POST["product_name"];
    $price=$_POST["price"];
    

    $sql = "update crud2 set name= product_name='$product_name', price='$price' where id='$product_id'";
    $result = $conn->query($sql);
    
  }
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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="welcome.php">PHP CRUD OPERATION</a>
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
                <div class="card-header bg-primary">
                    <h1 class="text-white text-center">Add New Product</h1>
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
